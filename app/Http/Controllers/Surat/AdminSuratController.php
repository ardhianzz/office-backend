<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Helpers\APIResponderHelper;
use App\Models\ESurat\AksesSPSM;
use Illuminate\Pagination\Paginator;

class AdminSuratController extends Controller
{
    use APIResponderHelper;




    public function manage_sps_delete()
    {
        $data["id_hapus"] = request()->hapus;

        $data = AksesSPSM::find($data['id_hapus'])->delete();
        
        return $this->success("Proses Hapus Berhasil", $data);
    }
    public function manage_sps()
    {
        #REQUEST DARI URL UNTUK PENCARIAN DATA DAN PENGATURAN 
        $cari = request()->input("cari", "%%");
        ($cari == "%") ? true : $value = "%".$cari."%";
        $perPage = request()->input('item_per_page', "10");

        #MENGAMBIL DATA DARI DATABASE
        $data = AksesSPSM::
            with([
                'juu.user.profil_user'=>function($q) use($value) { $q->where('nama', 'like', $value); }, 
                'unit'])->
            get();
        
        #FILTER AGAR DATA NULL TIDAK TERKIRIM
        $collection = collect($data)->filter( function($data){ return $data->juu->user->profil_user != null; })->values();

        /*
        *
        *  HARUSNYA SIMPAN DATA COLLECTION PADA CACHE, JIKA TERJADI PERUBAHAN REQUEST BARU DATA DIAMBIL DARI DATABASE
        *
        */

        $todalData = $collection->count();

        # Jika DATA KOSONG MAKA PROSES BERHENTI
        if($todalData == 0 ) { return $this->notFound();}
        
        #CHUNKS UNTUK MEMBAGI KOLEKSI MENJADI KELOMPOK
        $chunks = $collection->chunk($perPage); 
        
        #JUMLAH KELOMPOK DALAM KOLEKSI
        $chunkCount = $chunks->count();
        
        #MENGIRIMKAN DATA HANYA PADA CHUNKS TERPILIH
        $chunkIndex = request()->input("page", 1);
        ($chunkIndex <= 0) ? $chunkIndex = 1 : $chunkIndex + 1;
       
        $chunkData = $chunks[$chunkIndex - 1]; //mengirimkan data pertama

        $link = request()->query();
        unset($link["page"]);
        $paginateLink = request()->url()."?".http_build_query(array_merge($link));
        
        $paginate = [
            "first_page_url" => $paginateLink."&page=1",
            "last_page_url" => $paginateLink."&page=".$chunkCount,
            "current_page" => $chunkIndex,
            "current_url" => $paginateLink."&page=".$chunkIndex,
            "next_page_url" => (($chunkIndex + 1) >= $chunkCount) ? 
                                                    $paginateLink."&page=".$chunkCount : 
                                                    $paginateLink."&page=".$chunkIndex + 1,
            "prev_page_url" => $paginateLink."&page=".$chunkIndex - 1,
            "total_page" => $chunkCount,
            "total_data"=> $todalData,
            "item_per_page" => $perPage,
            "cari" => $cari,
        ];

        $data = $chunkData;
        return ($this->success("Proses Suskes", $data, $paginate));

    }
}

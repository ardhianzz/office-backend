<?php
namespace Database\Seeders\ESurat;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelAksiDisposisiSurat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('esurat_sys')->statement("TRUNCATE TABLE ONLY sys.aksi_disposisi_surat RESTART IDENTITY CASCADE");
        DB::connection('esurat_sys')->table('aksi_disposisi_surat')->insert([
            [ 'kode' => 'DISPOSISI', 'nama' => 'Disposisi', 'awalan' => 'Pendisposisian ', 'pesan' => ' melakukan disposisi surat' ],
            [ 'kode' => 'SELESAI', 'nama' => 'Selesai', 'awalan' => 'Penyelesaian disposisi ', 'pesan' => ' telah menyelesaikan disposisi' ],
        ]);
    }
}

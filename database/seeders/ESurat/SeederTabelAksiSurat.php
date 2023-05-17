<?php
namespace Database\Seeders\ESurat;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelAksiSurat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('esurat_sys')->statement("TRUNCATE TABLE ONLY sys.aksi_surat RESTART IDENTITY CASCADE");
      DB::connection('esurat_sys')->table('aksi_surat')->insert([
          [ 'kode' => 'KIRIM', 'nama' => 'Kirim', 'awalan' => 'Pengiriman ', 'pesan' => ' mengirim surat' ],
          [ 'kode' => 'TERBIT', 'nama' => 'Terbit', 'awalan' => 'Penerbitan ', 'pesan' => ' menerbitkan surat' ],
          [ 'kode' => 'SETUJU', 'nama' => 'Setuju', 'awalan' => 'Penyetujuan ', 'pesan' => ' menyetujui surat' ],
          [ 'kode' => 'KEMBALI', 'nama' => 'Kembali', 'awalan' => 'Pengembalian ', 'pesan' => ' mengembalikan surat' ],
          [ 'kode' => 'BATAL', 'nama' => 'Batal', 'awalan' => 'Pembatalan ', 'pesan' => ' membatalkan surat' ],
          [ 'kode' => 'REVISI', 'nama' => 'Revisi', 'awalan' => 'Pengiriman kembali ', 'pesan' => ' merevisi surat' ],
      ]);
    }
}

<?php
namespace Database\Seeders\ESurat;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelJenisSurat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('esurat_sys')->statement("TRUNCATE TABLE ONLY sys.jenis_surat RESTART IDENTITY CASCADE");
        DB::connection('esurat_sys')->table('jenis_surat')->insert([
            [ 'kode' => 'ND', 'nama' => 'Nota Dinas', 'id_sifat_surat' => 2, 'jumlah_ttd' => 1 ],
            [ 'kode' => 'NDUP', 'nama' => 'Nota Dinas Usulan Pengadaan', 'id_sifat_surat' => 2, 'jumlah_ttd' => 1 ],
            [ 'kode' => 'SK', 'nama' => 'Surat Keluar', 'id_sifat_surat' => 1, 'jumlah_ttd' => 1 ],
            [ 'kode' => 'IM', 'nama' => 'Internal Memo', 'id_sifat_surat' => 2, 'jumlah_ttd' => 1 ],
            [ 'kode' => 'SD', 'nama' => 'Surat Kuasa', 'id_sifat_surat' => 2, 'jumlah_ttd' => 2 ],
            [ 'kode' => 'SE', 'nama' => 'Surat Eksternal', 'id_sifat_surat' => NULL, 'jumlah_ttd' => NULL ],
            [ 'kode' => 'PH', 'nama' => 'Surat Pelaksana Harian', 'id_sifat_surat' => 2, 'jumlah_ttd' => 2 ],
        ]);
    }
}

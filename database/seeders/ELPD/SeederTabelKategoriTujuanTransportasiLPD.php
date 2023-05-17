<?php

use Illuminate\Database\Seeder;

class SeederTabelKategoriTujuanTransportasiLPD extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('elpd_sys')->statement("TRUNCATE TABLE ONLY sys.kategori_tujuan_transportasi_lpd RESTART IDENTITY CASCADE");
        DB::connection('elpd_sys')->table('kategori_tujuan_transportasi_lpd')->insert([
            [ 'id_kategori_tujuan' => 1, 'id_kategori_transportasi' => 1 ],
            [ 'id_kategori_tujuan' => 1, 'id_kategori_transportasi' => 2 ],
            [ 'id_kategori_tujuan' => 1, 'id_kategori_transportasi' => 3 ],
            [ 'id_kategori_tujuan' => 2, 'id_kategori_transportasi' => 1 ],
            [ 'id_kategori_tujuan' => 3, 'id_kategori_transportasi' => 1 ],
        ]);
    }
}

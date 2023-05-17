<?php

use Illuminate\Database\Seeder;

class SeederTabelProvinsi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.provinsi RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('provinsi')->insert([
            [ 'id_negara' => 105, 'nama' => 'Bali' ],
            [ 'id_negara' => 105, 'nama' => 'Bangka Belitung' ],
            [ 'id_negara' => 105, 'nama' => 'Banten' ],
            [ 'id_negara' => 105, 'nama' => 'Bengkulu' ],
            [ 'id_negara' => 105, 'nama' => 'DI Yogyakarta' ],
            [ 'id_negara' => 105, 'nama' => 'DKI Jakarta' ],
            [ 'id_negara' => 105, 'nama' => 'Gorontalo' ],
            [ 'id_negara' => 105, 'nama' => 'Jambi' ],
            [ 'id_negara' => 105, 'nama' => 'Jawa Barat' ],
            [ 'id_negara' => 105, 'nama' => 'Jawa Tengah' ],
            [ 'id_negara' => 105, 'nama' => 'Jawa Timur' ],
            [ 'id_negara' => 105, 'nama' => 'Kalimantan Barat' ],
            [ 'id_negara' => 105, 'nama' => 'Kalimantan Selatan' ],
            [ 'id_negara' => 105, 'nama' => 'Kalimantan Tengah' ],
            [ 'id_negara' => 105, 'nama' => 'Kalimantan Timur' ],
            [ 'id_negara' => 105, 'nama' => 'Kalimantan Utara' ],
            [ 'id_negara' => 105, 'nama' => 'Kepulauan Riau' ],
            [ 'id_negara' => 105, 'nama' => 'Lampung' ],
            [ 'id_negara' => 105, 'nama' => 'Maluku' ],
            [ 'id_negara' => 105, 'nama' => 'Maluku Utara' ],
            [ 'id_negara' => 105, 'nama' => 'Nanggroe Aceh Darussalam' ],
            [ 'id_negara' => 105, 'nama' => 'Nusa Tenggara Barat (NTB)' ],
            [ 'id_negara' => 105, 'nama' => 'Nusa Tenggara Timur (NTT)' ],
            [ 'id_negara' => 105, 'nama' => 'Papua' ],
            [ 'id_negara' => 105, 'nama' => 'Papua Barat' ],
            [ 'id_negara' => 105, 'nama' => 'Riau' ],
            [ 'id_negara' => 105, 'nama' => 'Sulawesi Barat' ],
            [ 'id_negara' => 105, 'nama' => 'Sulawesi Selatan' ],
            [ 'id_negara' => 105, 'nama' => 'Sulawesi Tengah' ],
            [ 'id_negara' => 105, 'nama' => 'Sulawesi Tenggara' ],
            [ 'id_negara' => 105, 'nama' => 'Sulawesi Utara' ],
            [ 'id_negara' => 105, 'nama' => 'Sumatera Barat' ],
            [ 'id_negara' => 105, 'nama' => 'Sumatera Tengah' ],
            [ 'id_negara' => 105, 'nama' => 'Sumatera Utara' ],
        ]);
    }
}

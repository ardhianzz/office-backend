<?php

use Illuminate\Database\Seeder;

class SeederTabelSifatSurat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('esurat_sys')->statement("TRUNCATE TABLE ONLY sys.sifat_surat RESTART IDENTITY CASCADE");
        DB::connection('esurat_sys')->table('sifat_surat')->insert([
            [ 'nama' => 'Biasa' ],
            [ 'nama' => 'Segera' ],
            [ 'nama' => 'Biasa dan Rahasia' ],
            [ 'nama' => 'Segera dan Rahasia' ],
        ]);
    }
}

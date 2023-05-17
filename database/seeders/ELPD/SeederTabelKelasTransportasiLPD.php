<?php

use Illuminate\Database\Seeder;

class SeederTabelKelasTransportasiLPD extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('elpd_sys')->statement("TRUNCATE TABLE ONLY sys.kelas_transportasi_lpd RESTART IDENTITY CASCADE");
        DB::connection('elpd_sys')->table('kelas_transportasi_lpd')->insert([
            [ 'nama' => 'Ekonomi' ],
            [ 'nama' => 'Bisnis' ],
            [ 'nama' => 'Eksekutif' ],
        ]);
    }
}

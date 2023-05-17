<?php

use Illuminate\Database\Seeder;

class SeederTabelJenisTransportasiLPD extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('elpd_sys')->statement("TRUNCATE TABLE ONLY sys.jenis_transportasi_lpd RESTART IDENTITY CASCADE");
        DB::connection('elpd_sys')->table('jenis_transportasi_lpd')->insert([
            [ 'nama' => 'Pesawat' ],
            [ 'nama' => 'Bus' ],
            [ 'nama' => 'Kereta Api' ],
            [ 'nama' => 'Kapal' ],
            [ 'nama' => 'Lain-lain' ],
        ]);
    }
}

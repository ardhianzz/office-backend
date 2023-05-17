<?php

use Illuminate\Database\Seeder;

class SeederTabelJenisHariCuti extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('ecuti_sys')->statement("TRUNCATE TABLE ONLY sys.jenis_hari_cuti RESTART IDENTITY CASCADE");
        DB::connection('ecuti_sys')->table('jenis_hari_cuti')->insert([
            [ 'kode' => 'KERJA', 'nama' => 'Hari Kerja' ],
            [ 'kode' => 'KALENDER', 'nama' => 'Hari Kalender' ],
        ]);
    }
}

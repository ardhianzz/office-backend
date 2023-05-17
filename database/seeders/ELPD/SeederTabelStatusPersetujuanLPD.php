<?php

use Illuminate\Database\Seeder;

class SeederTabelStatusPersetujuanLPD extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('elpd_sys')->statement("TRUNCATE TABLE ONLY sys.status_persetujuan_lpd RESTART IDENTITY CASCADE");
        DB::connection('elpd_sys')->table('status_persetujuan_lpd')->insert([
            [ 'nama' => 'Disetujui' ],
            [ 'nama' => 'Dikembalikan' ],
            [ 'nama' => 'Ditolak' ],
        ]);
    }
}

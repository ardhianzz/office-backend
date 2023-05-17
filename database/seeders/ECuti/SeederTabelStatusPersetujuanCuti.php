<?php

use Illuminate\Database\Seeder;

class SeederTabelStatusPersetujuanCuti extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('ecuti_sys')->statement("TRUNCATE TABLE ONLY sys.status_persetujuan_cuti RESTART IDENTITY CASCADE");
        DB::connection('ecuti_sys')->table('status_persetujuan_cuti')->insert([
            [ 'nama' => 'Disetujui' ],
            [ 'nama' => 'Ditolak' ],
        ]);
    }
}

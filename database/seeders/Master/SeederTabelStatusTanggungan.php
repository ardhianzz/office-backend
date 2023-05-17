<?php

use Illuminate\Database\Seeder;

class SeederTabelStatusTanggungan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.status_tanggungan RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('status_tanggungan')->insert([
            [ 'nama' => 'Proses Pengajuan' ],
            [ 'nama' => 'Ditolak' ],
            [ 'nama' => 'Aktif' ],
            [ 'nama' => 'Tidak Aktif' ],
        ]);
    }
}

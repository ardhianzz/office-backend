<?php

use Illuminate\Database\Seeder;

class SeederTabelStatusSPSM extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('esurat_sys')->statement("TRUNCATE TABLE ONLY sys.status_spsm RESTART IDENTITY CASCADE");
        DB::connection('esurat_sys')->table('status_spsm')->insert([
            [ 'kode' => 'DRAF', 'nama' => 'Draf' ],
            [ 'kode' => 'DISPOSISI', 'nama' => 'Disposisi belum selesai' ],
            [ 'kode' => 'SELESAI', 'nama' => 'Selesai' ],
        ]);
    }
}

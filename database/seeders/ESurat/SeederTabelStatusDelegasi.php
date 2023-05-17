<?php

use Illuminate\Database\Seeder;

class SeederTabelStatusDelegasi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('esurat_sys')->statement("TRUNCATE TABLE ONLY sys.status_delegasi RESTART IDENTITY CASCADE");
        DB::connection('esurat_sys')->table('status_delegasi')->insert([
            [ 'nama' => 'Belum Disetujui' ],
            [ 'nama' => 'Menunggu' ],
            [ 'nama' => 'Aktif' ],
            [ 'nama' => 'Selesai' ],
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class SeederTabelStatusBackdate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('esurat_sys')->statement("TRUNCATE TABLE ONLY sys.status_backdate RESTART IDENTITY CASCADE");
        DB::connection('esurat_sys')->table('status_backdate')->insert([
            [ 'nama' => 'Menunggu' ],
            [ 'nama' => 'Aktif' ],
            [ 'nama' => 'Selesai' ],
        ]);
    }
}

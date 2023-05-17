<?php

use Illuminate\Database\Seeder;

class SeederTabelStatusPenomoranSurat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('esurat_sys')->statement("TRUNCATE TABLE ONLY sys.status_penomoran_surat RESTART IDENTITY CASCADE");
        DB::connection('esurat_sys')->table('status_penomoran_surat')->insert([
            [ 'nama' => 'Kosong' ],
            [ 'nama' => 'Dipesan' ],
            [ 'nama' => 'Terbit' ]
        ]);
    }
}

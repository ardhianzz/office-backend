<?php

use Illuminate\Database\Seeder;

class SeederTabelOrganisasi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.organisasi RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('organisasi')->insert([
            [ 'kode' => 'S2P', 'nama' => 'PT Sumber Segara Primadaya' ],
        ]);
    }
}

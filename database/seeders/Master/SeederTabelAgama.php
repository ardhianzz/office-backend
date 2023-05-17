<?php

namespace Database\Seeders\Master;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelAgama extends Seeder
{
	/**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.agama RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('agama')->insert([
            [ 'nama' => 'Islam' ],
            [ 'nama' => 'Kristen Protestan' ],
            [ 'nama' => 'Kristen Katolik' ],
            [ 'nama' => 'Hindu' ],
            [ 'nama' => 'Buddha' ],
            [ 'nama' => 'Konghucu' ]
        ]);
    }
}

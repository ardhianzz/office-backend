<?php

use Illuminate\Database\Seeder;

class SeederTabelStatusPernikahan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.status_pernikahan RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('status_pernikahan')->insert([
            [ 'nama' => 'Belum Menikah' ],
            [ 'nama' => 'Menikah' ],
            [ 'nama' => 'Duda/Janda' ],
        ]);
    }
}

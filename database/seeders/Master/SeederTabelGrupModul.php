<?php

use Illuminate\Database\Seeder;

class SeederTabelGrupModul extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.grup_modul RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('grup_modul')->insert([
            [ 'nama' => 'Admin IT', 'level' => 1, 'is_enable' => TRUE ],
            [ 'nama' => 'User', 'level' => 3, 'is_enable' => TRUE ],
            [ 'nama' => 'Admin HRD', 'level' => 2, 'is_enable' => TRUE ],
        ]);
    }
}

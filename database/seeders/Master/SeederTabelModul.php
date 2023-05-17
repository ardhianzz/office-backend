<?php

use Illuminate\Database\Seeder;

class SeederTabelModul extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.modul RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('modul')->insert([
            [ 'nama' => 'Administrator', 'alias' => NULL, 'icon' => 'account_box', 'background' => '#fcba03', 'is_enable' => TRUE ],
            [ 'nama' => 'E-Surat', 'alias' => 'E-Letter', 'icon' => 'mail', 'background' => '#4a3de0', 'is_enable' => TRUE ],
            [ 'nama' => 'E-HRD', 'alias' => NULL, 'icon' => 'access_time', 'background' => '#5e71d0', 'is_enable' => TRUE ],
            [ 'nama' => 'Administrator HRD', 'alias' => NULL, 'icon' => 'account_box', 'background' => '#5e71d0', 'is_enable' => TRUE ],
        ]);
    }
}

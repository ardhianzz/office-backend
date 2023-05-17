<?php

use Illuminate\Database\Seeder;

class SeederTabelAksesModul extends Seeder
{
	/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.akses_modul RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('akses_modul')->insert([
            [ 'id_grup_modul' => GRUP_ADMIN_IT, 'id_modul' => 1 ],
            [ 'id_grup_modul' => GRUP_USER, 'id_modul' => 2 ],
            [ 'id_grup_modul' => GRUP_USER, 'id_modul' => 3 ],
            [ 'id_grup_modul' => GRUP_ADMIN_HRD, 'id_modul' => 4 ],
        ]);
    }
}

<?php
namespace Database\Seeders\Master;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelLevelKaryawan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.level_karyawan RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('level_karyawan')->insert([
            [ 'nama' => 'Staf', 'level' => 1 ],
            [ 'nama' => 'Staf Senior', 'level' => 2 ],
            [ 'nama' => 'Supervisor Junior', 'level' => 3 ],
            [ 'nama' => 'Supervisor', 'level' => 4 ],
            [ 'nama' => 'Supervisor Senior', 'level' => 5 ],
            [ 'nama' => 'Asisten Manager', 'level' => 6 ],
            [ 'nama' => 'Staf Ahli', 'level' => 6 ],
            [ 'nama' => 'Manager', 'level' => 7 ],
            [ 'nama' => 'Staf Ahli Senior', 'level' => 7 ],
            [ 'nama' => 'Managerial', 'level' => 8 ],
        ]);
    }
}

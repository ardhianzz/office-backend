<?php
namespace Database\Seeders\Master;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelUnit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.unit RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('unit')->insert([
            [ 'kode' => 'HO', 'nama' => 'Head Office', 'tampilan' => NULL, 'nama_penomoran' => 'Head Office', 'tampilan_penomoran' => NULL, 'id_organisasi' => 1 ],
            [ 'kode' => 'BO', 'nama' => 'Unit 1&2', 'tampilan' => NULL, 'nama_penomoran' => '1&2', 'tampilan_penomoran' => NULL, 'id_organisasi' => 1 ],
            [ 'kode' => 'BO', 'nama' => 'Unit 3', 'tampilan' => NULL, 'nama_penomoran' => '3', 'tampilan_penomoran' => NULL, 'id_organisasi' => 1 ],
            [ 'kode' => 'BO', 'nama' => 'Unit 3A', 'tampilan' => 'Unit 4', 'nama_penomoran' => '3A', 'tampilan_penomoran' => '4', 'id_organisasi' => 1 ],
            [ 'kode' => 'BO', 'nama' => 'Project', 'tampilan' => NULL, 'nama_penomoran' => 'Project', 'tampilan_penomoran' => NULL, 'id_organisasi' => 1 ],
            [ 'kode' => 'BO', 'nama' => 'Common', 'tampilan' => NULL, 'nama_penomoran' => 'Common', 'tampilan_penomoran' => NULL, 'id_organisasi' => 1 ],
        ]);
    }
}

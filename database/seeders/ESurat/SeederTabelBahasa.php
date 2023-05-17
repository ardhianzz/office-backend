<?php
namespace Database\Seeders\ESurat;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelBahasa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('esurat_sys')->statement("TRUNCATE TABLE ONLY sys.bahasa RESTART IDENTITY CASCADE");
        DB::connection('esurat_sys')->table('bahasa')->insert([
            [ 'kode' => 'IND', 'nama' => 'Indonesia' ],
            [ 'kode' => 'ENG', 'nama' => 'Inggris' ],
        ]);
    }
}

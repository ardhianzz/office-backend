<?php
namespace Database\Seeders\ESurat;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelJenisPemberkasan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('esurat_sys')->statement("TRUNCATE TABLE ONLY sys.jenis_pemberkasan RESTART IDENTITY CASCADE");
        DB::connection('esurat_sys')->table('jenis_pemberkasan')->insert([
            [ 'nama' => 'PLN' ],
            [ 'nama' => 'China Cenda' ],
            [ 'nama' => 'BNI' ],
            [ 'nama' => 'BRI' ],
        ]);
    }
}

<?php
namespace Database\Seeders\ESurat;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelJenisSPSM extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('esurat_sys')->statement("TRUNCATE TABLE ONLY sys.jenis_spsm RESTART IDENTITY CASCADE");
        DB::connection('esurat_sys')->table('jenis_spsm')->insert([
            [ 'nama' => 'Surat Masuk' ],
            [ 'nama' => 'Surat Keluar' ],
        ]);
    }
}

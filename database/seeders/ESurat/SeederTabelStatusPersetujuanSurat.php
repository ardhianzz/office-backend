<?php
namespace Database\Seeders\ESurat;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelStatusPersetujuanSurat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('esurat_sys')->statement("TRUNCATE TABLE ONLY sys.status_persetujuan_surat RESTART IDENTITY CASCADE");
        DB::connection('esurat_sys')->table('status_persetujuan_surat')->insert([
            [ 'nama' => 'Disetujui' ],
            [ 'nama' => 'Dikembalikan' ],
            [ 'nama' => 'Batal' ],
        ]);
    }
}

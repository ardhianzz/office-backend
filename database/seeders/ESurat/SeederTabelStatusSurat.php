<?php
namespace Database\Seeders\ESurat;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelStatusSurat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('esurat_sys')->statement("TRUNCATE TABLE ONLY sys.status_surat RESTART IDENTITY CASCADE");
        DB::connection('esurat_sys')->table('status_surat')->insert([
            [ 'kode' => 'DRAF', 'nama' => 'Draf' ],
            [ 'kode' => 'PROSES', 'nama' => 'Proses Persetujuan' ],
            [ 'kode' => 'TERBIT', 'nama' => 'Terbit' ],
            [ 'kode' => 'BATAL', 'nama' => 'Batal' ],
        ]);
    }
}

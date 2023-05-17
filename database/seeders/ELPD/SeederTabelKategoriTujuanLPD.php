<?php
namespace Database\Seeders\ELPD;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelKategoriTujuanLPD extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('elpd_sys')->statement("TRUNCATE TABLE ONLY sys.kategori_tujuan_lpd RESTART IDENTITY CASCADE");
        DB::connection('elpd_sys')->table('kategori_tujuan_lpd')->insert([
            [ 'nama' => 'Dalam Negeri' ],
            [ 'nama' => 'Luar Negeri 1 (Asia, Australia, Selandia Baru)' ],
            [ 'nama' => 'Luar Negeri 2 (Eropa, Amerika, Afrika)' ],
        ]);
    }
}

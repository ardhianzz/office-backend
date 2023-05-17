<?php
namespace Database\Seeders\ELPD;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelKategoriTransportasiLPD extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('elpd_sys')->statement("TRUNCATE TABLE ONLY sys.kategori_transportasi_lpd RESTART IDENTITY CASCADE");
        DB::connection('elpd_sys')->table('kategori_transportasi_lpd')->insert([
            [ 'nama' => 'Umum' ],
            [ 'nama' => 'Operasional' ],
            [ 'nama' => 'Pribadi' ],
        ]);
    }
}

<?php
namespace Database\Seeders\ELPD;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelKatukatransJenisTransportasiLPD extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('elpd_sys')->statement("TRUNCATE TABLE ONLY sys.katukatrans_jenis_transportasi_lpd RESTART IDENTITY CASCADE");
        DB::connection('elpd_sys')->table('katukatrans_jenis_transportasi_lpd')->insert([
            [ 'id_katukatrans' => 1, 'id_jenis_transportasi' => 1 ],
            [ 'id_katukatrans' => 1, 'id_jenis_transportasi' => 2 ],
            [ 'id_katukatrans' => 1, 'id_jenis_transportasi' => 3 ],
            [ 'id_katukatrans' => 1, 'id_jenis_transportasi' => 4 ],
            [ 'id_katukatrans' => 1, 'id_jenis_transportasi' => 5 ],
            [ 'id_katukatrans' => 4, 'id_jenis_transportasi' => 1 ],
            [ 'id_katukatrans' => 5, 'id_jenis_transportasi' => 1 ],
        ]);
    }
}

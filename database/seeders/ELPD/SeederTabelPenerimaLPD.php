<?php

use Illuminate\Database\Seeder;

use App\Models\Master\Unit;

class SeederTabelPenerimaLPD extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('elpd_sys')->statement("TRUNCATE TABLE ONLY sys.penerima_lpd RESTART IDENTITY CASCADE");
        DB::connection('elpd_sys')->table('penerima_lpd')->insert([
            [ 'id_juu' => 9, 'id_unit' => 1 ],
            [ 'id_juu' => 87, 'id_unit' => 2 ],
            [ 'id_juu' => 87, 'id_unit' => 3 ],
            [ 'id_juu' => 87, 'id_unit' => 4 ],
            [ 'id_juu' => 87, 'id_unit' => 5 ],
            [ 'id_juu' => 87, 'id_unit' => 6 ],
        ]);
    }
}

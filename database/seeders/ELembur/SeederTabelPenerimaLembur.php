<?php
namespace Database\Seeders\ELembur;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

use App\Models\Master\Unit;

class SeederTabelPenerimaLembur extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('elembur_sys')->statement("TRUNCATE TABLE ONLY sys.penerima_lembur RESTART IDENTITY CASCADE");
        DB::connection('elembur_sys')->table('penerima_lembur')->insert([
            [ 'id_juu' => 9, 'id_unit' => 1 ],
            [ 'id_juu' => 87, 'id_unit' => 2 ],
            [ 'id_juu' => 87, 'id_unit' => 3 ],
            [ 'id_juu' => 87, 'id_unit' => 4 ],
            [ 'id_juu' => 87, 'id_unit' => 5 ],
            [ 'id_juu' => 87, 'id_unit' => 6 ],
        ]);
    }
}

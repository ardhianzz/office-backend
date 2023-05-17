<?php

use Illuminate\Database\Seeder;

use App\Models\Master\Unit;

class SeederTabelPejabatPemeriksaReimburse extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('ereimburse_sys')->statement("TRUNCATE TABLE ONLY sys.pejabat_pemeriksa_reimburse RESTART IDENTITY CASCADE");
        DB::connection('ereimburse_sys')->table('pejabat_pemeriksa_reimburse')->insert([
            [ 'id_juu' => 9, 'id_unit' => 1 ],
            [ 'id_juu' => 87, 'id_unit' => 2 ],
            [ 'id_juu' => 87, 'id_unit' => 3 ],
            [ 'id_juu' => 87, 'id_unit' => 4 ],
            [ 'id_juu' => 87, 'id_unit' => 5 ],
            [ 'id_juu' => 87, 'id_unit' => 6 ],
        ]);
    }
}

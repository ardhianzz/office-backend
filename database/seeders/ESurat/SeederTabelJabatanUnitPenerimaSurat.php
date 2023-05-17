<?php

use Illuminate\Database\Seeder;

class SeederTabelJabatanUnitPenerimaSurat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('esurat_sys')->statement("TRUNCATE TABLE ONLY sys.jabatan_unit_penerima_surat RESTART IDENTITY CASCADE");
        DB::connection('esurat_sys')->table('jabatan_unit_penerima_surat')->insert([
            [
                'id_jenis_surat' => 1,
                'id_jabatan_unit' => 1
            ],
            [
                'id_jenis_surat' => 1,
                'id_jabatan_unit' => 4
            ],
            [
                'id_jenis_surat' => 1,
                'id_jabatan_unit' => 5
            ],
            [
                'id_jenis_surat' => 1,
                'id_jabatan_unit' => 6
            ],
            [
                'id_jenis_surat' => 1,
                'id_jabatan_unit' => 33
            ],
            [
                'id_jenis_surat' => 1,
                'id_jabatan_unit' => 36
            ],
            [
                'id_jenis_surat' => 1,
                'id_jabatan_unit' => 45
            ],
            [
                'id_jenis_surat' => 2,
                'id_jabatan_unit' => 1
            ],
            [
                'id_jenis_surat' => 2,
                'id_jabatan_unit' => 4
            ],
            [
                'id_jenis_surat' => 2,
                'id_jabatan_unit' => 5
            ],
            [
                'id_jenis_surat' => 2,
                'id_jabatan_unit' => 6
            ],
            [
                'id_jenis_surat' => 3,
                'id_jabatan_unit' => 1
            ],
            [
                'id_jenis_surat' => 4,
                'id_jabatan_unit' => 1
            ],
            [
                'id_jenis_surat' => 4,
                'id_jabatan_unit' => 2
            ],
            [
                'id_jenis_surat' => 4,
                'id_jabatan_unit' => 4
            ],
            [
                'id_jenis_surat' => 4,
                'id_jabatan_unit' => 5
            ],
            [
                'id_jenis_surat' => 4,
                'id_jabatan_unit' => 6
            ],
            [
                'id_jenis_surat' => 4,
                'id_jabatan_unit' => 33
            ],
            [
                'id_jenis_surat' => 4,
                'id_jabatan_unit' => 36
            ],
            [
                'id_jenis_surat' => 4,
                'id_jabatan_unit' => 45
            ],
            [
                'id_jenis_surat' => 5,
                'id_jabatan_unit' => 2
            ],
            [
                'id_jenis_surat' => 5,
                'id_jabatan_unit' => 4
            ],
            [
                'id_jenis_surat' => 5,
                'id_jabatan_unit' => 5
            ],
            [
                'id_jenis_surat' => 5,
                'id_jabatan_unit' => 6
            ],
            [
                'id_jenis_surat' => 5,
                'id_jabatan_unit' => 33
            ],
            [
                'id_jenis_surat' => 5,
                'id_jabatan_unit' => 36
            ],
            [
                'id_jenis_surat' => 5,
                'id_jabatan_unit' => 45
            ],
        ]);
    }
}

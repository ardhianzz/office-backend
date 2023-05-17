<?php
namespace Database\Seeders\ECuti;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelJenisHariLibur extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('ecuti_sys')->statement("TRUNCATE TABLE ONLY sys.jenis_hari_libur RESTART IDENTITY CASCADE");
        DB::connection('ecuti_sys')->table('jenis_hari_libur')->insert([
            [ 'nama' => 'Berubah setiap tahun' ],
            [ 'nama' => 'Tetap setiap tahun' ],
            [ 'nama' => 'Cuti Bersama' ],
        ]);
    }
}

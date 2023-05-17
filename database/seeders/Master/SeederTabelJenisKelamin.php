<?php
namespace Database\Seeders\Master;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelJenisKelamin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.jenis_kelamin RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('jenis_kelamin')->insert([
            [ 'kode' => 'P', 'nama' => 'Laki-laki' ],
            [ 'kode' => 'W', 'nama' => 'Perempuan' ],
        ]);
    }
}

<?php
namespace Database\Seeders\Master;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelJenisJabatanUnitUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.jenis_jabatan_unit_user RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('jenis_jabatan_unit_user')->insert([
            [ 'nama' => 'Asli' ],
            [ 'nama' => 'Delegasi' ]
        ]);
    }
}

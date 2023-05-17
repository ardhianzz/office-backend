<?php
namespace Database\Seeders\Master;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelStatusHubunganTanggungan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.status_hubungan_tanggungan RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('status_hubungan_tanggungan')->insert([
            [ 'nama' => 'Karyawan' ],
            [ 'nama' => 'Pasangan' ],
            [ 'nama' => 'Anak' ],
        ]);
    }
}

<?php
namespace Database\Seeders\Master;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelStatusPersetujuanTanggungan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.status_persetujuan_tanggungan RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('status_persetujuan_tanggungan')->insert([
            [ 'nama' => 'Disetujui' ],
            [ 'nama' => 'Ditolak' ],
        ]);
    }
}

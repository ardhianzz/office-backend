<?php
namespace Database\Seeders\ELembur;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelStatusPersetujuanLembur extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('elembur_sys')->statement("TRUNCATE TABLE ONLY sys.status_persetujuan_lembur RESTART IDENTITY CASCADE");
        DB::connection('elembur_sys')->table('status_persetujuan_lembur')->insert([
            [ 'nama' => 'Disetujui' ],
            [ 'nama' => 'Ditolak' ],
        ]);
    }
}

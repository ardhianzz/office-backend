<?php

use Illuminate\Database\Seeder;

class SeederTabelStatusPersetujuanReimburse extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('ereimburse_sys')->statement("TRUNCATE TABLE ONLY sys.status_persetujuan_reimburse RESTART IDENTITY CASCADE");
        DB::connection('ereimburse_sys')->table('status_persetujuan_reimburse')->insert([
            [ 'nama' => 'Disetujui' ],
            [ 'nama' => 'Ditolak' ],
        ]);
    }
}

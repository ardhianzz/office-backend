<?php

use Illuminate\Database\Seeder;

class SeederTabelStatusCuti extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('ecuti_sys')->statement("TRUNCATE TABLE ONLY sys.status_cuti RESTART IDENTITY CASCADE");
        DB::connection('ecuti_sys')->table('status_cuti')->insert([
            [ 'kode' => 'DRAF', 'nama' => 'Draf' ],
            [ 'kode' => 'PROSES', 'nama' => 'Proses Persetujuan' ],
            [ 'kode' => 'DISETUJUI', 'nama' => 'Disetujui' ],
            [ 'kode' => 'DITOLAK', 'nama' => 'Ditolak' ],
            [ 'kode' => 'BATAL', 'nama' => 'Batal' ],
        ]);
    }
}

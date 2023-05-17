<?php

use Illuminate\Database\Seeder;

class SeederTabelStatusLembur extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('elembur_sys')->statement("TRUNCATE TABLE ONLY sys.status_lembur RESTART IDENTITY CASCADE");
        DB::connection('elembur_sys')->table('status_lembur')->insert([
            [ 'kode' => 'DRAF', 'nama' => 'Draf' ],
            [ 'kode' => 'PROSES', 'nama' => 'Proses Persetujuan' ],
            [ 'kode' => 'DISETUJUI', 'nama' => 'Disetujui' ],
            [ 'kode' => 'DITOLAK', 'nama' => 'Ditolak' ],
            [ 'kode' => 'BATAL', 'nama' => 'Batal' ],
        ]);
    }
}

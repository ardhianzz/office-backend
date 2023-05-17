<?php

use Illuminate\Database\Seeder;

class SeederTabelAksiLembur extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('elembur_sys')->statement("TRUNCATE TABLE ONLY sys.aksi_lembur RESTART IDENTITY CASCADE");
        DB::connection('elembur_sys')->table('aksi_lembur')->insert([
            [ 'kode' => 'KIRIM', 'nama' => 'Kirim', 'awalan' => 'Pengajuan ', 'pesan' => ' mengajukan draf lembur' ],
            [ 'kode' => 'SETUJU', 'nama' => 'Setuju', 'awalan' => 'Penyetujuan ', 'pesan' => ' menyetujui draf lembur' ],
            [ 'kode' => 'TOLAK', 'nama' => 'Tolak', 'awalan' => 'Penolakan ', 'pesan' => ' menolak draf lembur' ],
        ]);
    }
}

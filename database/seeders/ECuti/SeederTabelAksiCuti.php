<?php
namespace Database\Seeders\ECuti;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelAksiCuti extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('ecuti_sys')->statement("TRUNCATE TABLE ONLY sys.aksi_cuti RESTART IDENTITY CASCADE");
        DB::connection('ecuti_sys')->table('aksi_cuti')->insert([
            [ 'kode' => 'KIRIM', 'nama' => 'Kirim', 'awalan' => 'Pengajuan ', 'pesan' => ' mengajukan draf cuti' ],
            [ 'kode' => 'SETUJU', 'nama' => 'Setuju', 'awalan' => 'Penyetujuan ', 'pesan' => ' menyetujui draf cuti' ],
            [ 'kode' => 'TOLAK', 'nama' => 'Tolak', 'awalan' => 'Penolakan ', 'pesan' => ' menolak draf cuti' ],
        ]);
    }
}

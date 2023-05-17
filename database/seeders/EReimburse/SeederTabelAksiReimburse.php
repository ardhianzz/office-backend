<?php
namespace Database\Seeders\EReimburse;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelAksiReimburse extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('ereimburse_sys')->statement("TRUNCATE TABLE ONLY sys.aksi_reimburse RESTART IDENTITY CASCADE");
        DB::connection('ereimburse_sys')->table('aksi_reimburse')->insert([
            [ 'kode' => 'KIRIM', 'nama' => 'Kirim', 'awalan' => 'Pengajuan ', 'pesan' => ' mengajukan draf reimburse' ],
            [ 'kode' => 'SETUJU', 'nama' => 'Setuju', 'awalan' => 'Penyetujuan ', 'pesan' => ' menyetujui draf reimburse' ],
            [ 'kode' => 'TOLAK', 'nama' => 'Tolak', 'awalan' => 'Penolakan ', 'pesan' => ' menolak draf reimburse' ],
            [ 'kode' => 'DIAJUKAN', 'nama' => 'Diajukan', 'awalan' => 'Pengajuan ', 'pesan' => ' mengajukan draf reimburse ke bagian keuangan' ],
            [ 'kode' => 'DIBAYARKAN', 'nama' => 'Dibayarkan', 'awalan' => 'Pembayaran kembali ', 'pesan' => ' mengkonfirmasi draf reimburse telah dibayarkan kembali' ],
        ]);
    }
}

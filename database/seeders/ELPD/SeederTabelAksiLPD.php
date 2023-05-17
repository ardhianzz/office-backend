<?php
namespace Database\Seeders\ELPD;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelAksiLPD extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('elpd_sys')->statement("TRUNCATE TABLE ONLY sys.aksi_lpd RESTART IDENTITY CASCADE");
        DB::connection('elpd_sys')->table('aksi_lpd')->insert([
            [ 'kode' => 'KIRIM', 'nama' => 'Kirim', 'awalan' => 'Pengajuan ', 'pesan' => ' mengajukan draf laporan perjalanan dinas' ],
            [ 'kode' => 'SETUJU', 'nama' => 'Setuju', 'awalan' => 'Penyetujuan ', 'pesan' => ' menyetujui draf laporan perjalanan dinas' ],
            [ 'kode' => 'KEMBALI', 'nama' => 'Kembali', 'awalan' => 'Pengembalian ', 'pesan' => ' mengembalikan draf laporan perjalanan dinas' ],
            [ 'kode' => 'TOLAK', 'nama' => 'Tolak', 'awalan' => 'Penolakan ', 'pesan' => ' menolak draf laporan perjalanan dinas' ],
            [ 'kode' => 'REVISI', 'nama' => 'Revisi', 'awalan' => 'Pengiriman kembali ', 'pesan' => ' merevisi draf laporan perjalanan dinas' ],
            [ 'kode' => 'DIAJUKAN', 'nama' => 'Diajukan', 'awalan' => 'Pengajuan ', 'pesan' => ' mengajukan draf laporan perjalanan dinas ke bagian keuangan' ],
            [ 'kode' => 'DIBAYARKAN', 'nama' => 'Dibayarkan', 'awalan' => 'Pembayaran kembali ', 'pesan' => ' mengkonfirmasi draf laporan perjalanan dinas telah dibayarkan kembali' ],
        ]);
    }
}

<?php
namespace Database\Seeders\ELPD;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelStatusLPD extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('elpd_sys')->statement("TRUNCATE TABLE ONLY sys.status_lpd RESTART IDENTITY CASCADE");
        DB::connection('elpd_sys')->table('status_lpd')->insert([
            [ 'kode' => 'DRAF', 'nama' => 'Draf' ],
            [ 'kode' => 'PROSES', 'nama' => 'Proses Persetujuan' ],
            [ 'kode' => 'DISETUJUI', 'nama' => 'Diserahkan ke Bagian SDM' ],
            [ 'kode' => 'DITOLAK', 'nama' => 'Ditolak' ],
            [ 'kode' => 'DIAJUKAN', 'nama' => 'Diajukan ke Bagian Keuangan' ],
            [ 'kode' => 'DIBAYARKAN', 'nama' => 'Sudah dibayar' ],
        ]);
    }
}

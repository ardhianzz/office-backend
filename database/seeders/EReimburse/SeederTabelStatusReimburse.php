<?php
namespace Database\Seeders\EReimburse;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelStatusReimburse extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('ereimburse_sys')->statement("TRUNCATE TABLE ONLY sys.status_reimburse RESTART IDENTITY CASCADE");
        DB::connection('ereimburse_sys')->table('status_reimburse')->insert([
            [ 'kode' => 'DRAF', 'nama' => 'Draf' ],
            [ 'kode' => 'PROSES', 'nama' => 'Diserahkan ke HRD' ],
            [ 'kode' => 'DISETUJUI', 'nama' => 'Diproses HRD' ],
            [ 'kode' => 'DITOLAK', 'nama' => 'Ditolak' ],
            [ 'kode' => 'DIAJUKAN', 'nama' => 'Diajukan ke Bagian Keuangan' ],
            [ 'kode' => 'DIBAYARKAN', 'nama' => 'Sudah dibayar' ],
        ]);
    }
}

<?php
namespace Database\Seeders\ESurat;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelPengolahanDisposisi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('esurat_sys')->statement("TRUNCATE TABLE ONLY sys.pengolahan_disposisi RESTART IDENTITY CASCADE");
        DB::connection('esurat_sys')->table('pengolahan_disposisi')->insert([
            [ 'nama' => 'Untuk diketahui' ],
            [ 'nama' => 'Mohon Pendapat' ],
            [ 'nama' => 'Mohon Penyelesaian' ],
            [ 'nama' => 'Untuk dibahas bersama' ],
            [ 'nama' => 'Mohon Kedatangan' ],
            [ 'nama' => 'Teliti dan Pelajari' ],
            [ 'nama' => 'Diproses' ],
            [ 'nama' => 'Siapkan jawaban' ],
            [ 'nama' => 'Mohon TTD/Paraf' ],
            [ 'nama' => 'Fotocopy' ],
            [ 'nama' => 'Arsip' ],
        ]);
    }
}

<?php
namespace Database\Seeders\ESurat;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelTipeAktivasiSekretaris extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('esurat_sys')->statement("TRUNCATE TABLE ONLY sys.tipe_aktivasi_sekretaris RESTART IDENTITY CASCADE");
        DB::connection('esurat_sys')->table('tipe_aktivasi_sekretaris')->insert([
            [ 'nama' => 'Semua' ],
            [ 'nama' => 'Penerbitan' ],
            [ 'nama' => 'Penerima' ],
            // [ 'nama' => 'Disposisi' ],
        ]);
    }
}

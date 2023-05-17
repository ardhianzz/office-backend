<?php
namespace Database\Seeders\ESurat;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelJenisSuratMasuk extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('esurat_sys')->statement("TRUNCATE TABLE ONLY sys.jenis_surat_masuk RESTART IDENTITY CASCADE");
        DB::connection('esurat_sys')->table('jenis_surat_masuk')->insert([
            [ 'nama' => 'Surat' ],
            [ 'nama' => 'Tembusan Surat' ],
            [ 'nama' => 'Surat Forward' ],
            [ 'nama' => 'Surat Disposisi' ],
        ]);
    }
}

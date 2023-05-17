<?php

use Illuminate\Database\Seeder;

class SeederTabelKategoriPembayaranLPD extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('elpd_sys')->statement("TRUNCATE TABLE ONLY sys.kategori_pembayaran_lpd RESTART IDENTITY CASCADE");
        DB::connection('elpd_sys')->table('kategori_pembayaran_lpd')->insert([
            [ 'kode' => 'KANTOR', 'nama' => 'Ditanggung kantor' ],
            [ 'kode' => 'SENDIRI', 'nama' => 'Ditanggung sendiri' ],
        ]);
    }
}

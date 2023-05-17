<?php

use Illuminate\Database\Seeder;

class SeederTabelStatusAksesSuratTerbit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('esurat_sys')->statement("TRUNCATE TABLE ONLY sys.status_akses_surat_terbit RESTART IDENTITY CASCADE");
        DB::connection('esurat_sys')->table('status_akses_surat_terbit')->insert([
            [ 'nama' => 'Aktif' ],
            [ 'nama' => 'Selesai' ],
        ]);
    }
}

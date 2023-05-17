<?php

use Illuminate\Database\Seeder;

class SeederModulELPD extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SeederTabelStatusLPD::class,
            SeederTabelStatusPersetujuanLPD::class,
            SeederTabelAksiLPD::class,

            SeederTabelKategoriTujuanLPD::class,
            SeederTabelKategoriTransportasiLPD::class,
            SeederTabelKelasTransportasiLPD::class,
            SeederTabelKategoriPembayaranLPD::class,
            SeederTabelJenisTransportasiLPD::class,
            SeederTabelKategoriTujuanTransportasiLPD::class,
            SeederTabelKatukatransJenisTransportasiLPD::class,
            SeederTabelPenerimaLPD::class,
        ]);
    }
}

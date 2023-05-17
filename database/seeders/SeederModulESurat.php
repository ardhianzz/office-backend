<?php

use Illuminate\Database\Seeder;

class SeederModulESurat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SeederTabelBahasa::class,
            SeederTabelJenisSurat::class,
            SeederTabelJenisSuratMasuk::class,
            SeederTabelPengolahanDisposisi::class,
            SeederTabelJenisPemberkasan::class,
            SeederTabelSifatSurat::class,
            SeederTabelStatusSurat::class,
            SeederTabelAksiSurat::class,
            SeederTabelAksiDisposisiSurat::class,
            SeederTabelStatusBackdate::class,
            SeederTabelStatusAksesSuratTerbit::class,
            SeederTabelStatusDelegasi::class,
            SeederTabelStatusSPSM::class,
            SeederTabelStatusPersetujuanSurat::class,
            SeederTabelStatusPenomoranSurat::class,
            SeederTabelTipeAktivasiSekretaris::class,
            SeederTabelJabatanUnitPenerbitSurat::class,
            SeederTabelJabatanUnitPenerimaSurat::class,
            SeederTabelJenisSPSM::class,
        ]);
    }
}

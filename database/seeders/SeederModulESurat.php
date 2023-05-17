<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Master\SeederTabelAgama;

use Database\Seeders\ESurat\SeederTabelBahasa;
use Database\Seeders\ESurat\SeederTabelJenisSurat;
use Database\Seeders\ESurat\SeederTabelJenisSuratMasuk;
use Database\Seeders\ESurat\SeederTabelPengolahanDisposisi;
use Database\Seeders\ESurat\SeederTabelJenisPemberkasan;
use Database\Seeders\ESurat\SeederTabelSifatSurat;
use Database\Seeders\ESurat\SeederTabelStatusSurat;
use Database\Seeders\ESurat\SeederTabelAksiSurat;
use Database\Seeders\ESurat\SeederTabelAksiDisposisiSurat;
use Database\Seeders\ESurat\SeederTabelStatusBackdate;
use Database\Seeders\ESurat\SeederTabelStatusAksesSuratTerbit;
use Database\Seeders\ESurat\SeederTabelStatusDelegasi;
use Database\Seeders\ESurat\SeederTabelStatusSPSM;
use Database\Seeders\ESurat\SeederTabelStatusPersetujuanSurat;
use Database\Seeders\ESurat\SeederTabelStatusPenomoranSurat;
use Database\Seeders\ESurat\SeederTabelTipeAktivasiSekretaris;
use Database\Seeders\ESurat\SeederTabelJabatanUnitPenerbitSurat;
use Database\Seeders\ESurat\SeederTabelJabatanUnitPenerimaSurat;
use Database\Seeders\ESurat\SeederTabelJenisSPSM;


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

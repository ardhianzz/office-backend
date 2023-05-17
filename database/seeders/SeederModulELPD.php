<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\Seeders\ELPD\SeederTabelStatusLPD;
use Database\Seeders\ELPD\SeederTabelStatusPersetujuanLPD;
use Database\Seeders\ELPD\SeederTabelAksiLPD;
use Database\Seeders\ELPD\SeederTabelKategoriTujuanLPD;
use Database\Seeders\ELPD\SeederTabelKategoriTransportasiLPD;
use Database\Seeders\ELPD\SeederTabelKelasTransportasiLPD;
use Database\Seeders\ELPD\SeederTabelKategoriPembayaranLPD;
use Database\Seeders\ELPD\SeederTabelJenisTransportasiLPD;
use Database\Seeders\ELPD\SeederTabelKategoriTujuanTransportasiLPD;
use Database\Seeders\ELPD\SeederTabelKatukatransJenisTransportasiLPD;
use Database\Seeders\ELPD\SeederTabelPenerimaLPD;
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

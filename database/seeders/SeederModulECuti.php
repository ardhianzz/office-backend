<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ECuti\SeederTabelJenisHariLibur;
use Database\Seeders\ECuti\SeederTabelHariLibur;
use Database\Seeders\ECuti\SeederTabelTanggalHariLibur;
use Database\Seeders\ECuti\SeederTabelStatusCuti;
use Database\Seeders\ECuti\SeederTabelStatusPersetujuanCuti;
use Database\Seeders\ECuti\SeederTabelAksiCuti;
use Database\Seeders\ECuti\SeederTabelJenisHariCuti;
use Database\Seeders\ECuti\SeederTabelJenisCuti;
use Database\Seeders\ECuti\SeederTabelPenerimaCuti;
use Database\Seeders\ECuti\SeederTabelPejabatPemeriksaCuti;
use Database\Seeders\ECuti\SeederTabelJatahCutiHarian;

class SeederModulECuti extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SeederTabelJenisHariLibur::class,
            SeederTabelHariLibur::class,
            SeederTabelTanggalHariLibur::class,
            SeederTabelStatusCuti::class,
            SeederTabelStatusPersetujuanCuti::class,
            SeederTabelAksiCuti::class,
            SeederTabelJenisHariCuti::class,
            SeederTabelJenisCuti::class,
            SeederTabelPenerimaCuti::class,
            SeederTabelPejabatPemeriksaCuti::class,
            SeederTabelJatahCutiHarian::class,
        ]);
    }
}

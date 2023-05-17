<?php

use Illuminate\Database\Seeder;

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

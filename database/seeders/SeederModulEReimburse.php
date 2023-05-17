<?php

use Illuminate\Database\Seeder;

class SeederModulEReimburse extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SeederTabelStatusReimburse::class,
            SeederTabelStatusPersetujuanReimburse::class,
            SeederTabelAksiReimburse::class,
            SeederTabelPejabatPemeriksaReimburse::class,
        ]);
    }
}

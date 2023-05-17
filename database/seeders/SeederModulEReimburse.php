<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\Seeders\EReimburse\SeederTabelStatusReimburse;
use Database\Seeders\EReimburse\SeederTabelStatusPersetujuanReimburse;
use Database\Seeders\EReimburse\SeederTabelAksiReimburse;
use Database\Seeders\EReimburse\SeederTabelPejabatPemeriksaReimburse;

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

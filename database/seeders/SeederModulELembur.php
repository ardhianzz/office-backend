<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ELembur\SeederTabelStatusLembur;
use Database\Seeders\ELembur\SeederTabelStatusPersetujuanLembur;
use Database\Seeders\ELembur\SeederTabelAksiLembur;
use Database\Seeders\ELembur\SeederTabelPenerimaLembur;

class SeederModulELembur extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SeederTabelStatusLembur::class,
            SeederTabelStatusPersetujuanLembur::class,
            SeederTabelAksiLembur::class,
            SeederTabelPenerimaLembur::class,
        ]);
    }
}

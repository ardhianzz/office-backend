<?php

use Illuminate\Database\Seeder;

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

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\SeederUpdateDataKaryawanBaru;
use Database\Seeders\SeederUpdateJatahCuti;
use Database\Seeders\SeederUpdateTabelJabatanUnitUser;
use Database\Seeders\SeederGenerateTTDUser;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SeederModulMaster::class,
            SeederModulESurat::class,
            SeederModulELembur::class,
            SeederModulECuti::class, 
            SeederModulEReimburse::class,
            SeederModulELPD::class,

            /* BERIKUT UPDATE SEEDER SETELAH SEEDER MASTER SELESAI DI JALANKAN */
            SeederUpdateDataKaryawanBaru::class,
            SeederUpdateJatahCuti::class,
            SeederUpdateTabelJabatanUnitUser::class,
            SeederGenerateTTDUser::class,
        ]);
    }
}

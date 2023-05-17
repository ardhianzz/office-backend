<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Master\SeederTabelAgama;
use Database\Seeders\Master\SeederTabelBank;
use Database\Seeders\Master\SeederTabelJenisKelamin;
use Database\Seeders\Master\SeederTabelNegara;
use Database\Seeders\Master\SeederTabelProvinsi;
use Database\Seeders\Master\SeederTabelKota;
use Database\Seeders\Master\SeederTabelStatusTanggunganKaryawan;
use Database\Seeders\Master\SeederTabelStatusPernikahan;
use Database\Seeders\Master\SeederTabelStatusHubunganTanggungan;
use Database\Seeders\Master\SeederTabelStatusTanggungan;
use Database\Seeders\Master\SeederTabelStatusPersetujuanTanggungan;
use Database\Seeders\Master\SeederTabelLevelKaryawan;
use Database\Seeders\Master\SeederTabelUser;
use Database\Seeders\Master\SeederTabelProfilUser;
use Database\Seeders\Master\SeederTabelKaryawan;
use Database\Seeders\Master\SeederTabelTanggungan;
use Database\Seeders\Master\SeederTabelOrganisasi;
use Database\Seeders\Master\SeederTabelJabatan;
use Database\Seeders\Master\SeederTabelUnit;
use Database\Seeders\Master\SeederTabelJabatanUnit;
use Database\Seeders\Master\SeederTabelJenisJabatanUnitUser;
use Database\Seeders\Master\SeederTabelJabatanUnitUser;
use Database\Seeders\Master\SeederTabelModul;
use Database\Seeders\Master\SeederTabelGrupModul;
use Database\Seeders\Master\SeederTabelUserGrupModul;
use Database\Seeders\Master\SeederTabelAksesModul;


class SeederModulMaster extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SeederTabelAgama::class,
            SeederTabelBank::class,
            SeederTabelJenisKelamin::class,
            SeederTabelNegara::class,
            SeederTabelProvinsi::class,
            SeederTabelKota::class,
            SeederTabelStatusTanggunganKaryawan::class,
            SeederTabelStatusPernikahan::class,
            SeederTabelStatusHubunganTanggungan::class,
            SeederTabelStatusTanggungan::class,
            SeederTabelStatusPersetujuanTanggungan::class,
            SeederTabelLevelKaryawan::class,
            SeederTabelUser::class,
            SeederTabelProfilUser::class,
            SeederTabelKaryawan::class,
            SeederTabelTanggungan::class,
            SeederTabelOrganisasi::class,
            SeederTabelJabatan::class,
            SeederTabelUnit::class,
            SeederTabelJabatanUnit::class,
            SeederTabelJenisJabatanUnitUser::class,
            SeederTabelJabatanUnitUser::class,
            SeederTabelModul::class,
            SeederTabelGrupModul::class,
            SeederTabelUserGrupModul::class,
            SeederTabelAksesModul::class,
        ]);
    }
}

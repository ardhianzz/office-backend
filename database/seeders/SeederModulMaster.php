<?php

use Illuminate\Database\Seeder;

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

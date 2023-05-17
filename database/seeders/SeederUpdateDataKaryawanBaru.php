<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Master\ProfilUser;
use App\Models\Master\Karyawan;

use Carbon\Carbon;

class SeederUpdateDataKaryawanBaru extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_update_karyawan_baru = [
            [
                'id_user' => 108,
                'no_ktp' => '3301210905860002',
                'tanggal_lahir' => '1986-05-09',
                'status_tanggungan' => STATUS_TANGGUNGAN_K2,
                'no_npwp' => '74.542.738.5-522.000',
                'no_bpjs_tenaga_kerja' => '07011501934',
                'no_bpjs_kesehatan' => '0001133091549',
                'tanggal_masuk' => '2020-10-01',
                'tanggal_pensiun' => Carbon::parse('1986-05-09')->addYears(USIA_PENSIUN)->format('Y-m-d'),
                'id_bank_payroll' => 5,
                'no_bank_payroll' => '3120-01-002642-50-0'
            ],
            [
                'id_user' => 109,
                'no_ktp' => '3301220107750051',
                'tanggal_lahir' => '1975-07-01',
                'status_tanggungan' => STATUS_TANGGUNGAN_K2,
                'no_npwp' => '69.463.767.9-522.000',
                'no_bpjs_tenaga_kerja' => '05L20052078',
                'no_bpjs_kesehatan' => '0001448657043',
                'tanggal_masuk' => '2020-10-01',
                'tanggal_pensiun' => Carbon::parse('1975-07-01')->addYears(USIA_PENSIUN)->format('Y-m-d'),
                'id_bank_payroll' => 5,
                'no_bank_payroll' => '3118-01-032293-53-0'
            ],
            [
                'id_user' => 110,
                'no_ktp' => '3301012801960001',
                'tanggal_lahir' => '1996-01-28',
                'status_tanggungan' => STATUS_TANGGUNGAN_K,
                'no_npwp' => '11.257.929.7-522.000',
                'no_bpjs_tenaga_kerja' => '14028614973',
                'no_bpjs_kesehatan' => '0001439409486',
                'tanggal_masuk' => '2020-10-01',
                'tanggal_pensiun' => Carbon::parse('1996-01-28')->addYears(USIA_PENSIUN)->format('Y-m-d'),
                'id_bank_payroll' => 5,
                'no_bank_payroll' => '6779-01-006027-53-0'
            ],
            [
                'id_user' => 111,
                'no_ktp' => '3301226002740002',
                'tanggal_lahir' => '1974-02-20',
                'status_tanggungan' => STATUS_TANGGUNGAN_TK3,
                'no_npwp' => '26.673.012.6-522.999',
                'no_bpjs_tenaga_kerja' => '07L20006880',
                'no_bpjs_kesehatan' => '0001132373722',
                'tanggal_masuk' => '2020-10-01',
                'tanggal_pensiun' => Carbon::parse('1974-02-20')->addYears(USIA_PENSIUN)->format('Y-m-d'),
                'id_bank_payroll' => 5,
                'no_bank_payroll' => '0106-01-033646-50-6'
            ],
            [
                'id_user' => 112,
                'no_ktp' => '3301222205720004',
                'tanggal_lahir' => '1972-05-22',
                'status_tanggungan' => STATUS_TANGGUNGAN_K2,
                'no_npwp' => '96.091.096.6-522.000',
                'no_bpjs_tenaga_kerja' => '13034832843',
                'no_bpjs_kesehatan' => '0001155149943',
                'tanggal_masuk' => '2020-10-01',
                'tanggal_pensiun' => Carbon::parse('1972-05-22')->addYears(USIA_PENSIUN)->format('Y-m-d'),
                'id_bank_payroll' => 5,
                'no_bank_payroll' => '0106-01-033674-50-9'
            ],
            [
                'id_user' => 113,
                'no_ktp' => '3301214606890005',
                'tanggal_lahir' => '1989-06-06',
                'status_tanggungan' => STATUS_TANGGUNGAN_TK,
                'no_npwp' => '96.100.643.4-522.000',
                'no_bpjs_tenaga_kerja' => '11027298055',
                'no_bpjs_kesehatan' => '0001141956303',
                'tanggal_masuk' => '2020-10-01',
                'tanggal_pensiun' => Carbon::parse('1989-06-06')->addYears(USIA_PENSIUN)->format('Y-m-d'),
                'id_bank_payroll' => 5,
                'no_bank_payroll' => '0106-01-033647-50-2'
            ],
            [
                'id_user' => 114,
                'no_ktp' => '3301232806930002',
                'tanggal_lahir' => '1993-06-28',
                'status_tanggungan' => STATUS_TANGGUNGAN_K2,
                'no_npwp' => '81.294.945.1-522.000',
                'no_bpjs_tenaga_kerja' => '17050904626',
                'no_bpjs_kesehatan' => '0000080882469',
                'tanggal_masuk' => '2020-10-01',
                'tanggal_pensiun' => Carbon::parse('1993-06-28')->addYears(USIA_PENSIUN)->format('Y-m-d'),
                'id_bank_payroll' => 5,
                'no_bank_payroll' => '0106-01-060151-50-6'
            ],
            [
                'id_user' => 115,
                'no_ktp' => '3301061108920001',
                'tanggal_lahir' => '1992-08-11',
                'status_tanggungan' => STATUS_TANGGUNGAN_K1,
                'no_npwp' => '93.026.503.8-522.000',
                'no_bpjs_tenaga_kerja' => '17022143774',
                'no_bpjs_kesehatan' => '0001630035988',
                'tanggal_masuk' => '2020-10-01',
                'tanggal_pensiun' => Carbon::parse('1992-08-11')->addYears(USIA_PENSIUN)->format('Y-m-d'),
                'id_bank_payroll' => 5,
                'no_bank_payroll' => '6672-01-024621-53-2'
            ],
        ];

        foreach ($data_update_karyawan_baru as $data) {
            ProfilUser::where('id_user', $data['id_user'])->update(['no_ktp' => $data['no_ktp'], 'tanggal_lahir' => $data['tanggal_lahir']]);
            Karyawan::where('id_user', $data['id_user'])->update([
                'status_tanggungan' => $data['status_tanggungan'],
                'no_npwp' => $data['no_npwp'],
                'no_bpjs_tenaga_kerja' => $data['no_bpjs_tenaga_kerja'],
                'no_bpjs_kesehatan' => $data['no_bpjs_kesehatan'],
                'tanggal_masuk' => $data['tanggal_masuk'],
                'tanggal_pensiun' => $data['tanggal_pensiun'],
                'id_bank_payroll' => $data['id_bank_payroll'],
                'no_bank_payroll' => $data['no_bank_payroll']
            ]);
        }
    }
}

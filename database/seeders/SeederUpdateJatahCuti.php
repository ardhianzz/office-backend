<?php

use Illuminate\Database\Seeder;

use App\Models\Master\JabatanUnitUser;
use App\Models\ECuti\Cuti;
use App\Models\ECuti\JatahCutiHarian;

class SeederUpdateJatahCuti extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_cuti_user = [
            [
                'id_user' => 23,
                'cuti_ibadah' => true,
                'sisa_cuti_tahunan' => 15,
            ],
            [
                'id_user' => 18,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 12,
            ],
            [
                'id_user' => 82,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 10,
            ],
            [
                'id_user' => 13,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 10,
            ],
            [
                'id_user' => 20,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 9,
            ],
            [
                'id_user' => 22,
                'cuti_ibadah' => true,
                'sisa_cuti_tahunan' => 15,
            ],
            [
                'id_user' => 79,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 11,
            ],
            [
                'id_user' => 85,
                'cuti_ibadah' => true,
                'sisa_cuti_tahunan' => 15,
            ],
            [
                'id_user' => 59,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 13,
            ],
            [
                'id_user' => 21,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 10,
            ],
            [
                'id_user' => 54,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 8,
            ],
            [
                'id_user' => 26,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 7,
            ],
            [
                'id_user' => 83,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 7,
            ],
            [
                'id_user' => 60,
                'cuti_ibadah' => true,
                'sisa_cuti_tahunan' => 12,
            ],
            [
                'id_user' => 66,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 10,
            ],
            [
                'id_user' => 88,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 10,
            ],
            [
                'id_user' => 84,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 9,
            ],
            [
                'id_user' => 73,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 9,
            ],
            [
                'id_user' => 76,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 10,
            ],
            [
                'id_user' => 41,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 11,
            ],
            [
                'id_user' => 33,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 9,
            ],
            [
                'id_user' => 25,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 8,
            ],
            [
                'id_user' => 42,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 9,
            ],
            [
                'id_user' => 63,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 10,
            ],
            [
                'id_user' => 44,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 11,
            ],
            [
                'id_user' => 34,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 9,
            ],
            [
                'id_user' => 64,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 9,
            ],
            [
                'id_user' => 45,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 10,
            ],
            [
                'id_user' => 71,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 10,
            ],
            [
                'id_user' => 65,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 8,
            ],
            [
                'id_user' => 89,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 8,
            ],
            [
                'id_user' => 43,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 11,
            ],
            [
                'id_user' => 47,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 9,
            ],
            [
                'id_user' => 78,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 10,
            ],
            [
                'id_user' => 67,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 11,
            ],
            [
                'id_user' => 46,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 10,
            ],
            [
                'id_user' => 50,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 10,
            ],
            [
                'id_user' => 31,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 9,
            ],
            [
                'id_user' => 32,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 9,
            ],
            [
                'id_user' => 38,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 10,
            ],
            [
                'id_user' => 91,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 10,
            ],
            [
                'id_user' => 62,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 11,
            ],
            [
                'id_user' => 77,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 11,
            ],
            [
                'id_user' => 35,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 7,
            ],
            [
                'id_user' => 56,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 5,
            ],
            [
                'id_user' => 97,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 11,
            ],
            [
                'id_user' => 99,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 11,
            ],
            [
                'id_user' => 100,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 8,
            ],
            [
                'id_user' => 101,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 10,
            ],
            [
                'id_user' => 102,
                'cuti_ibadah' => false,
                'sisa_cuti_tahunan' => 7,
            ],
        ];

        foreach ($data_cuti_user as $data) {
            if ($data['cuti_ibadah']) Cuti::create([
                'id_jenis_cuti' => JENIS_CUTI_HAJI,
                'status' => STATUS_CUTI_DISETUJUI,
                'posisi' => 9,
                'tanggal_awal' => '2021-01-01',
                'tanggal_akhir' => '2021-01-01',
                'keterangan' => 'Haji',
                'approved_at' => '2021-01-01 00:00:00',
                'created_by' => JabatanUnitUser::where('id_user', $data['id_user'])->where('id_jenis_juu', JENIS_JKU_ASLI)->first()->id,
                'updated_by' => JabatanUnitUser::where('id_user', $data['id_user'])->where('id_jenis_juu', JENIS_JKU_ASLI)->first()->id,
                'deleted_by' => 9,
                'deleted_at' => '2021-01-01 00:00:00',
            ]);

            JatahCutiHarian::where('id_user', $data['id_user'])->where('tahun', date('Y'))->update(['sisa' => $data['sisa_cuti_tahunan']]);
        }
    }
}

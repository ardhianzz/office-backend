<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

use App\Models\Master\User;
use App\Models\ECuti\JatahCutiHarian;

class SeederTabelJatahCutiHarian extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('ecuti_trs')->statement("TRUNCATE TABLE ONLY trs.jatah_cuti_harian RESTART IDENTITY CASCADE");

        $input_jatah_cuti_harian = [];
        $daftar_user = User::whereHas('profil_user')->whereHas('karyawan')->with(['profil_user', 'karyawan'])->get();
        foreach ($daftar_user as $user) {
            if (isset($user->karyawan->tanggal_masuk)) $jatah_cuti = Carbon::parse($user->karyawan->tanggal_masuk)->diffInYears(Carbon::today()) > BATAS_MINIMAL_PENGABDIAN_UNTUK_PENAMBAHAN_KUOTA_CUTI_HARIAN ? MAKSIMAL_KUOTA_CUTI_HARIAN : MINIMAL_KUOTA_CUTI_HARIAN;
            else $jatah_cuti = 12;

            $jatah_cuti_harian = JatahCutiHarian::where('id_user', $user->id)->where('tahun', (int)date('Y'))->first();
            if (is_null($jatah_cuti_harian)) $input_jatah_cuti_harian[] = ['id_user' => $user->id, 'tahun' => (int)date('Y'), 'jumlah' => $jatah_cuti, 'sisa' => $jatah_cuti];
        }

        DB::connection('ecuti_trs')->table('jatah_cuti_harian')->insert($input_jatah_cuti_harian);
    }
}

<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Master\User;
use Endroid\QrCode\QrCode;


class SeederGenerateTTDUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftar_user = User::all();
        foreach ($daftar_user as $user) {
            if (isset($user->karyawan->nik)) {
                if (!file_exists(base_path(ETTD_PATH . trim($user->karyawan->nik) . '.png'))) {
                    $qrCode = new QrCode($user->karyawan->nik);
                    $qrCode->writeFile(base_path(ETTD_PATH . trim($user->karyawan->nik) . '.png'));
                }
            }
        }
    }
}

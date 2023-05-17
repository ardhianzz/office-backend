<?php
namespace Database\Seeders\Master;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

use App\Models\Master\User;

class SeederTabelUserGrupModul extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.user_grup_modul RESTART IDENTITY CASCADE");

        $input_user_grup_modul = [];

        for ($i = 1 ; $i <= User::count() ; $i++) {
            $input_user_grup_modul[] = [
                'id_user' => $i,
                'id_grup_modul' => GRUP_USER
            ];
        }

        $input_user_grup_modul[] = [
            'id_user' => 11,
            'id_grup_modul' => GRUP_ADMIN_IT
        ];

        $input_user_grup_modul[] = [
            'id_user' => 106,
            'id_grup_modul' => GRUP_ADMIN_IT
        ];

        $input_user_grup_modul[] = [
            'id_user' => 19,
            'id_grup_modul' => GRUP_ADMIN_HRD
        ];

        $input_user_grup_modul[] = [
            'id_user' => 75,
            'id_grup_modul' => GRUP_ADMIN_HRD
        ];

        DB::connection('master_sys')->table('user_grup_modul')->insert($input_user_grup_modul);
    }
}

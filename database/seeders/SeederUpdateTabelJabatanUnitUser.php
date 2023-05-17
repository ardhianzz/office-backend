<?php

use Illuminate\Database\Seeder;

use App\Models\Master\JabatanUnitUser;

class SeederUpdateTabelJabatanUnitUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_update_juu = [
            [ 'id' => 1, 'data' => [ 'id_parent' => 0 ]],
            [ 'id' => 2, 'data' => [ 'id_parent' => 1 ]],
            [ 'id' => 3, 'data' => [ 'id_parent' => 2 ]],
            [ 'id' => 4, 'data' => [ 'id_parent' => 1 ]],
            [ 'id' => 5, 'data' => [ 'id_parent' => 1 ]],
            [ 'id' => 6, 'data' => [ 'id_parent' => 1 ]],
            [ 'id' => 7, 'data' => [ 'id_parent' => 16 ]],
            [ 'id' => 8, 'data' => [ 'id_parent' => 3 ]],
            [ 'id' => 9, 'data' => [ 'id_parent' => 3 ]],
            [ 'id' => 10, 'data' => [ 'id_parent' => 14 ]],
            [ 'id' => 11, 'data' => [ 'id_parent' => 17 ]],
            [ 'id' => 12, 'data' => [ 'id_parent' => 16 ]],
            [ 'id' => 13, 'data' => [ 'id_parent' => 5 ]],
            [ 'id' => 14, 'data' => [ 'id_parent' => 2 ]],
            [ 'id' => 15, 'data' => [ 'id_parent' => 24 ]],
            [ 'id' => 16, 'data' => [ 'id_parent' => 21 ]],
            [ 'id' => 17, 'data' => [ 'id_parent' => 23 ]],
            [ 'id' => 18, 'data' => [ 'id_parent' => 14 ]],
            [ 'id' => 19, 'data' => [ 'id_parent' => 14 ]],
            [ 'id' => 20, 'data' => [ 'id_parent' => 16 ]],
            [ 'id' => 21, 'data' => [ 'id_parent' => 3 ]],
            [ 'id' => 22, 'data' => [ 'id_parent' => 21 ]],
            [ 'id' => 23, 'data' => [ 'id_parent' => 3 ]],
            [ 'id' => 24, 'data' => [ 'id_parent' => 8 ]],
            [ 'id' => 25, 'data' => [ 'id_parent' => 23 ]],
            [ 'id' => 26, 'data' => [ 'id_parent' => 23 ]],
            [ 'id' => 27, 'data' => [ 'id_parent' => 16 ]],
            [ 'id' => 28, 'data' => [ 'id_parent' => 24 ]],
            [ 'id' => 29, 'data' => [ 'id_parent' => 9 ]],
            [ 'id' => 30, 'data' => [ 'id_parent' => 38 ]],
            [ 'id' => 31, 'data' => [ 'id_parent' => 36 ]],
            [ 'id' => 32, 'data' => [ 'id_parent' => 36 ]],
            [ 'id' => 33, 'data' => [ 'id_parent' => 30]],
            [ 'id' => 34, 'data' => [ 'id_parent' => 36 ]],
            [ 'id' => 35, 'data' => [ 'id_parent' => 36 ]],
            [ 'id' => 36, 'data' => [ 'id_parent' => 38 ]],
            [ 'id' => 37, 'data' => [ 'id_parent' => 36 ]],
            [ 'id' => 38, 'data' => [ 'id_parent' => 5 ]],
            [ 'id' => 39, 'data' => [ 'id_parent' => 36 ]],
            [ 'id' => 40, 'data' => [ 'id_parent' => 41 ]],
            [ 'id' => 41, 'data' => [ 'id_parent' => 5 ]],
            [ 'id' => 42, 'data' => [ 'id_parent' => 40 ]],
            [ 'id' => 43, 'data' => [ 'id_parent' => 41 ]],
            [ 'id' => 44, 'data' => [ 'id_parent' => 40 ]],
            [ 'id' => 45, 'data' => [ 'id_parent' => 40 ]],
            [ 'id' => 46, 'data' => [ 'id_parent' => 43 ]],
            [ 'id' => 47, 'data' => [ 'id_parent' => 40 ]],
            [ 'id' => 48, 'data' => [ 'id_parent' => 40 ]],
            [ 'id' => 49, 'data' => [ 'id_parent' => 40 ]],
            [ 'id' => 50, 'data' => [ 'id_parent' => 57 ]],
            [ 'id' => 51, 'data' => [ 'id_parent' => 5 ]],
            [ 'id' => 52, 'data' => [ 'id_parent' => 55 ]],
            [ 'id' => 53, 'data' => [ 'id_parent' => 57 ]],
            [ 'id' => 54, 'data' => [ 'id_parent' => 57 ]],
            [ 'id' => 55, 'data' => [ 'id_parent' => 51 ]],
            [ 'id' => 56, 'data' => [ 'id_parent' => 57 ]],
            [ 'id' => 57, 'data' => [ 'id_parent' => 51 ]],
            [ 'id' => 58, 'data' => [ 'id_parent' => 57 ]],
            [ 'id' => 59, 'data' => [ 'id_parent' => 57 ]],
            [ 'id' => 60, 'data' => [ 'id_parent' => NULL ]],
            [ 'id' => 61, 'data' => [ 'id_parent' => NULL ]],
            [ 'id' => 62, 'data' => [ 'id_parent' => NULL ]],
            [ 'id' => 63, 'data' => [ 'id_parent' => NULL ]],
            [ 'id' => 64, 'data' => [ 'id_parent' => NULL ]],
            [ 'id' => 65, 'data' => [ 'id_parent' => 14 ]],
            [ 'id' => 66, 'data' => [ 'id_parent' => NULL ]],
            [ 'id' => 67, 'data' => [ 'id_parent' => NULL ]],
            [ 'id' => 68, 'data' => [ 'id_parent' => NULL ]],
            [ 'id' => 69, 'data' => [ 'id_parent' => 79 ]],
            [ 'id' => 70, 'data' => [ 'id_parent' => 5 ]],
            [ 'id' => 71, 'data' => [ 'id_parent' => 73 ]],
            [ 'id' => 72, 'data' => [ 'id_parent' => 73 ]],
            [ 'id' => 73, 'data' => [ 'id_parent' => 5 ]],
            [ 'id' => 74, 'data' => [ 'id_parent' => 4 ]],
            [ 'id' => 75, 'data' => [ 'id_parent' => 5 ]],
            [ 'id' => 76, 'data' => [ 'id_parent' => 82 ]],
            [ 'id' => 77, 'data' => [ 'id_parent' => 93 ]],
            [ 'id' => 78, 'data' => [ 'id_parent' => 95 ]],
            [ 'id' => 79, 'data' => [ 'id_parent' => 75 ]],
            [ 'id' => 80, 'data' => [ 'id_parent' => 4 ]],
            [ 'id' => 81, 'data' => [ 'id_parent' => 75 ]],
            [ 'id' => 82, 'data' => [ 'id_parent' => 70 ]],
            [ 'id' => 83, 'data' => [ 'id_parent' => 73 ]],
            [ 'id' => 84, 'data' => [ 'id_parent' => 95 ]],
            [ 'id' => 85, 'data' => [ 'id_parent' => 74 ]],
            [ 'id' => 86, 'data' => [ 'id_parent' => 98 ]],
            [ 'id' => 87, 'data' => [ 'id_parent' => 4 ]],
            [ 'id' => 88, 'data' => [ 'id_parent' => 70 ]],
            [ 'id' => 89, 'data' => [ 'id_parent' => 73 ]],
            [ 'id' => 90, 'data' => [ 'id_parent' => 79 ]],
            [ 'id' => 91, 'data' => [ 'id_parent' => 84 ]],
            [ 'id' => 92, 'data' => [ 'id_parent' => 70 ]],
            [ 'id' => 93, 'data' => [ 'id_parent' => 73 ]],
            [ 'id' => 94, 'data' => [ 'id_parent' => 98 ]],
            [ 'id' => 95, 'data' => [ 'id_parent' => 5 ]],
            [ 'id' => 96, 'data' => [ 'id_parent' => 73 ]],
            [ 'id' => 97, 'data' => [ 'id_parent' => 95 ]],
            [ 'id' => 98, 'data' => [ 'id_parent' => 5 ]],
            [ 'id' => 99, 'data' => [ 'id_parent' => 86 ]],
            [ 'id' => 100, 'data' => [ 'id_parent' => 70 ]],
            [ 'id' => 101, 'data' => [ 'id_parent' => 72 ]],
            [ 'id' => 102, 'data' => [ 'id_parent' => 70 ]],
            [ 'id' => 103, 'data' => [ 'id_parent' => 88 ]],
            [ 'id' => 104, 'data' => [ 'id_parent' => NULL ]],
            [ 'id' => 105, 'data' => [ 'id_parent' => 73 ]],
            [ 'id' => 106, 'data' => [ 'id_parent' => 21 ]],
        ];

        foreach ($data_update_juu as $update_juu) {
            $juu = JabatanUnitUser::find($update_juu['id']);
            if ($juu) $juu->update($update_juu['data']);
        }
    }
}

<?php
namespace Database\Seeders\ECuti;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelTanggalHariLibur extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('ecuti_sys')->statement("TRUNCATE TABLE ONLY sys.tanggal_hari_libur RESTART IDENTITY CASCADE");
        DB::connection('ecuti_sys')->table('tanggal_hari_libur')->insert([
            [ 'id_hari_libur' => 1, 'tanggal' => '2021-01-01' ],
            [ 'id_hari_libur' => 2, 'tanggal' => '2021-02-12' ],
            [ 'id_hari_libur' => 3, 'tanggal' => '2021-03-11' ],
            [ 'id_hari_libur' => 4, 'tanggal' => '2021-03-14' ],
            [ 'id_hari_libur' => 5, 'tanggal' => '2021-04-02' ],
            [ 'id_hari_libur' => 6, 'tanggal' => '2021-05-01' ],
            [ 'id_hari_libur' => 7, 'tanggal' => '2021-05-26' ],
            [ 'id_hari_libur' => 8, 'tanggal' => '2021-05-13' ],
            [ 'id_hari_libur' => 9, 'tanggal' => '2021-05-13' ],
            [ 'id_hari_libur' => 9, 'tanggal' => '2021-05-14' ],
            [ 'id_hari_libur' => 10, 'tanggal' => '2021-06-01' ],
            [ 'id_hari_libur' => 11, 'tanggal' => '2021-07-20' ],
            [ 'id_hari_libur' => 12, 'tanggal' => '2021-08-17' ],
            [ 'id_hari_libur' => 13, 'tanggal' => '2021-08-10' ],
            [ 'id_hari_libur' => 14, 'tanggal' => '2021-10-19' ],
            [ 'id_hari_libur' => 15, 'tanggal' => '2021-12-25' ],
            [ 'id_hari_libur' => 16, 'tanggal' => '2021-05-12' ],
            [ 'id_hari_libur' => 16, 'tanggal' => '2021-12-24' ],
        ]);
    }
}

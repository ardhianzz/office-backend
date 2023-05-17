<?php
namespace Database\Seeders\ECuti;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelHariLibur extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('ecuti_sys')->statement("TRUNCATE TABLE ONLY sys.hari_libur RESTART IDENTITY CASCADE");
        DB::connection('ecuti_sys')->table('hari_libur')->insert([
            /*1*/[ 'nama' => 'Tahun Baru Masehi', 'tanggal' => 1, 'bulan' => 1, 'id_jenis_hari_libur' => JENIS_HARI_LIBUR_TETAP_SETIAP_TAHUN ],
            /*2*/[ 'nama' => 'Tahun Baru Imlek', 'tanggal' => NULL, 'bulan' => NULL, 'id_jenis_hari_libur' => JENIS_HARI_LIBUR_BERUBAH_SETIAP_TAHUN ],
            /*3*/[ 'nama' => 'Isra Miraj Nabi Muhammad SAW.', 'tanggal' => NULL, 'bulan' => NULL, 'id_jenis_hari_libur' => JENIS_HARI_LIBUR_BERUBAH_SETIAP_TAHUN ],
            /*4*/[ 'nama' => 'Hari Suci Nyepi', 'tanggal' => NULL, 'bulan' => NULL, 'id_jenis_hari_libur' => JENIS_HARI_LIBUR_BERUBAH_SETIAP_TAHUN ],
            /*5*/[ 'nama' => 'Wafat Isa Al Masih', 'tanggal' => NULL, 'bulan' => NULL, 'id_jenis_hari_libur' => JENIS_HARI_LIBUR_BERUBAH_SETIAP_TAHUN ],
            /*6*/[ 'nama' => 'Hari Buruh Internasional', 'tanggal' => 1, 'bulan' => 5, 'id_jenis_hari_libur' => JENIS_HARI_LIBUR_TETAP_SETIAP_TAHUN ],
            /*7*/[ 'nama' => 'Hari Raya Waisak', 'tanggal' => NULL, 'bulan' => NULL, 'id_jenis_hari_libur' => JENIS_HARI_LIBUR_BERUBAH_SETIAP_TAHUN ],
            /*8*/[ 'nama' => 'Kenaikan Isa Al Masih', 'tanggal' => NULL, 'bulan' => NULL, 'id_jenis_hari_libur' => JENIS_HARI_LIBUR_BERUBAH_SETIAP_TAHUN ],
            /*9*/[ 'nama' => 'Hari Raya Idul Fitri', 'tanggal' => NULL, 'bulan' => NULL, 'id_jenis_hari_libur' => JENIS_HARI_LIBUR_BERUBAH_SETIAP_TAHUN ],
            /*10*/[ 'nama' => 'Hari Lahir Pancasila', 'tanggal' => 1, 'bulan' => 6, 'id_jenis_hari_libur' => JENIS_HARI_LIBUR_TETAP_SETIAP_TAHUN ],
            /*11*/[ 'nama' => 'Hari Raya Idul Adha', 'tanggal' => NULL, 'bulan' => NULL, 'id_jenis_hari_libur' => JENIS_HARI_LIBUR_BERUBAH_SETIAP_TAHUN ],
            /*12*/[ 'nama' => 'Hari Kemerdekaan Republik Indonesia', 'tanggal' => 17, 'bulan' => 8, 'id_jenis_hari_libur' => JENIS_HARI_LIBUR_TETAP_SETIAP_TAHUN ],
            /*13*/[ 'nama' => 'Tahun Baru Hijriyah', 'tanggal' => NULL, 'bulan' => NULL, 'id_jenis_hari_libur' => JENIS_HARI_LIBUR_BERUBAH_SETIAP_TAHUN ],
            /*14*/[ 'nama' => 'Maulid Nabi Muhammad SAW.', 'tanggal' => NULL, 'bulan' => NULL, 'id_jenis_hari_libur' => JENIS_HARI_LIBUR_BERUBAH_SETIAP_TAHUN ],
            /*15*/[ 'nama' => 'Hari Raya Natal', 'tanggal' => 25, 'bulan' => 12, 'id_jenis_hari_libur' => JENIS_HARI_LIBUR_TETAP_SETIAP_TAHUN ],
            /*16*/[ 'nama' => 'Cuti Bersama', 'tanggal' => NULL, 'bulan' => NULL, 'id_jenis_hari_libur' => JENIS_HARI_LIBUR_CUTI_BERSAMA ],
        ]);
    }
}

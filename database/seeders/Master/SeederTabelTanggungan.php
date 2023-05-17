<?php
namespace Database\Seeders\Master;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

use Carbon\Carbon;

use App\Models\Master\Karyawan;
use App\Models\Master\Tanggungan;

class SeederTabelTanggungan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.tanggungan RESTART IDENTITY CASCADE");

        $daftar_tanggungan = [
            [
                "id_karyawan" => "2",
                "nama" => "YASIN RIZAL",
                "tanggal_lahir" => "1984-08-09",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1984-08-09",
                "plan" => "2000"
            ],
            [
                "id_karyawan" => "2",
                "nama" => "SYLVIA MARLIANA SUJAPRI",
                "tanggal_lahir" => "1985-05-08",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1985-05-08",
                "plan" => "2000"
            ],
            [
                "id_karyawan" => "2",
                "nama" => "JETHRO ASHER YASIN",
                "tanggal_lahir" => "2017-03-08",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2017-03-08",
                "plan" => "2000"
            ],
            [
                "id_karyawan" => "2",
                "nama" => "ALIKA KAMILIA YASIN",
                "tanggal_lahir" => "2019-03-27",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2019-03-27",
                "plan" => "2000"
            ],
            [
                "id_karyawan" => "3",
                "nama" => "NOER GUMILAR NOVIARDHI",
                "tanggal_lahir" => "1980-11-15",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1980-11-15",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "3",
                "nama" => "VINDA NOVARINA",
                "tanggal_lahir" => "1981-11-10",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1981-11-10",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "3",
                "nama" => "ALIF QAISA ALVINO",
                "tanggal_lahir" => "2006-02-16",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2006-02-16",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "3",
                "nama" => "AIMEE QUELLA ALVINO",
                "tanggal_lahir" => "2010-02-10",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2010-02-10",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "4",
                "nama" => "PEGGY ROSA",
                "tanggal_lahir" => "1978-05-01",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1978-05-01",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "4",
                "nama" => "GIVEN BENAYA SUWARNO",
                "tanggal_lahir" => "2005-06-11",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2005-06-11",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "4",
                "nama" => "R. BENY SUWARNO",
                "tanggal_lahir" => "1974-11-28",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1974-11-28",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "80",
                "nama" => "SUTIKNO",
                "tanggal_lahir" => "1952-02-15",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1952-02-15",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "80",
                "nama" => "ATIT TRI WAHYUNI",
                "tanggal_lahir" => "1959-02-16",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1959-02-16",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "79",
                "nama" => "SURAJI",
                "tanggal_lahir" => "1983-11-02",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1983-11-02",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "79",
                "nama" => "YOHANA BERNADETH RATIH ARY HARDINI",
                "tanggal_lahir" => "1987-07-18",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1987-07-18",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "79",
                "nama" => "ATALIA JIHAN FAUSTINA AUDREY",
                "tanggal_lahir" => "2014-08-04",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2014-08-04",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "79",
                "nama" => "CLARISSA FELICIA ODILIA MANDY",
                "tanggal_lahir" => "2016-08-19",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2016-08-19",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "79",
                "nama" => "JOVAN RAVINDRA PUTRA",
                "tanggal_lahir" => "2019-12-09",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2019-12-09",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "23",
                "nama" => "FERDIKA HINDRADI",
                "tanggal_lahir" => "1973-06-17",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1973-06-17",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "23",
                "nama" => "ROOSDIYATI",
                "tanggal_lahir" => "1973-06-23",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1973-06-23",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "23",
                "nama" => "ARYUNI HINDRADI",
                "tanggal_lahir" => "2002-06-24",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2002-06-24",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "23",
                "nama" => "ARIO SETIAWAN H.",
                "tanggal_lahir" => "2005-05-24",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2005-05-24",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "53",
                "nama" => "AGUS GUNANTO",
                "tanggal_lahir" => "1970-10-09",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1970-10-09",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "53",
                "nama" => "TUTI RAHAYU",
                "tanggal_lahir" => "1976-05-14",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1976-05-14",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "53",
                "nama" => "IRFAAN ABDULAZIZ AZZIDDIN",
                "tanggal_lahir" => "2000-11-25",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2000-11-25",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "53",
                "nama" => "IHSAAN ABDURRAHMAN SAIFUDIN",
                "tanggal_lahir" => "2005-02-25",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2005-02-25",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "53",
                "nama" => "INAS ROSYIDAH GUNANTO",
                "tanggal_lahir" => "2009-06-18",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2009-06-18",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "24",
                "nama" => "SUGENG",
                "tanggal_lahir" => "1971-08-05",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1971-08-05",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "24",
                "nama" => "SITI WULANDARI",
                "tanggal_lahir" => "1977-11-28",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1977-11-28",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "24",
                "nama" => "AIMA NADIVA",
                "tanggal_lahir" => "2008-04-19",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2008-04-19",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "16",
                "nama" => "ANTONIUS NOVA KUNFIANTO",
                "tanggal_lahir" => "1983-11-27",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1983-11-27",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "16",
                "nama" => "ELISABETH LIA CHRISANTI",
                "tanggal_lahir" => "1985-12-18",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1985-12-18",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "16",
                "nama" => "FABIOLA ARETHA KRISALYN KUNFIANTO",
                "tanggal_lahir" => "2013-12-27",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2013-12-27",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "16",
                "nama" => "FLORENTINA ALTAGRACIA KRASIVA KUNFIANTO",
                "tanggal_lahir" => "2016-10-21",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2016-10-21",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "16",
                "nama" => "FAUSTINA ALYONA KAZUMI KUNFIANTO",
                "tanggal_lahir" => "2019-11-19",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2019-11-19",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "58",
                "nama" => "A. YUSUF RIZAL",
                "tanggal_lahir" => "1980-04-25",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1980-04-25",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "58",
                "nama" => "KUN FARIKHA APRIYANI",
                "tanggal_lahir" => "1980-03-18",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1980-03-18",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "58",
                "nama" => "ARHAB ABDILLAH ABBASY",
                "tanggal_lahir" => "2011-04-09",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2011-04-09",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "58",
                "nama" => "UBAY IBNU YUSUF",
                "tanggal_lahir" => "2014-03-22",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2014-03-22",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "58",
                "nama" => "UWAIS IBNU YUSUF",
                "tanggal_lahir" => "2018-01-15",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2018-01-15",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "39",
                "nama" => "B. KOEN AGUS BONDAN CAHYONO",
                "tanggal_lahir" => "1978-08-22",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1978-08-22",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "39",
                "nama" => "M. VENNI KRISTIANTI",
                "tanggal_lahir" => "1980-05-26",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1980-05-26",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "39",
                "nama" => "ISABELLA KOEN CHERYL",
                "tanggal_lahir" => "2008-10-07",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2008-10-07",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "39",
                "nama" => "LOUIS KOEN RICO",
                "tanggal_lahir" => "2012-08-13",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2012-08-13",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "59",
                "nama" => "AGUS SUGIHARTO",
                "tanggal_lahir" => "1972-09-08",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1972-09-08",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "59",
                "nama" => "USSRIANA MEILAWATI",
                "tanggal_lahir" => "1977-05-07",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1977-05-07",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "59",
                "nama" => "LINTANG RAMDHANI L.",
                "tanggal_lahir" => "2002-11-23",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2002-11-23",
                "plan" => "1500"
            ],
            [
                "id_karyawan" => "19",
                "nama" => "ARRI PRADIPTA",
                "tanggal_lahir" => "1978-04-15",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 1,
                "usia" => "1978-04-15",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "55",
                "nama" => "PARDI",
                "tanggal_lahir" => "1981-11-09",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1981-11-09",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "55",
                "nama" => "INDRI SULISTIANINGSIH",
                "tanggal_lahir" => "1986-02-18",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1986-02-18",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "55",
                "nama" => "EILIYA CALLYSTA PUTRI",
                "tanggal_lahir" => "2010-06-26",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2010-06-26",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "55",
                "nama" => "DAFFA KHOIRI PRADIPTA",
                "tanggal_lahir" => "2014-06-13",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2014-06-13",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "55",
                "nama" => "NAURA ALMAIRA AZZAHRA",
                "tanggal_lahir" => "2019-10-24",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2019-10-24",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "57",
                "nama" => "SIGIT SUWARTO",
                "tanggal_lahir" => "1978-11-28",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1978-11-28",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "57",
                "nama" => "ETTI SULISTYOWATI",
                "tanggal_lahir" => "1983-05-09",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1983-05-09",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "57",
                "nama" => "SAGITA DHIA SYARAFANA S",
                "tanggal_lahir" => "2009-11-28",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2009-11-28",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "57",
                "nama" => "SYAHMI AL KHALIFI SUWARTO",
                "tanggal_lahir" => "2011-11-29",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2011-11-29",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "57",
                "nama" => "SABQIE EL-INSI BI' ULUMIH SUWARTO",
                "tanggal_lahir" => "2017-02-28",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2017-02-28",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "54",
                "nama" => "SUNARDI",
                "tanggal_lahir" => "1978-06-05",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1978-06-05",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "54",
                "nama" => "SUCI ARIANI",
                "tanggal_lahir" => "1980-06-23",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1980-06-23",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "54",
                "nama" => "MUHAMMAD FADHIL AZHAR",
                "tanggal_lahir" => "2011-10-09",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2011-10-09",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "54",
                "nama" => "ARDIAN AZRIL AL FARIZI",
                "tanggal_lahir" => "2014-02-13",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2014-02-13",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "54",
                "nama" => "FALISHA ALTHAFUNNISA RAMADHANI",
                "tanggal_lahir" => "2016-06-06",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2016-06-06",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "40",
                "nama" => "ANTON PRIYANTO",
                "tanggal_lahir" => "1982-06-03",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1982-06-03",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "40",
                "nama" => "WAHYUNINGRUM",
                "tanggal_lahir" => "1981-06-15",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1981-06-15",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "40",
                "nama" => "TSAQIIF NAUFAL SHAFAAT",
                "tanggal_lahir" => "2007-07-07",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2007-07-07",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "40",
                "nama" => "RAFIF RAJENDRA NAWWAF",
                "tanggal_lahir" => "2010-08-17",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2010-08-17",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "40",
                "nama" => "HASHIF RADEVA ALTHAFARISQY",
                "tanggal_lahir" => "2016-05-22",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2016-05-22",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "26",
                "nama" => "ALBERT HADITH PRAMONO",
                "tanggal_lahir" => "1981-11-06",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1981-11-06",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "26",
                "nama" => "AIDA MUYASAROH",
                "tanggal_lahir" => "1981-09-01",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1981-09-01",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "26",
                "nama" => "ANISA HAYU P.",
                "tanggal_lahir" => "2008-09-18",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2008-09-18",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "26",
                "nama" => "ARYO RACHMAN PRADITYO",
                "tanggal_lahir" => "2011-04-01",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2011-04-01",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "26",
                "nama" => "ABIMANYU RASYID PRADITYO",
                "tanggal_lahir" => "2020-05-09",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2020-05-09",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "85",
                "nama" => "FERI SURYA PRANADI",
                "tanggal_lahir" => "1976-02-25",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1976-02-25",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "85",
                "nama" => "MUSTABIATUN UMRIYAH",
                "tanggal_lahir" => "1986-06-10",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1986-06-10",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "85",
                "nama" => "SABRINA HELGA",
                "tanggal_lahir" => "2006-05-20",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2006-05-20",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "74",
                "nama" => "DAH SHAADIN KAHAR",
                "tanggal_lahir" => "1978-07-10",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1978-07-10",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "74",
                "nama" => "YANA MEIRINA",
                "tanggal_lahir" => "1977-05-06",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1977-05-06",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "74",
                "nama" => "JUSTICE SABIL",
                "tanggal_lahir" => "2008-01-08",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2008-01-08",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "74",
                "nama" => "RATU ANDARA SARAMITHA",
                "tanggal_lahir" => "2012-10-22",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2012-10-22",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "74",
                "nama" => "RATU INDIRA CANTIKA",
                "tanggal_lahir" => "2012-10-22",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2012-10-22",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "83",
                "nama" => "ANDI BURHAN NAWAWI",
                "tanggal_lahir" => "1970-03-02",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1970-03-02",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "83",
                "nama" => "RIYANTI KASIM",
                "tanggal_lahir" => "1983-02-05",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1983-02-05",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "83",
                "nama" => "MUHAMMAD RAYHAN",
                "tanggal_lahir" => "2007-05-20",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2007-05-20",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "83",
                "nama" => "SITI RASYAH AMINAH",
                "tanggal_lahir" => "2008-07-05",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2008-07-05",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "60",
                "nama" => "ZAM ZAM NURJAMAN",
                "tanggal_lahir" => "1984-04-24",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1984-04-24",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "60",
                "nama" => "RAIMI HANIF NAZMI ALZAM",
                "tanggal_lahir" => "2016-04-08",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2016-04-08",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "81",
                "nama" => "BRAMANTO SENO",
                "tanggal_lahir" => "1986-10-26",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1986-10-26",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "81",
                "nama" => "YAASINIA PUTRIASSY",
                "tanggal_lahir" => "1986-06-26",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1986-06-26",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "81",
                "nama" => "KIANDRA ADARA BRAMANTO",
                "tanggal_lahir" => "2014-10-14",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2014-10-14",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "81",
                "nama" => "ASKARA IBRA BRAMANTO",
                "tanggal_lahir" => "2017-05-03",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2017-05-03",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "5",
                "nama" => "GADIS ANINDYA AYU",
                "tanggal_lahir" => "1982-09-24",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1982-09-24",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "5",
                "nama" => "GERARDUS ABEL NANDHANAWIJNA S.",
                "tanggal_lahir" => "2009-06-20",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2009-06-20",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "25",
                "nama" => "R INDRA ARISYANTO",
                "tanggal_lahir" => "1979-05-01",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1979-05-01",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "25",
                "nama" => "LYTVI NURHAPSARI AYUNINGTYAS",
                "tanggal_lahir" => "1981-02-07",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1981-02-07",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "25",
                "nama" => "FAWWAZ AYDIN ARISYANTO",
                "tanggal_lahir" => "2006-04-06",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2006-04-06",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "25",
                "nama" => "LASKAR ZUNNUR ARISYANTO",
                "tanggal_lahir" => "2008-07-25",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2008-07-25",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "25",
                "nama" => "ALISHA AASIYAH ARISYANTO",
                "tanggal_lahir" => "2013-05-10",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2013-05-10",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "68",
                "nama" => "SUHERMANTO",
                "tanggal_lahir" => "1956-06-29",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1956-06-29",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "68",
                "nama" => "SRI YULI ANDAYANI",
                "tanggal_lahir" => "1962-07-12",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1962-07-12",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "99",
                "nama" => "CATUR YULIANTO",
                "tanggal_lahir" => "1972-07-20",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1972-07-20",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "99",
                "nama" => "TUTI SUPRIYANTI",
                "tanggal_lahir" => "1975-05-13",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1975-05-13",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "99",
                "nama" => "SHAFINDA PRAMAGESTI",
                "tanggal_lahir" => "2002-03-12",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2002-03-12",
                "plan" => "1000"
            ],
            [
                "id_karyawan" => "21",
                "nama" => "ADIAS PURNOMO",
                "tanggal_lahir" => "1985-05-06",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1985-05-06",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "21",
                "nama" => "SRI NURYANTI",
                "tanggal_lahir" => "1984-10-08",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1984-10-08",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "21",
                "nama" => "IZZAH INSYIRAH PURNOMO",
                "tanggal_lahir" => "2015-07-06",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2015-07-06",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "21",
                "nama" => "MUHAMMAD KHALID PURNOMO",
                "tanggal_lahir" => "2017-05-07",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2017-05-07",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "82",
                "nama" => "ROSARINA",
                "tanggal_lahir" => "1986-05-18",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1986-05-18",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "10",
                "nama" => "ENJANG",
                "tanggal_lahir" => "1982-09-13",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1982-09-13",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "10",
                "nama" => "SURYATI",
                "tanggal_lahir" => "1986-07-27",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1986-07-27",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "10",
                "nama" => "DZAKI RAMADHAN",
                "tanggal_lahir" => "2011-08-14",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2011-08-14",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "10",
                "nama" => "MUHAMMAD FATIH AHSAN",
                "tanggal_lahir" => "2014-04-18",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2014-04-18",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "7",
                "nama" => "HARI WIBOWO",
                "tanggal_lahir" => "1984-05-02",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1984-05-02",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "7",
                "nama" => "FITRIYANI",
                "tanggal_lahir" => "1985-01-12",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1985-01-12",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "7",
                "nama" => "RAKHA PUTRA WIBOWO",
                "tanggal_lahir" => "2010-02-11",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2010-02-11",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "7",
                "nama" => "ARFIANI KHARISMA PUTRI WIBOWO",
                "tanggal_lahir" => "2014-02-05",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2014-02-05",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "18",
                "nama" => "GINA NOVIANTI",
                "tanggal_lahir" => "1983-11-19",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1983-11-19",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "18",
                "nama" => "REZHA",
                "tanggal_lahir" => "1984-04-23",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1984-04-23",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "18",
                "nama" => "GALANG AZKANIO NAREZHA",
                "tanggal_lahir" => "2011-11-28",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2011-11-28",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "18",
                "nama" => "KIRANA TISHALODIA NAREZHA",
                "tanggal_lahir" => "2015-11-10",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2015-11-10",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "14",
                "nama" => "SITI FATIMAH",
                "tanggal_lahir" => "1976-03-10",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1976-03-10",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "14",
                "nama" => "GUNAWAN",
                "tanggal_lahir" => "1971-12-08",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1971-12-08",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "14",
                "nama" => "ADINDA KAYLA SALMA",
                "tanggal_lahir" => "2003-06-03",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2003-06-03",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "17",
                "nama" => "SUHARMAN ROSULI",
                "tanggal_lahir" => "1987-09-07",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1987-09-07",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "17",
                "nama" => "AULIA MEDIAWATI",
                "tanggal_lahir" => "1986-07-15",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1986-07-15",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "17",
                "nama" => "SHAKILA AZZAHRA ROSULI",
                "tanggal_lahir" => "2014-08-06",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2014-08-06",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "17",
                "nama" => "ALARIC ZHAFRAN ROSULI",
                "tanggal_lahir" => "2017-03-21",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2017-03-21",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "13",
                "nama" => "SHELLA",
                "tanggal_lahir" => "1990-10-10",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1990-10-10",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "13",
                "nama" => "PATRICK GUNARTO SUSANTO",
                "tanggal_lahir" => "1990-05-05",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1990-05-05",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "13",
                "nama" => "ALECIA KIMBERLY SUSANTO",
                "tanggal_lahir" => "2017-11-08",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2017-11-08",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "13",
                "nama" => "ARCHIE BRADLEY SUSANTO",
                "tanggal_lahir" => "2020-04-25",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2020-04-25",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "9",
                "nama" => "SRI MARYATI",
                "tanggal_lahir" => "1989-02-19",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1989-02-19",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "9",
                "nama" => "NUNUNG NURACHMAN",
                "tanggal_lahir" => "1986-04-21",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1986-04-21",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "9",
                "nama" => "GHIBRAN SHAKEIL DHIAURRAHMAN",
                "tanggal_lahir" => "2019-10-29",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2019-10-29",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "69",
                "nama" => "PRATAMA MUKTI",
                "tanggal_lahir" => "1977-08-29",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1977-08-29",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "69",
                "nama" => "WULAN SARI",
                "tanggal_lahir" => "1985-01-26",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1985-01-26",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "69",
                "nama" => "SHAZIA KHAYYARA ALIMA",
                "tanggal_lahir" => "2008-06-08",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2008-06-08",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "69",
                "nama" => "MUHAMMAD SYAMIL YAZID ILMANY",
                "tanggal_lahir" => "2009-09-25",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2009-09-25",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "70",
                "nama" => "HADI SUSILO PURWOKO",
                "tanggal_lahir" => "1977-05-25",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1977-05-25",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "70",
                "nama" => "ANITA AYU MARISKAWATI",
                "tanggal_lahir" => "1983-12-12",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1983-12-12",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "70",
                "nama" => "REVANO ATQA PUTRA",
                "tanggal_lahir" => "2009-05-26",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2009-05-26",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "70",
                "nama" => "VANIA HANIFAH PUTRI",
                "tanggal_lahir" => "2011-04-20",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2011-04-20",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "70",
                "nama" => "ALVINO HAFIDZ AFHAM PUTRA",
                "tanggal_lahir" => "2013-02-14",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2013-02-14",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "75",
                "nama" => "MUHAMMAD HUDA",
                "tanggal_lahir" => "1979-11-07",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 1,
                "usia" => "1979-11-07",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "75",
                "nama" => "NAJWA AL THOFUNNISA",
                "tanggal_lahir" => "2008-03-02",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2008-03-02",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "75",
                "nama" => "MUHAMMAD ALWI AL MUGHNI",
                "tanggal_lahir" => "2013-08-27",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2013-08-27",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "66",
                "nama" => "LIA NOPITAROSE",
                "tanggal_lahir" => "1986-11-14",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1986-11-14",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "66",
                "nama" => "HABIBI RADITYA KAMILLA",
                "tanggal_lahir" => "2012-10-17",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2012-10-17",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "66",
                "nama" => "HAIDAR HAFIZH KAMILLA",
                "tanggal_lahir" => "2016-12-24",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2016-12-24",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "88",
                "nama" => "SUKO CAHYO HANTOKO",
                "tanggal_lahir" => "1977-11-02",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1977-11-02",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "88",
                "nama" => "LATHIFA RAMADHANI",
                "tanggal_lahir" => "1990-04-07",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1990-04-07",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "88",
                "nama" => "BEN ATHA MAULANA AZIS",
                "tanggal_lahir" => "2010-02-26",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2010-02-26",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "88",
                "nama" => "KENT KIANO ZHAFIR",
                "tanggal_lahir" => "2019-10-28",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2019-10-28",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "73",
                "nama" => "ERNI NURHAENI",
                "tanggal_lahir" => "1981-09-08",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1981-09-08",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "73",
                "nama" => "FAEZA LABIB KHAIZURON",
                "tanggal_lahir" => "2008-04-09",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2008-04-09",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "86",
                "nama" => "RESTI WIDIA NINGSIH",
                "tanggal_lahir" => "1983-10-06",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1983-10-06",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "84",
                "nama" => "EKO HERIYANTO",
                "tanggal_lahir" => "1983-10-27",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1983-10-27",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "84",
                "nama" => "GUSTIN PUSPITASARI",
                "tanggal_lahir" => "1985-08-01",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1985-08-01",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "84",
                "nama" => "KEISYA SAVA ALMAHYRA PUTRIDETA",
                "tanggal_lahir" => "2012-06-02",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2012-06-02",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "84",
                "nama" => "ARSAKHA YAVEU ARJUN PUTRADETA",
                "tanggal_lahir" => "2015-03-13",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2015-03-13",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "48",
                "nama" => "EKO ARIYANTO",
                "tanggal_lahir" => "1987-04-27",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1987-04-27",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "48",
                "nama" => "RR RETNO PRATIWI WIDYASARI",
                "tanggal_lahir" => "1989-05-11",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1989-05-11",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "48",
                "nama" => "FAZILA ZAIN RASENDRIYA ARIYANTO",
                "tanggal_lahir" => "2014-01-10",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2014-01-10",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "48",
                "nama" => "KHAIZURAN GHIFARI ARIYANTO",
                "tanggal_lahir" => "2019-02-08",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2019-02-08",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "29",
                "nama" => "MOH. FATHONI ARIEF",
                "tanggal_lahir" => "1981-04-11",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1981-04-11",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "29",
                "nama" => "NURUL MASRUROCH",
                "tanggal_lahir" => "1985-08-07",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1985-08-07",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "29",
                "nama" => "MOH. ZAKIY HILMIY ADAM",
                "tanggal_lahir" => "2007-06-19",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2007-06-19",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "29",
                "nama" => "NABILA AASILAH MAULIDA",
                "tanggal_lahir" => "2012-02-04",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2012-02-04",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "29",
                "nama" => "NATISHA KIRANIA ATHENA",
                "tanggal_lahir" => "2020-02-20",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2020-02-20",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "33",
                "nama" => "MELIAWAN PANUWUN BUDI SUMATON",
                "tanggal_lahir" => "1979-04-03",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1979-04-03",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "33",
                "nama" => "VITRIA RETNO NINGRUM",
                "tanggal_lahir" => "1983-05-27",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1983-05-27",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "33",
                "nama" => "MUHAMMAD IHSAN FUADA",
                "tanggal_lahir" => "2008-03-12",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2008-06-12",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "33",
                "nama" => "ALMIRA FIRDAUSI AHLA",
                "tanggal_lahir" => "2009-12-17",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2009-12-17",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "63",
                "nama" => "SEGHESTI DAMAR CAHYONO",
                "tanggal_lahir" => "1982-01-01",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1982-01-01",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "63",
                "nama" => "RAHAYU HESTHI WENING",
                "tanggal_lahir" => "1982-09-06",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1982-09-06",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "63",
                "nama" => "NASYWA LAILA AZZAHRA CAHYANINGRUM",
                "tanggal_lahir" => "2005-08-27",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2005-08-27",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "63",
                "nama" => "AURELIA KHOIRUNNISA",
                "tanggal_lahir" => "2011-12-13",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2011-12-13",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "28",
                "nama" => "DESYE MIFTAKHUL IKHWAN",
                "tanggal_lahir" => "1978-12-16",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1978-12-16",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "28",
                "nama" => "ANDAYATI",
                "tanggal_lahir" => "1983-12-29",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1983-12-29",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "28",
                "nama" => "MUHAMMAD YUSRIL AMRI",
                "tanggal_lahir" => "2007-05-12",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2007-05-12",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "28",
                "nama" => "MUHAMMAD FARIS ABBAD",
                "tanggal_lahir" => "2011-04-21",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2011-04-21",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "45",
                "nama" => "JOKO PRATOMO",
                "tanggal_lahir" => "1981-11-06",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1981-11-06",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "45",
                "nama" => "LAILATUL AZIZAH",
                "tanggal_lahir" => "1994-06-28",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1994-06-28",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "45",
                "nama" => "ANDHARA REVALIZA PRATAMA",
                "tanggal_lahir" => "2008-05-17",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2008-05-17",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "45",
                "nama" => "SEVA FIRDITYA PRATAMA",
                "tanggal_lahir" => "2012-10-23",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2012-10-23",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "64",
                "nama" => "PONIDI RAHMANTO",
                "tanggal_lahir" => "1982-03-26",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1982-03-26",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "64",
                "nama" => "ARIK RAHMAWATI",
                "tanggal_lahir" => "1982-01-25",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1982-01-25",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "64",
                "nama" => "ULYA SABILA",
                "tanggal_lahir" => "2008-12-17",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2008-12-17",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "64",
                "nama" => "THAREEQ IBRAHIM",
                "tanggal_lahir" => "2012-12-29",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2012-12-29",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "64",
                "nama" => "HILAL RAMADHAN ASY SYAM",
                "tanggal_lahir" => "2014-07-26",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2014-07-26",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "71",
                "nama" => "NUR EFENDI",
                "tanggal_lahir" => "1982-10-29",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1982-10-29",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "71",
                "nama" => "MAHARIYATUL ARWIYATI",
                "tanggal_lahir" => "1983-01-05",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1983-01-05",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "71",
                "nama" => "HABIBURRAHMAN AL AZZAMUDDIN",
                "tanggal_lahir" => "2008-11-20",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2008-11-20",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "34",
                "nama" => "DWI CAHYONO",
                "tanggal_lahir" => "1982-02-26",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1982-02-26",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "34",
                "nama" => "ELLY ROSIDA",
                "tanggal_lahir" => "1982-02-15",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1982-02-15",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "34",
                "nama" => "KHANSA KAMILA PUTRI CAHYONO",
                "tanggal_lahir" => "2011-08-08",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2011-08-08",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "34",
                "nama" => "FAIHA NADA ZALFA",
                "tanggal_lahir" => "2013-04-14",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2013-04-14",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "34",
                "nama" => "AZKADINA INAR AZNII",
                "tanggal_lahir" => "2018-09-08",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2018-09-08",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "44",
                "nama" => "TRI HENDRO WAHYONO",
                "tanggal_lahir" => "1979-01-15",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1979-01-15",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "44",
                "nama" => "NDARU SETIASIH APRILYANI",
                "tanggal_lahir" => "1981-04-11",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1981-04-11",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "44",
                "nama" => "MARITZA AYUDHYA PUTRI",
                "tanggal_lahir" => "2010-04-27",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2010-04-27",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "44",
                "nama" => "AULIA DAHAYU PUTRI",
                "tanggal_lahir" => "2012-11-12",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2012-11-12",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "44",
                "nama" => "SHAFIRA KHAIRUNNISA PUTRI",
                "tanggal_lahir" => "2014-12-12",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2014-12-12",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "27",
                "nama" => "ADIL SANJAYA",
                "tanggal_lahir" => "1981-11-15",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1981-11-15",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "27",
                "nama" => "USFINA SARI",
                "tanggal_lahir" => "1985-07-13",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1985-07-13",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "27",
                "nama" => "AFI SANJAYA",
                "tanggal_lahir" => "2011-01-04",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2011-01-04",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "27",
                "nama" => "ADIVA SANJAYA",
                "tanggal_lahir" => "2013-10-24",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2013-10-24",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "27",
                "nama" => "ARSY SANJAYA",
                "tanggal_lahir" => "2016-12-09",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2016-12-09",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "76",
                "nama" => "CAHYO VEBIYANTO",
                "tanggal_lahir" => "1981-01-17",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1981-01-17",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "76",
                "nama" => "MURNININGSIH",
                "tanggal_lahir" => "1987-04-23",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1987-04-23",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "76",
                "nama" => "DARIS ZAKY VEBIYANTO",
                "tanggal_lahir" => "2009-09-01",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2009-09-01",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "76",
                "nama" => "NAURA AQILAH VEBIYANTO",
                "tanggal_lahir" => "2015-05-23",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2015-05-23",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "76",
                "nama" => "FATHAN ALFARIQ VEBIYANTO",
                "tanggal_lahir" => "2017-08-09",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2017-08-09",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "30",
                "nama" => "RAHAN SUKMA YUDHA",
                "tanggal_lahir" => "1985-08-13",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1985-08-13",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "30",
                "nama" => "EFRIE TIA MARDIANA",
                "tanggal_lahir" => "1992-04-09",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1992-04-09",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "30",
                "nama" => "ASYA ARDENIA RAHDIAN",
                "tanggal_lahir" => "2017-03-23",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2017-03-23",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "42",
                "nama" => "RUDY HARYANTO",
                "tanggal_lahir" => "1981-03-24",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1981-03-24",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "42",
                "nama" => "CANDRA SETIA MURNI",
                "tanggal_lahir" => "1983-04-09",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1983-04-09",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "42",
                "nama" => "JALALUDDIN AHMAD MAULANA",
                "tanggal_lahir" => "2013-12-16",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2013-12-16",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "41",
                "nama" => "IRBONI UTAMI",
                "tanggal_lahir" => "1982-03-03",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1982-03-03",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "41",
                "nama" => "YENI DIAN ANGGRAENI",
                "tanggal_lahir" => "1983-08-24",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1983-08-24",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "41",
                "nama" => "ALIFIO RIZKI FARRAS",
                "tanggal_lahir" => "2008-10-08",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2008-10-08",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "41",
                "nama" => "ANNISA ZAHIDAH YASMIN",
                "tanggal_lahir" => "2011-10-19",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2011-10-19",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "41",
                "nama" => "ALEA ZIKIR",
                "tanggal_lahir" => "2016-04-26",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2016-04-26",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "11",
                "nama" => "NUR ARDHIANSYAH",
                "tanggal_lahir" => "1994-02-02",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 1,
                "usia" => "1994-02-02",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "15",
                "nama" => "EDWIN BASTEN MATUALAGA",
                "tanggal_lahir" => "1988-06-15",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1988-06-15",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "15",
                "nama" => "TRIANA RAHAYU PUTRI",
                "tanggal_lahir" => "1988-09-08",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1988-09-08",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "15",
                "nama" => "RAFFAN ALRESCHA MATUALAGA",
                "tanggal_lahir" => "2018-04-24",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2018-04-24",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "15",
                "nama" => "RAZZAN ALSYAZANI MATUALAGA",
                "tanggal_lahir" => "2018-04-24",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2018-04-24",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "8",
                "nama" => "NADIA SUWANDY",
                "tanggal_lahir" => "1991-01-12",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1991-01-12",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "8",
                "nama" => "KEVIN POEWARDI",
                "tanggal_lahir" => "1990-01-01",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1990-01-01",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "8",
                "nama" => "JUVENTHEA LUNA POEWARDI",
                "tanggal_lahir" => "2019-05-12",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2019-05-12",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "89",
                "nama" => "WASIYAT ROHMAT PAMUJI",
                "tanggal_lahir" => "1977-01-17",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1977-01-17",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "89",
                "nama" => "NUR ROMADHONI SETYANINGSIH",
                "tanggal_lahir" => "1980-07-25",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1980-07-25",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "89",
                "nama" => "AFIF MALIK WARDHANA",
                "tanggal_lahir" => "2010-06-15",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2010-06-15",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "89",
                "nama" => "AYLA FAIRUNNISA WARDHANI",
                "tanggal_lahir" => "2013-07-08",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2013-07-08",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "89",
                "nama" => "AYSHA KHALILUNA WARDHANI",
                "tanggal_lahir" => "2019-08-19",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2019-08-19",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "43",
                "nama" => "WIDYO AGUNG PRABOWO",
                "tanggal_lahir" => "1982-10-22",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1982-10-22",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "43",
                "nama" => "SULISETIOWATI",
                "tanggal_lahir" => "1980-06-02",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1980-06-02",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "43",
                "nama" => "NAFEEZA ILONA ALMIRA PRABOWO",
                "tanggal_lahir" => "2011-03-15",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2011-03-15",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "43",
                "nama" => "INARA ADIVA AFSHEEN PRABOWO",
                "tanggal_lahir" => "2016-09-09",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2016-09-09",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "65",
                "nama" => "ROHMAN NURHIDAYAT",
                "tanggal_lahir" => "1978-11-26",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1978-11-26",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "65",
                "nama" => "INDAH WAHYUSARI",
                "tanggal_lahir" => "1979-06-16",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1979-06-16",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "65",
                "nama" => "RAYA NUR FIKRI",
                "tanggal_lahir" => "2007-11-06",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2007-11-06",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "65",
                "nama" => "RAFIQA NUR FAIZA",
                "tanggal_lahir" => "2012-05-06",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2012-05-06",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "47",
                "nama" => "KARTIKA AGUS CANDRA",
                "tanggal_lahir" => "1978-08-17",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1978-08-17",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "47",
                "nama" => "TITIK WIDARTI",
                "tanggal_lahir" => "1981-06-14",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1981-06-14",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "47",
                "nama" => "MANDALYA CANTIKA HISHAH",
                "tanggal_lahir" => "2006-01-28",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2006-01-28",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "78",
                "nama" => "IBNU HAMIN THOHARI",
                "tanggal_lahir" => "1978-01-07",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1978-01-07",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "78",
                "nama" => "CHOIRUL NIKMAH",
                "tanggal_lahir" => "1983-01-21",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1983-01-21",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "78",
                "nama" => "AHMAD YUSUF",
                "tanggal_lahir" => "2007-05-03",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2007-05-03",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "78",
                "nama" => "INSYIRAH AZ ZAHRA",
                "tanggal_lahir" => "2008-04-16",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2008-04-16",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "78",
                "nama" => "MUHAMMAD IDRIS",
                "tanggal_lahir" => "2012-05-10",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2012-05-10",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "72",
                "nama" => "AGENG IRIYANTO",
                "tanggal_lahir" => "1980-03-15",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1980-03-15",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "72",
                "nama" => "CHARLIE SINAGA",
                "tanggal_lahir" => "1981-01-31",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1981-01-31",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "72",
                "nama" => "JOVELYN VANIA TIAR",
                "tanggal_lahir" => "2017-03-21",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2017-03-21",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "67",
                "nama" => "SARJOKO",
                "tanggal_lahir" => "1990-07-18",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1990-07-18",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "67",
                "nama" => "ARKANANTA BARA TERANG",
                "tanggal_lahir" => "2020-03-18",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2020-03-18",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "50",
                "nama" => "MUHAMMAD HARI WIBOWO",
                "tanggal_lahir" => "1982-01-08",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1982-01-08",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "50",
                "nama" => "FAHMA NURDIANA MAPPATOBA",
                "tanggal_lahir" => "1982-12-25",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1982-12-25",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "50",
                "nama" => "ATILLA KARIMA WIBOWO",
                "tanggal_lahir" => "2010-12-16",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2010-12-16",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "50",
                "nama" => "DAHLAN ABDURRAHMAN WIBOWO",
                "tanggal_lahir" => "2013-05-18",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2013-05-18",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "50",
                "nama" => "ABDURRAHMAN AL-GHAFIQI WIBOWO",
                "tanggal_lahir" => "2018-08-22",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2018-08-22",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "46",
                "nama" => "MUHAMMAD ISNAIN WIYASATAMA",
                "tanggal_lahir" => "1983-01-15",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1983-01-15",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "46",
                "nama" => "HERTIK DWI ISWAHYUNI RAHAYU",
                "tanggal_lahir" => "1988-06-10",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1988-06-10",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "46",
                "nama" => "AZLAM PUTRA WIYASATAMA",
                "tanggal_lahir" => "2012-06-23",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2012-06-23",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "46",
                "nama" => "ASYAQI ISWARA WIYASATAMA",
                "tanggal_lahir" => "2016-01-25",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2016-01-25",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "32",
                "nama" => "IMAM PUJIANTO",
                "tanggal_lahir" => "1980-10-31",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1980-10-31",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "32",
                "nama" => "NURHELMI JUNAIDAH",
                "tanggal_lahir" => "1982-03-12",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1982-03-12",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "32",
                "nama" => "MUHAMMAD ANSHORI DZAKI ASYRAF",
                "tanggal_lahir" => "2006-09-14",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2006-09-14",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "32",
                "nama" => "TALITHA YUMNA SYAHAMAH",
                "tanggal_lahir" => "2008-05-05",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2008-05-05",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "32",
                "nama" => "AZKADINA MUFIA HAFIDZAH",
                "tanggal_lahir" => "2017-02-21",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2017-02-21",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "87",
                "nama" => "ARIF UJI RISTIANTO",
                "tanggal_lahir" => "1986-07-23",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1986-07-23",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "87",
                "nama" => "FAMELA GIAH DEMONICA",
                "tanggal_lahir" => "1991-12-13",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1991-12-13",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "87",
                "nama" => "RAFIF ALFARIZQI MANNAF",
                "tanggal_lahir" => "2019-07-04",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2019-07-04",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "31",
                "nama" => "HERI SISWOYO",
                "tanggal_lahir" => "1981-12-25",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1981-12-25",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "31",
                "nama" => "HENI PUJI ASTUTI",
                "tanggal_lahir" => "1983-05-24",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1983-05-24",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "31",
                "nama" => "NAUFAL BAGUS PRADANA",
                "tanggal_lahir" => "2010-12-17",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2010-12-17",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "31",
                "nama" => "FAKHRIE RAKHA ARKANANTA",
                "tanggal_lahir" => "2013-04-17",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2013-04-17",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "31",
                "nama" => "RAISYA KAYLA AZZAHRA",
                "tanggal_lahir" => "2014-11-07",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2014-11-07",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "90",
                "nama" => "ATMAJI RAHMAT WISESHO",
                "tanggal_lahir" => "1989-12-08",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1989-12-08",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "90",
                "nama" => "RIZKY AULIA PUTRI",
                "tanggal_lahir" => "1989-04-30",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1989-04-30",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "90",
                "nama" => "RAZKY DAVIANDRA WISESHO",
                "tanggal_lahir" => "2016-09-08",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2016-09-08",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "12",
                "nama" => "HERI SETIAWAN",
                "tanggal_lahir" => "1982-03-30",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1982-03-30",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "12",
                "nama" => "PIPIT AGUSTINA",
                "tanggal_lahir" => "1985-08-01",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1985-08-01",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "12",
                "nama" => "KHALISA AINA MAULIDA",
                "tanggal_lahir" => "2010-02-23",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2010-02-23",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "12",
                "nama" => "AISYAH MIRAJ CHAIRUNNISA",
                "tanggal_lahir" => "2016-04-25",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2016-04-25",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "91",
                "nama" => "DEFZA HURISTU",
                "tanggal_lahir" => "1994-01-29",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1994-01-29",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "91",
                "nama" => "APRILIANI",
                "tanggal_lahir" => "1993-04-13",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1993-04-13",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "51",
                "nama" => "BRILIAN KARISMA ",
                "tanggal_lahir" => "1991-07-30",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1991-07-30",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "51",
                "nama" => "RENATA KUSUMA WARDANI",
                "tanggal_lahir" => "1993-09-01",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1993-09-01",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "49",
                "nama" => "DHITO FASAGI NUGROHO ",
                "tanggal_lahir" => "1992-05-02",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1992-05-02",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "49",
                "nama" => "BISMA RIDHOWI",
                "tanggal_lahir" => "1992-03-13",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1992-03-13",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "49",
                "nama" => "AZZAHRA RIZQIA PUTRI",
                "tanggal_lahir" => "2020-05-23",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2020-05-23",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "36",
                "nama" => "HANAF ASHARI",
                "tanggal_lahir" => "1989-11-20",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1989-11-20",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "36",
                "nama" => "AFUWAH NURJANAH",
                "tanggal_lahir" => "1993-07-21",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1993-07-21",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "36",
                "nama" => "NAUFAL ZAKWAN ASHARI",
                "tanggal_lahir" => "2020-03-28",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2020-03-28",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "37",
                "nama" => "PRIMA HARSHA ADE SEPTIAWAN",
                "tanggal_lahir" => "1990-09-01",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1990-09-01",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "37",
                "nama" => "DINAR WINDU JATI",
                "tanggal_lahir" => "1991-10-20",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1991-10-20",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "37",
                "nama" => "SABRINA NOURA HARSHA",
                "tanggal_lahir" => "2019-06-04",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2019-06-04",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "52",
                "nama" => "SEPTIAN HELMI PUTRA ",
                "tanggal_lahir" => "1993-09-12",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1993-09-12",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "52",
                "nama" => "VINA MUJIANI",
                "tanggal_lahir" => "1995-02-17",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1995-02-17",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "52",
                "nama" => "RAFIF ZAYN ADAM",
                "tanggal_lahir" => "2019-11-20",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2019-11-20",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "38",
                "nama" => "WISNU ENGGAR SUPRAPTO",
                "tanggal_lahir" => "1990-06-19",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 1,
                "usia" => "1990-06-19",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "61",
                "nama" => "HERJI HASNANTO",
                "tanggal_lahir" => "1984-11-11",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1984-11-11",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "61",
                "nama" => "WAHYU PERWIRAWATI",
                "tanggal_lahir" => "1986-01-13",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1986-01-13",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "61",
                "nama" => "SYKLA MIRZA ABBIYAH",
                "tanggal_lahir" => "2013-10-19",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2013-10-19",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "61",
                "nama" => "ATHAR VIRENDRA LAZUARDI ",
                "tanggal_lahir" => "2016-05-08",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2016-05-08",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "61",
                "nama" => "AHZA DANISH ALDEBARAN",
                "tanggal_lahir" => "2020-05-07",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2020-05-07",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "103",
                "nama" => "DARYONO ST",
                "tanggal_lahir" => "1982-05-03",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1982-05-03",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "103",
                "nama" => "UPI  RICHNURAYNI A,MK",
                "tanggal_lahir" => "1980-10-06",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1980-10-06",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "103",
                "nama" => "ELRICHA FILYOMI",
                "tanggal_lahir" => "2009-09-20",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2009-09-20",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "103",
                "nama" => "ELVINA FIRZANAH",
                "tanggal_lahir" => "2013-01-29",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2013-01-29",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "103",
                "nama" => "ELIYANA FATIMAH",
                "tanggal_lahir" => "2017-02-23",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2017-02-23",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "77",
                "nama" => "FEBRIANA ERYANTI",
                "tanggal_lahir" => "1990-02-04",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1990-02-04",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "35",
                "nama" => "REZKA DWIMA KUSUMAHARJA",
                "tanggal_lahir" => "1993-04-26",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1993-04-26",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "35",
                "nama" => "SILVIA FRISCA HARTINI",
                "tanggal_lahir" => "1993-06-15",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1993-06-15",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "35",
                "nama" => "ARION RENDRA KUSUMAHARJA",
                "tanggal_lahir" => "2019-12-20",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2019-12-20",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "62",
                "nama" => "TOFIK BUDIANTO",
                "tanggal_lahir" => "1990-01-02",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1990-01-02",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "62",
                "nama" => "EDA KUSUMAWARDANI",
                "tanggal_lahir" => "1990-09-13",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1990-09-13",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "62",
                "nama" => "KANAYA HAFZAH ALMIRA",
                "tanggal_lahir" => "2018-02-15",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2018-02-15",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "56",
                "nama" => "RENY APRIANA",
                "tanggal_lahir" => "1992-04-20",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1992-04-20",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "56",
                "nama" => "AGUNG WAHYU PRAYOGA",
                "tanggal_lahir" => "1984-05-02",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1984-05-02",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "97",
                "nama" => "ICHVANIA ANNISA MARANTIKA",
                "tanggal_lahir" => "1992-09-13",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1992-09-13",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "98",
                "nama" => "GIAN DJOHAN JUNIOR",
                "tanggal_lahir" => "1996-04-02",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 1,
                "usia" => "1996-04-02",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "94",
                "nama" => "AUDREY CECILIA",
                "tanggal_lahir" => "1995-09-19",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 1,
                "usia" => "1995-09-19",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "100",
                "nama" => "JOKO FIRMANTO",
                "tanggal_lahir" => "1993-03-11",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 2,
                "usia" => "1993-03-11",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "100",
                "nama" => "DIAN MELY SYARA",
                "tanggal_lahir" => "1994-05-31",
                "id_jenis_kelamin" => 2,
                "status_hubungan_tanggungan" => 2,
                "status_pernikahan" => 2,
                "usia" => "1994-05-31",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "100",
                "nama" => "ABDURRAHMAN DANERA SIWI",
                "tanggal_lahir" => "2019-10-08",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 3,
                "status_pernikahan" => 1,
                "usia" => "2019-10-08",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "101",
                "nama" => "DIMAS DARMA SETYAWAN",
                "tanggal_lahir" => "1992-10-15",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 1,
                "usia" => "1992-10-15",
                "plan" => "900"
            ],
            [
                "id_karyawan" => "102",
                "nama" => "MIRZA LUTFI",
                "tanggal_lahir" => "1994-06-10",
                "id_jenis_kelamin" => 1,
                "status_hubungan_tanggungan" => 1,
                "status_pernikahan" => 1,
                "usia" => "1994-06-10",
                "plan" => "900"
            ]
        ];

        $input_tanggungan = [];
        foreach ($daftar_tanggungan as $tanggungan) {
            $karyawan = Karyawan::find((int) $tanggungan['id_karyawan']);

            $input_tanggungan[] = [
                'id_karyawan' => $karyawan->id,
                'nama' => $tanggungan['status_hubungan_tanggungan'] == 1 ? ucwords($karyawan->user->profil_user->nama) : ucwords(strtolower(trim($tanggungan['nama']))),
                'tanggal_lahir' => $tanggungan['status_hubungan_tanggungan'] == 1 ? $karyawan->user->profil_user->tanggal_lahir : $tanggungan['tanggal_lahir'],
                'id_jenis_kelamin' => $tanggungan['status_hubungan_tanggungan'] == 1 ? $karyawan->user->profil_user->id_jenis_kelamin : $tanggungan['id_jenis_kelamin'],
                'status_hubungan_tanggungan' => $tanggungan['status_hubungan_tanggungan'],
                'status_pernikahan' => $tanggungan['status_pernikahan'],
                'usia' => $tanggungan['status_hubungan_tanggungan'] == 1 ? Carbon::parse($karyawan->user->profil_user->tanggal_lahir)->diffInYears(Carbon::today()) : Carbon::parse($tanggungan['tanggal_lahir'])->diffInYears(Carbon::today()),
                'plan' => (int) $tanggungan['plan'],
                'status' => STATUS_PENGAJUAN_TANGGUNGAN_AKTIF
            ];
        }

        DB::connection('master_sys')->table('tanggungan')->insert($input_tanggungan);

        $input_tanggungan = [];
        $daftar_karyawan_tidak_memiliki_tanggungan = Karyawan::doesntHave('hasTanggungan')->get();
        foreach ($daftar_karyawan_tidak_memiliki_tanggungan as $karyawan) {
            $input_tanggungan[] = [
                'id_karyawan' => $karyawan->id,
                'nama' => isset($karyawan->user->profil_user->nama) ? ucwords($karyawan->user->profil_user->nama) : NULL,
                'tanggal_lahir' => isset($karyawan->user->profil_user->tanggal_lahir) ? $karyawan->user->profil_user->tanggal_lahir : NULL,
                'id_jenis_kelamin' => isset($karyawan->user->profil_user->id_jenis_kelamin) ? $karyawan->user->profil_user->id_jenis_kelamin : NULL,
                'status_hubungan_tanggungan' => 1,
                'status_pernikahan' => 1,
                'usia' => isset($karyawan->user->profil_user->tanggal_lahir) ? Carbon::parse($karyawan->user->profil_user->tanggal_lahir)->diffInYears(Carbon::today()) : NULL,
                'plan' => 900,
                'status' => STATUS_PENGAJUAN_TANGGUNGAN_AKTIF
            ];
        }

        DB::connection('master_sys')->table('tanggungan')->insert($input_tanggungan);
    }
}

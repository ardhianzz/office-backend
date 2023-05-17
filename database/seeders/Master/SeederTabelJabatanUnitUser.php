<?php

use Illuminate\Database\Seeder;

use App\Models\Master\ProfilUser;
use App\Models\Master\Unit;
use App\Models\Master\Jabatan;
use App\Models\Master\JabatanUnit;

class SeederTabelJabatanUnitUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.jabatan_unit_user RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('jabatan_unit_user')->insert([
            [ /* 1 */
                'kode' => '1JA100001',
                'id_user' => ProfilUser::where('nama', 'Agus Nurwahyudi')->first()->id_user,
                'id_jabatan_unit' => 1,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 2 */
                'kode' => '5JA100001',
                'id_user' => ProfilUser::where('nama', 'Yasin Rizal')->first()->id_user,
                'id_jabatan_unit' => 2,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 3 */
                'kode' => '2JA200001',
                'id_user' => ProfilUser::where('nama', 'Yasin Rizal')->first()->id_user,
                'id_jabatan_unit' => 3,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 4 */
                'kode' => '2JA100001',
                'id_user' => ProfilUser::where('nama', 'Lifransyah Gumay')->first()->id_user,
                'id_jabatan_unit' => 4,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 5 */
                'kode' => '3JA100001',
                'id_user' => ProfilUser::where('nama', 'Irvan Rahmat')->first()->id_user,
                'id_jabatan_unit' => 5,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 6 */
                'kode' => '1E0000001',
                'id_user' => ProfilUser::where('nama', 'Harry Satria')->first()->id_user,
                'id_jabatan_unit' => 6,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 7 */
                'kode' => '2JA311112',
                'id_user' => ProfilUser::where('nama', 'Ana Malini')->first()->id_user,
                'id_jabatan_unit' => 7,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 8 */
                'kode' => '2JA500001',
                'id_user' => ProfilUser::where('nama', 'Antonius Nova Kunfianto')->first()->id_user,
                'id_jabatan_unit' => 8,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 9 */
                'kode' => '2JA610001',
                'id_user' => ProfilUser::where('nama', 'Arri Pradipta')->first()->id_user,
                'id_jabatan_unit' => 9,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 10 */
                'kode' => '5JA211101',
                'id_user' => ProfilUser::where('nama', 'Audrey Cecilia')->first()->id_user,
                'id_jabatan_unit' => 10,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 11 */
                'kode' => '2JA411101',
                'id_user' => ProfilUser::where('nama', 'Edwin Basten Matualaga')->first()->id_user,
                'id_jabatan_unit' => 11,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 12 */
                'kode' => '2JA311103',
                'id_user' => ProfilUser::where('nama', 'Enjang')->first()->id_user,
                'id_jabatan_unit' => 12,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 13 */
                'kode' => '3JA110001',
                'id_user' => ProfilUser::where('nama', 'Ferdika Hindradi')->first()->id_user,
                'id_jabatan_unit' => 13,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 14 */
                'kode' => '5JA210001',
                'id_user' => ProfilUser::where('nama', 'Gadis Anindya Ayu Widiasari')->first()->id_user,
                'id_jabatan_unit' => 14,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 15 */
                'kode' => '2JA511101',
                'id_user' => ProfilUser::where('nama', 'Gina Novianti')->first()->id_user,
                'id_jabatan_unit' => 15,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 16 */
                'kode' => '2JA311001',
                'id_user' => ProfilUser::where('nama', 'Hari Wibowo')->first()->id_user,
                'id_jabatan_unit' => 16,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 17 */
                'kode' => '2JA411001',
                'id_user' => ProfilUser::where('nama', 'Heri Setiawan')->first()->id_user,
                'id_jabatan_unit' => 17,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 18 */
                'kode' => '5JA211112',
                'id_user' => ProfilUser::where('nama', 'Maria Friska')->first()->id_user,
                'id_jabatan_unit' => 18,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 19 */
                'kode' => '5JA211111',
                'id_user' => ProfilUser::where('nama', 'Nabilah Syah Putri')->first()->id_user,
                'id_jabatan_unit' => 18,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 20 */
                'kode' => '2JA311101',
                'id_user' => ProfilUser::where('nama', 'Nadia Suwandy')->first()->id_user,
                'id_jabatan_unit' => 7,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 21 */
                'kode' => '2JA300001',
                'id_user' => ProfilUser::where('nama', 'Noer Gumilar Noviardhi')->first()->id_user,
                'id_jabatan_unit' => 19,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 22 */
                'kode' => '2JA711101',
                'id_user' => ProfilUser::where('nama', 'Nur Ardhiansyah')->first()->id_user,
                'id_jabatan_unit' => 20,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 23 */
                'kode' => '2JA400001',
                'id_user' => ProfilUser::where('nama', 'Peggy Rosa')->first()->id_user,
                'id_jabatan_unit' => 21,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 24 */
                'kode' => '2JA511001',
                'id_user' => ProfilUser::where('nama', 'Seghesti Damar Cahyono')->first()->id_user,
                'id_jabatan_unit' => 22,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 25 */
                'kode' => '2JA412002',
                'id_user' => ProfilUser::where('nama', 'Shella')->first()->id_user,
                'id_jabatan_unit' => 23,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 26 */
                'kode' => '2JA412001',
                'id_user' => ProfilUser::where('nama', 'Siti Fatimah')->first()->id_user,
                'id_jabatan_unit' => 23,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 27 */
                'kode' => '2JA3111111',
                'id_user' => ProfilUser::where('nama', 'Sri Maryati')->first()->id_user,
                'id_jabatan_unit' => 7,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 28 */
                'kode' => '2JA511102',
                'id_user' => ProfilUser::where('nama', 'Suharman Rosuli')->first()->id_user,
                'id_jabatan_unit' => 15,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 29 */
                'kode' => '2JA611101',
                'id_user' => ProfilUser::where('nama', 'Syafriyanzah')->first()->id_user,
                'id_jabatan_unit' => 24,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 30 */
                'kode' => '3CB111201',
                'id_user' => ProfilUser::where('nama', 'Albert Hadith Pramono')->first()->id_user,
                'id_jabatan_unit' => 25,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 31 */
                'kode' => '3CB111121',
                'id_user' => ProfilUser::where('nama', 'Brilian Karisma')->first()->id_user,
                'id_jabatan_unit' => 26,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 32 */
                'kode' => '3CB111141',
                'id_user' => ProfilUser::where('nama', 'Heri Siswoyo')->first()->id_user,
                'id_jabatan_unit' => 27,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 33 */
                'kode' => '3CB111211',
                'id_user' => ProfilUser::where('nama', 'Meliawan Panuwun Budi Sumaton')->first()->id_user,
                'id_jabatan_unit' => 28,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 34 */
                'kode' => '3CB111131',
                'id_user' => ProfilUser::where('nama', 'Moh. Fathoni Arief')->first()->id_user,
                'id_jabatan_unit' => 29,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 35 */
                'kode' => '3CB111161',
                'id_user' => ProfilUser::where('nama', 'Nur Efendi')->first()->id_user,
                'id_jabatan_unit' => 30,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 36 */
                'kode' => '3CB111101',
                'id_user' => ProfilUser::where('nama', 'R. Indra Arisyanto')->first()->id_user,
                'id_jabatan_unit' => 31,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 37 */
                'kode' => '3CB111151',
                'id_user' => ProfilUser::where('nama', 'Rahan Sukma Yudha')->first()->id_user,
                'id_jabatan_unit' => 32,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 38 */
                'kode' => '3CB111001',
                'id_user' => ProfilUser::where('nama', 'Sugeng')->first()->id_user,
                'id_jabatan_unit' => 33,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 39 */
                'kode' => '3CB111111',
                'id_user' => ProfilUser::where('nama', 'Tri Hendro Wahyono')->first()->id_user,
                'id_jabatan_unit' => 34,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 40 */
                'kode' => '3CD112101',
                'id_user' => ProfilUser::where('nama', 'Anton Priyanto')->first()->id_user,
                'id_jabatan_unit' => 35,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 41 */
                'kode' => '3CD112001',
                'id_user' => ProfilUser::where('nama', 'B. Koen Agus Bondan Cahyono')->first()->id_user,
                'id_jabatan_unit' => 36,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 42 */
                'kode' => '3CD112151',
                'id_user' => ProfilUser::where('nama', 'Eko Ariyanto')->first()->id_user,
                'id_jabatan_unit' => 37,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 43 */
                'kode' => '3CD112201',
                'id_user' => ProfilUser::where('nama', 'Irboni Utami')->first()->id_user,
                'id_jabatan_unit' => 38,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 44 */
                'kode' => '3CD112131',
                'id_user' => ProfilUser::where('nama', 'Joko Pratomo')->first()->id_user,
                'id_jabatan_unit' => 39,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 45 */
                'kode' => '3CD112161',
                'id_user' => ProfilUser::where('nama', 'Kartika Agus Candra')->first()->id_user,
                'id_jabatan_unit' => 40,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 46 */
                'kode' => '3CD112211',
                'id_user' => ProfilUser::where('nama', 'Muhammad Hari Wibowo')->first()->id_user,
                'id_jabatan_unit' => 41,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 47 */
                'kode' => '3CD112131',
                'id_user' => ProfilUser::where('nama', 'Muhammad Isnain Wiyasatama')->first()->id_user,
                'id_jabatan_unit' => 37,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 48 */
                'kode' => '3CD112121',
                'id_user' => ProfilUser::where('nama', 'Prima Harsha Ade Septiawan')->first()->id_user,
                'id_jabatan_unit' => 42,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 49 */
                'kode' => '3CD112111',
                'id_user' => ProfilUser::where('nama', 'Widyo Agung Prabowo')->first()->id_user,
                'id_jabatan_unit' => 43,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 50 */
                'kode' => '3CE113111',
                'id_user' => ProfilUser::where('nama', 'Adil Sanjaya')->first()->id_user,
                'id_jabatan_unit' => 44,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 51 */
                'kode' => '3CE113001',
                'id_user' => ProfilUser::where('nama', 'Agus Gunanto')->first()->id_user,
                'id_jabatan_unit' => 45,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 52 */
                'kode' => '3CE113211',
                'id_user' => ProfilUser::where('nama', 'Desye Miftakhul Ikhwan')->first()->id_user,
                'id_jabatan_unit' => 46,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 53 */
                'kode' => '3CE113131',
                'id_user' => ProfilUser::where('nama', 'Hanaf Ashari')->first()->id_user,
                'id_jabatan_unit' => 47,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 54 */
                'kode' => '3CE113151',
                'id_user' => ProfilUser::where('nama', 'Imam Pujianto')->first()->id_user,
                'id_jabatan_unit' => 48,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 55 */
                'kode' => '3CE113201',
                'id_user' => ProfilUser::where('nama', 'Pardi')->first()->id_user,
                'id_jabatan_unit' => 49,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 56 */
                'kode' => '3CE113121',
                'id_user' => ProfilUser::where('nama', 'Septian Helmi Putra')->first()->id_user,
                'id_jabatan_unit' => 50,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 57 */
                'kode' => '3CE113101',
                'id_user' => ProfilUser::where('nama', 'Sunardi')->first()->id_user,
                'id_jabatan_unit' => 51,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 58 */
                'kode' => '3CE113141',
                'id_user' => ProfilUser::where('nama', 'Wasiyat Rohmat Pamuji')->first()->id_user,
                'id_jabatan_unit' => 52,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 59 */
                'kode' => '3CE113161',
                'id_user' => ProfilUser::where('nama', 'Wisnu Enggar Suprapto')->first()->id_user,
                'id_jabatan_unit' => 53,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 60 */
                'kode' => '6JA111001',
                'id_user' => ProfilUser::where('nama', 'Andi Burhan Nawawi')->first()->id_user,
                'id_jabatan_unit' => 54,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 61 */
                'kode' => '6JA113101',
                'id_user' => ProfilUser::where('nama', 'Arif Uji Ristiyanto')->first()->id_user,
                'id_jabatan_unit' => 55,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 62 */
                'kode' => '6JA111002',
                'id_user' => ProfilUser::where('nama', 'Bramanto Seno')->first()->id_user,
                'id_jabatan_unit' => 56,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 63 */
                'kode' => '6JA114101',
                'id_user' => ProfilUser::where('nama', 'Defza Huristu')->first()->id_user,
                'id_jabatan_unit' => 57,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 64 */
                'kode' => '6JA112101',
                'id_user' => ProfilUser::where('nama', 'Resti Widia Ningsih')->first()->id_user,
                'id_jabatan_unit' => 58,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 65 */
                'kode' => '5JA211001',
                'id_user' => ProfilUser::where('nama', 'Rosarina')->first()->id_user,
                'id_jabatan_unit' => 59,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 66 */
                'kode' => '6JA111101',
                'id_user' => ProfilUser::where('nama', 'Suko Cahyo Hantoko')->first()->id_user,
                'id_jabatan_unit' => 60,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 67 */
                'kode' => '6JA110001',
                'id_user' => ProfilUser::where('nama', 'Suraji')->first()->id_user,
                'id_jabatan_unit' => 61,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 68 */
                'kode' => '6JA100011',
                'id_user' => ProfilUser::where('nama', 'Sutikno')->first()->id_user,
                'id_jabatan_unit' => 62,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 69 */
                'kode' => '3CG118126',
                'id_user' => ProfilUser::where('nama', 'Ichvania Annisa Marantika')->first()->id_user,
                'id_jabatan_unit' => 63,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 70 */
                'kode' => '3CF115001',
                'id_user' => ProfilUser::where('nama', 'A. Yusuf Rizal')->first()->id_user,
                'id_jabatan_unit' => 64,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 71 */
                'kode' => '3CG117111',
                'id_user' => ProfilUser::where('nama', 'Adias Purnomo')->first()->id_user,
                'id_jabatan_unit' => 65,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => 2
            ],
            [ /* 72 */
                'kode' => '3CG117151',
                'id_user' => ProfilUser::where('nama', 'Ageng Iriyanto')->first()->id_user,
                'id_jabatan_unit' => 66,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 73 */
                'kode' => '3CG117001',
                'id_user' => ProfilUser::where('nama', 'Agus Sugiharto')->first()->id_user,
                'id_jabatan_unit' => 67,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 74 */
                'kode' => '2CP521001',
                'id_user' => ProfilUser::where('nama', 'Cahyo Vebiyanto')->first()->id_user,
                'id_jabatan_unit' => 68,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => 2
            ],
            [ /* 75 */
                'kode' => '3CG118101',
                'id_user' => ProfilUser::where('nama', 'Dah Shaaddin Kahar')->first()->id_user,
                'id_jabatan_unit' => 69,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 76 */
                'kode' => '3CF115111',
                'id_user' => ProfilUser::where('nama', 'Daryono')->first()->id_user,
                'id_jabatan_unit' => 70,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 77 */
                'kode' => '3CG117142',
                'id_user' => ProfilUser::where('nama', 'Dhito Fasagi Nugroho')->first()->id_user,
                'id_jabatan_unit' => 71,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 78 */
                'kode' => '3CF114131',
                'id_user' => ProfilUser::where('nama', 'Dwi Cahyono')->first()->id_user,
                'id_jabatan_unit' => 72,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 79 */
                'kode' => '3CG118121',
                'id_user' => ProfilUser::where('nama', 'Eko Heriyanto')->first()->id_user,
                'id_jabatan_unit' => 73,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 80 */
                'kode' => '2CP522101',
                'id_user' => ProfilUser::where('nama', 'Erni Nurhaeni')->first()->id_user,
                'id_jabatan_unit' => 74,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => 3
            ],
            [ /* 81 */
                'kode' => '3CG118113',
                'id_user' => ProfilUser::where('nama', 'Febriana Eryanti')->first()->id_user,
                'id_jabatan_unit' => 75,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 82 */
                'kode' => '3CF115101',
                'id_user' => ProfilUser::where('nama', 'Feri Surya Pranadi')->first()->id_user,
                'id_jabatan_unit' => 76,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 83 */
                'kode' => '3CG117121',
                'id_user' => ProfilUser::where('nama', 'Hadi Susilo Purwoko')->first()->id_user,
                'id_jabatan_unit' => 65,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => 3
            ],
            [ /* 84 */
                'kode' => '3CF114111',
                'id_user' => ProfilUser::where('nama', 'Herji Hasnanto')->first()->id_user,
                'id_jabatan_unit' => 77,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 85 */
                'kode' => '2CP521101',
                'id_user' => ProfilUser::where('nama', 'Ibnu Hamin Thohari')->first()->id_user,
                'id_jabatan_unit' => 74,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => 2
            ],
            [ /* 86 */
                'kode' => '3CF116121',
                'id_user' => ProfilUser::where('nama', 'Lia Nopitarose')->first()->id_user,
                'id_jabatan_unit' => 78,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 87 */
                'kode' => '2CP621001',
                'id_user' => ProfilUser::where('nama', 'Muhammad Huda')->first()->id_user,
                'id_jabatan_unit' => 79,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 88 */
                'kode' => '3CF115311',
                'id_user' => ProfilUser::where('nama', 'Ponidi Rahmanto')->first()->id_user,
                'id_jabatan_unit' => 80,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 89 */
                'kode' => '3CG117161',
                'id_user' => ProfilUser::where('nama', 'Pratama Mukti')->first()->id_user,
                'id_jabatan_unit' => 81,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 90 */
                'kode' => '3CG118124',
                'id_user' => ProfilUser::where('nama', 'Reny Apriana')->first()->id_user,
                'id_jabatan_unit' => 82,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 91 */
                'kode' => '3CF114112',
                'id_user' => ProfilUser::where('nama', 'Rezka Dwima Kusumaharja')->first()->id_user,
                'id_jabatan_unit' => 83,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 92 */
                'kode' => '3CF115511',
                'id_user' => ProfilUser::where('nama', 'Rochman Nurhidayat')->first()->id_user,
                'id_jabatan_unit' => 84,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 93 */
                'kode' => '3CG117141',
                'id_user' => ProfilUser::where('nama', 'Rudy Haryanto')->first()->id_user,
                'id_jabatan_unit' => 85,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 94 */
                'kode' => '3CF116132',
                'id_user' => ProfilUser::where('nama', 'Sarjoko')->first()->id_user,
                'id_jabatan_unit' => 86,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 95 */
                'kode' => '3CF114001',
                'id_user' => ProfilUser::where('nama', 'Sigit Suwarto')->first()->id_user,
                'id_jabatan_unit' => 87,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 96 */
                'kode' => '3CG117201',
                'id_user' => ProfilUser::where('nama', 'Suhermanto')->first()->id_user,
                'id_jabatan_unit' => 88,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 97 */
                'kode' => '3CF114121',
                'id_user' => ProfilUser::where('nama', 'Tofik Budianto')->first()->id_user,
                'id_jabatan_unit' => 89,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 98 */
                'kode' => '3CF116101',
                'id_user' => ProfilUser::where('nama', 'Zam Zam Nurzaman')->first()->id_user,
                'id_jabatan_unit' => 90,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 99 */
                'kode' => '3CF116122',
                'id_user' => ProfilUser::where('nama', 'Gian Djohan Junior')->first()->id_user,
                'id_jabatan_unit' => 91,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 100 */
                'kode' => '3CF115201',
                'id_user' => ProfilUser::where('nama', 'Catur Yulianto')->first()->id_user,
                'id_jabatan_unit' => 92,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 101 */
                'kode' => '3CG117152',
                'id_user' => ProfilUser::where('nama', 'Joko Firmanto')->first()->id_user,
                'id_jabatan_unit' => 93,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 102 */
                'kode' => '3CF115421',
                'id_user' => ProfilUser::where('nama', 'Dimas Darma Setyawan')->first()->id_user,
                'id_jabatan_unit' => 94,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 103 */
                'kode' => '3CF115321',
                'id_user' => ProfilUser::where('nama', 'Mirza Lutfi')->first()->id_user,
                'id_jabatan_unit' => 95,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 104 */
                'kode' => '6CP115111',
                'id_user' => ProfilUser::where('nama', 'Wulan')->first()->id_user,
                'id_jabatan_unit' => 97,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 105 */
                'kode' => '3CG117171',
                'id_user' => ProfilUser::where('nama', 'Prita Purwanti')->first()->id_user,
                'id_jabatan_unit' => 96,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
            [ /* 106 */
                'kode' => '2JA711111',
                'id_user' => ProfilUser::where('nama', 'Krisdina Yulianto')->first()->id_user,
                'id_jabatan_unit' => 20,
                'id_jenis_juu' => 1,
                'id_unit_khusus' => NULL
            ],
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeederTabelProfilUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.profil_user RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('profil_user')->insert([
            [
                'id_user' => 1,
                'nama' => 'Agus Nurwahyudi',
                'email' => 'agus.nurwahyudi@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => NULL,
                'tanggal_lahir' => NULL,
                'usia' => NULL
            ],
            [
                'id_user' => 2,
                'nama' => 'Yasin Rizal',
                'email' => 'yrizal@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 3,
                'no_ktp' => '3174030908840000',
                'tanggal_lahir' => '1984-08-09',
                'usia' => Carbon::parse('1984-08-09')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 3,
                'nama' => 'Noer Gumilar Noviardhi',
                'email' => 'noer_g@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3603281511800005',
                'tanggal_lahir' => '1980-11-15',
                'usia' => Carbon::parse('1980-11-15')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 4,
                'nama' => 'Peggy Rosa',
                'email' => 'peggy@ssprimadaya.co.id',
                'id_jenis_kelamin' => 2,
                'id_agama' => 2,
                'no_ktp' => '3175074105780003',
                'tanggal_lahir' => '1978-05-01',
                'usia' => Carbon::parse('1978-05-01')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 5,
                'nama' => 'Gadis Anindya Ayu Widiasari',
                'email' => 'gadis@ssprimadaya.co.id',
                'id_jenis_kelamin' => 2,
                'id_agama' => 3,
                'no_ktp' => '3175086409820007',
                'tanggal_lahir' => '1982-09-24',
                'usia' => Carbon::parse('1982-09-24')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 6,
                'nama' => 'Ana Malini',
                'email' => 'ana_m@ssprimadaya.co.id',
                'id_jenis_kelamin' => 2,
                'id_agama' => 1,
                'no_ktp' => '3216066704880017',
                'tanggal_lahir' => '1988-04-27',
                'usia' => Carbon::parse('1988-04-27')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 7,
                'nama' => 'Hari Wibowo',
                'email' => 'hari@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3603280205840004',
                'tanggal_lahir' => '1984-05-02',
                'usia' => Carbon::parse('1984-05-02')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 8,
                'nama' => 'Nadia Suwandy',
                'email' => 'nadia@ssprimadaya.co.id',
                'id_jenis_kelamin' => 2,
                'id_agama' => 3,
                'no_ktp' => '1671145201910002',
                'tanggal_lahir' => '1991-01-12',
                'usia' => Carbon::parse('1991-01-12')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 9,
                'nama' => 'Sri Maryati',
                'email' => 'sri.m@ssprimadaya.co.id',
                'id_jenis_kelamin' => 2,
                'id_agama' => 1,
                'no_ktp' => '3209045902890004',
                'tanggal_lahir' => '1989-02-19',
                'usia' => Carbon::parse('1989-02-19')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 10,
                'nama' => 'Enjang',
                'email' => 'enjang@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3276111309820001',
                'tanggal_lahir' => '1982-09-13',
                'usia' => Carbon::parse('1982-09-13')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 11,
                'nama' => 'Nur Ardhiansyah',
                'email' => 'nur_a@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3303070202940001',
                'tanggal_lahir' => '1994-02-02',
                'usia' => Carbon::parse('1994-02-02')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 12,
                'nama' => 'Heri Setiawan',
                'email' => 'pjk@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3674033003820001',
                'tanggal_lahir' => '1982-03-30',
                'usia' => Carbon::parse('1982-03-30')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 13,
                'nama' => 'Shella',
                'email' => 'shella@ssprimadaya.co.id',
                'id_jenis_kelamin' => 2,
                'id_agama' => 3,
                'no_ktp' => '3172025010900008',
                'tanggal_lahir' => '1990-10-10',
                'usia' => Carbon::parse('1990-10-10')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 14,
                'nama' => 'Siti Fatimah',
                'email' => 'sfatimah@ssprimadaya.co.id',
                'id_jenis_kelamin' => 2,
                'id_agama' => 1,
                'no_ktp' => '3276015003760009',
                'tanggal_lahir' => '1976-03-10',
                'usia' => Carbon::parse('1976-03-10')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 15,
                'nama' => 'Edwin Basten Matualaga',
                'email' => 'edwin@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3276031506880002',
                'tanggal_lahir' => '1988-06-15',
                'usia' => Carbon::parse('1988-06-15')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 16,
                'nama' => 'Antonius Nova Kunfianto',
                'email' => 'novakunfianto@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 3,
                'no_ktp' => '3301212711830002',
                'tanggal_lahir' => '1983-11-27',
                'usia' => Carbon::parse('1983-11-27')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 17,
                'nama' => 'Suharman Rosuli',
                'email' => 'suharman@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3201100709870005',
                'tanggal_lahir' => '1987-09-07',
                'usia' => Carbon::parse('1987-09-07')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 18,
                'nama' => 'Gina Novianti',
                'email' => 'gina@ssprimadaya.co.id',
                'id_jenis_kelamin' => 2,
                'id_agama' => 1,
                'no_ktp' => '3174105911830010',
                'tanggal_lahir' => '1983-11-19',
                'usia' => Carbon::parse('1983-11-19')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 19,
                'nama' => 'Arri Pradipta',
                'email' => 'a_pradipta@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3578091504780003',
                'tanggal_lahir' => '1978-04-15',
                'usia' => Carbon::parse('1978-04-15')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 20,
                'nama' => 'Syafriyanzah',
                'email' => 'syafriyanzah@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '7372043006900001',
                'tanggal_lahir' => '1990-06-30',
                'usia' => Carbon::parse('1990-06-30')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 21,
                'nama' => 'Adias Purnomo',
                'email' => 'adias@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3402120605850002',
                'tanggal_lahir' => '1985-05-06',
                'usia' => Carbon::parse('1985-05-06')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 22,
                'nama' => 'Irvan Rahmat',
                'email' => 'irvan@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301222601710002',
                'tanggal_lahir' => '1971-01-26',
                'usia' => Carbon::parse('1971-01-26')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 23,
                'nama' => 'Ferdika Hindradi',
                'email' => 'ferdika@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3174041706730008',
                'tanggal_lahir' => '1973-06-17',
                'usia' => Carbon::parse('1973-06-17')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 24,
                'nama' => 'Sugeng',
                'email' => 'sugeng@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3525100508710004',
                'tanggal_lahir' => '1971-08-05',
                'usia' => Carbon::parse('1971-08-05')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 25,
                'nama' => 'R. Indra Arisyanto',
                'email' => 'indra_a@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301220105790004',
                'tanggal_lahir' => '1979-05-01',
                'usia' => Carbon::parse('1979-05-01')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 26,
                'nama' => 'Albert Hadith Pramono',
                'email' => 'alberthp@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '1871090611810003',
                'tanggal_lahir' => '1981-11-06',
                'usia' => Carbon::parse('1981-11-06')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 27,
                'nama' => 'Adil Sanjaya',
                'email' => 'adil@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3515131511810010',
                'tanggal_lahir' => '1981-11-15',
                'usia' => Carbon::parse('1981-11-15')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 28,
                'nama' => 'Desye Miftakhul Ikhwan',
                'email' => 'miftakhul_ikhwan@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3523061612780002',
                'tanggal_lahir' => '1978-12-16',
                'usia' => Carbon::parse('1978-12-16')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 29,
                'nama' => 'Moh. Fathoni Arief',
                'email' => 'fathoni@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3526041104810004',
                'tanggal_lahir' => '1981-04-11',
                'usia' => Carbon::parse('1981-04-11')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 30,
                'nama' => 'Rahan Sukma Yudha',
                'email' => 'rahan@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301211308850001',
                'tanggal_lahir' => '1985-08-13',
                'usia' => Carbon::parse('1985-08-13')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 31,
                'nama' => 'Heri Siswoyo',
                'email' => 'herisiswoyo@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3502162512810007',
                'tanggal_lahir' => '1981-12-25',
                'usia' => Carbon::parse('1981-12-25')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 32,
                'nama' => 'Imam Pujianto',
                'email' => 'imampujian@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3573053110800011',
                'tanggal_lahir' => '1980-10-31',
                'usia' => Carbon::parse('1980-10-31')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 33,
                'nama' => 'Meliawan Panuwun Budi Sumaton',
                'email' => 'meliawan_pbs@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3317100304790001',
                'tanggal_lahir' => '1979-04-03',
                'usia' => Carbon::parse('1979-04-03')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 34,
                'nama' => 'Dwi Cahyono',
                'email' => 'dwi@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3573042602820002',
                'tanggal_lahir' => '1982-02-26',
                'usia' => Carbon::parse('1982-02-26')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 35,
                'nama' => 'Rezka Dwima Kusumaharja',
                'email' => 'rezkadk@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3209182604930005',
                'tanggal_lahir' => '1993-04-26',
                'usia' => Carbon::parse('1993-04-26')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 36,
                'nama' => 'Hanaf Ashari',
                'email' => 'hanaf@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3471082011890001',
                'tanggal_lahir' => '1989-11-20',
                'usia' => Carbon::parse('1989-11-20')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 37,
                'nama' => 'Prima Harsha Ade Septiawan',
                'email' => 'prima@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3302090109900003',
                'tanggal_lahir' => '1990-09-01',
                'usia' => Carbon::parse('1990-09-01')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 38,
                'nama' => 'Wisnu Enggar Suprapto',
                'email' => 'wisnuenggars@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3302111906900001',
                'tanggal_lahir' => '1990-06-19',
                'usia' => Carbon::parse('1990-06-19')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 39,
                'nama' => 'B. Koen Agus Bondan Cahyono',
                'email' => 'koen.bondan@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 3,
                'no_ktp' => '3301232208780002',
                'tanggal_lahir' => '1978-08-22',
                'usia' => Carbon::parse('1978-08-22')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 40,
                'nama' => 'Anton Priyanto',
                'email' => 'antonpriyanto@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301210306820003',
                'tanggal_lahir' => '1982-06-03',
                'usia' => Carbon::parse('1982-06-03')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 41,
                'nama' => 'Irboni Utami',
                'email' => 'irboni@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3577030303820002',
                'tanggal_lahir' => '1982-03-03',
                'usia' => Carbon::parse('1982-03-03')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 42,
                'nama' => 'Rudy Haryanto',
                'email' => 'rudy_h@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3504092403810002',
                'tanggal_lahir' => '1981-03-24',
                'usia' => Carbon::parse('1981-03-24')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 43,
                'nama' => 'Widyo Agung Prabowo',
                'email' => 'widyoagung@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301222210820004',
                'tanggal_lahir' => '1982-10-22',
                'usia' => Carbon::parse('1982-10-22')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 44,
                'nama' => 'Tri Hendro Wahyono',
                'email' => 'trihendro@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3374111501790004',
                'tanggal_lahir' => '1979-01-15',
                'usia' => Carbon::parse('1979-01-15')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 45,
                'nama' => 'Joko Pratomo',
                'email' => 'jokopratomo@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3507220611810003',
                'tanggal_lahir' => '1981-11-06',
                'usia' => Carbon::parse('1981-11-06')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 46,
                'nama' => 'Muhammad Isnain Wiyasatama',
                'email' => 'muhammadisnain@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3311121501830004',
                'tanggal_lahir' => '1983-01-15',
                'usia' => Carbon::parse('1983-01-15')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 47,
                'nama' => 'Kartika Agus Candra',
                'email' => 'kartika_agus@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3573051708780002',
                'tanggal_lahir' => '1978-08-17',
                'usia' => Carbon::parse('1978-08-17')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 48,
                'nama' => 'Eko Ariyanto',
                'email' => 'eko_ariyanto@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301032704870005',
                'email' => '',
                'tanggal_lahir' => '1987-04-27',
                'usia' => Carbon::parse('1987-04-27')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 49,
                'nama' => 'Dhito Fasagi Nugroho',
                'email' => 'dhito_fasagi@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301230205920001',
                'tanggal_lahir' => '1992-05-02',
                'usia' => Carbon::parse('1992-05-02')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 50,
                'nama' => 'Muhammad Hari Wibowo',
                'email' => 'muhammadhari_w@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3317100801820004',
                'tanggal_lahir' => '1982-01-08',
                'usia' => Carbon::parse('1982-01-08')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 51,
                'nama' => 'Brilian Karisma',
                'email' => 'briliankarisma@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301023007910001',
                'tanggal_lahir' => '1991-07-30',
                'usia' => Carbon::parse('1991-07-30')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 52,
                'nama' => 'Septian Helmi Putra',
                'email' => 'helmi@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301231209930002',
                'tanggal_lahir' => '1993-09-12',
                'usia' => Carbon::parse('1993-09-12')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 53,
                'nama' => 'Agus Gunanto',
                'email' => 'agus_g@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3525110910700002',
                'tanggal_lahir' => '1970-10-09',
                'usia' => Carbon::parse('1970-10-09')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 54,
                'nama' => 'Sunardi',
                'email' => 'sunardi@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3507150506780002',
                'tanggal_lahir' => '1978-06-05',
                'usia' => Carbon::parse('1978-06-05')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 55,
                'nama' => 'Pardi',
                'email' => 'pardi@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301210911810005',
                'tanggal_lahir' => '1981-11-09',
                'usia' => Carbon::parse('1981-11-09')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 56,
                'nama' => 'Reny Apriana',
                'email' => 'reny@ssprimadaya.co.id',
                'id_jenis_kelamin' => 2,
                'id_agama' => 1,
                'no_ktp' => '3301236004920001',
                'tanggal_lahir' => '1992-04-20',
                'usia' => Carbon::parse('1992-04-20')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 57,
                'nama' => 'Sigit Suwarto',
                'email' => 'sigit@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301032811780001',
                'tanggal_lahir' => '1978-11-28',
                'usia' => Carbon::parse('1978-11-28')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 58,
                'nama' => 'A. Yusuf Rizal',
                'email' => 'ayusufrizal@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3329092504800011',
                'tanggal_lahir' => '1980-04-25',
                'usia' => Carbon::parse('1980-04-25')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 59,
                'nama' => 'Agus Sugiharto',
                'email' => 'agus@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301220809720003',
                'tanggal_lahir' => '1972-09-08',
                'usia' => Carbon::parse('1972-09-08')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 60,
                'nama' => 'Zam Zam Nurzaman',
                'email' => 'zamzam@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301142404840004',
                'tanggal_lahir' => '1984-04-24',
                'usia' => Carbon::parse('1984-04-24')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 61,
                'nama' => 'Herji Hasnanto',
                'email' => 'herji_h@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3314101111840001',
                'tanggal_lahir' => '1984-11-11',
                'usia' => Carbon::parse('1984-11-11')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 62,
                'nama' => 'Tofik Budianto',
                'email' => 'tofik_budianto@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3302110201900003',
                'tanggal_lahir' => '1990-01-02',
                'usia' => Carbon::parse('1990-01-02')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 63,
                'nama' => 'Seghesti Damar Cahyono',
                'email' => 'damarcahyono@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301200101820005',
                'tanggal_lahir' => '1982-01-01',
                'usia' => Carbon::parse('1982-01-01')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 64,
                'nama' => 'Ponidi Rahmanto',
                'email' => 'ponidi_rahmanto@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3572032603820002',
                'tanggal_lahir' => '1982-03-26',
                'usia' => Carbon::parse('1982-03-26')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 65,
                'nama' => 'Rochman Nurhidayat',
                'email' => 'rohmannur@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301072611780001',
                'tanggal_lahir' => '1978-11-26',
                'usia' => Carbon::parse('1978-11-26')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 66,
                'nama' => 'Lia Nopitarose',
                'email' => 'lia@ssprimadaya.co.id',
                'id_jenis_kelamin' => 2,
                'id_agama' => 1,
                'no_ktp' => '3315195411860001',
                'tanggal_lahir' => '1986-11-14',
                'usia' => Carbon::parse('1986-11-14')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 67,
                'nama' => 'Sarjoko',
                'email' => 'sarjoko@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3402121807900002',
                'tanggal_lahir' => '1990-07-18',
                'usia' => Carbon::parse('1990-07-18')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 68,
                'nama' => 'Suhermanto',
                'email' => 'suhermanto.scm@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => NULL,
                'tanggal_lahir' => '1956-06-29',
                'usia' => Carbon::parse('1956-06-29')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 69,
                'nama' => 'Pratama Mukti',
                'email' => 'pratama@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3273202908770005',
                'tanggal_lahir' => '1977-08-29',
                'usia' => Carbon::parse('1977-08-29')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 70,
                'nama' => 'Hadi Susilo Purwoko',
                'email' => 'susilo@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301212505770004',
                'tanggal_lahir' => '1977-05-25',
                'usia' => Carbon::parse('1977-05-25')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 71,
                'nama' => 'Nur Efendi',
                'email' => 'nur_efendi@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3515132910820009',
                'tanggal_lahir' => '1982-10-29',
                'usia' => Carbon::parse('1982-10-29')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 72,
                'nama' => 'Ageng Iriyanto',
                'email' => 'ageng_iriyanto@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 3,
                'no_ktp' => '3301231503800001',
                'tanggal_lahir' => '1980-03-15',
                'usia' => Carbon::parse('1980-03-15')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 73,
                'nama' => 'Erni Nurhaeni',
                'email' => 'erni@ssprimadaya.co.id',
                'id_jenis_kelamin' => 2,
                'id_agama' => 1,
                'no_ktp' => '3374124809810005',
                'tanggal_lahir' => '1981-09-08',
                'usia' => Carbon::parse('1981-09-08')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 74,
                'nama' => 'Dah Shaaddin Kahar',
                'email' => 'adin@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3174101007780007',
                'tanggal_lahir' => '1978-07-10',
                'usia' => Carbon::parse('1978-07-10')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 75,
                'nama' => 'Muhammad Huda',
                'email' => 'hudha@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3216060711790016',
                'tanggal_lahir' => '1979-11-07',
                'usia' => Carbon::parse('1979-11-07')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 76,
                'nama' => 'Cahyo Vebiyanto',
                'email' => 'cahyo@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3515071701810001',
                'tanggal_lahir' => '1981-01-17',
                'usia' => Carbon::parse('1981-01-17')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 77,
                'nama' => 'Febriana Eryanti',
                'email' => 'febriana@ssprimadaya.co.id',
                'id_jenis_kelamin' => 2,
                'id_agama' => 1,
                'no_ktp' => '3273224402900003',
                'tanggal_lahir' => '1990-02-04',
                'usia' => Carbon::parse('1990-02-04')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 78,
                'nama' => 'Ibnu Hamin Thohari',
                'email' => 'ibnu@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3506070701780001',
                'tanggal_lahir' => '1978-01-07',
                'usia' => Carbon::parse('1978-01-07')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 79,
                'nama' => 'Suraji',
                'email' => 'suraji@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3201290211830008',
                'tanggal_lahir' => '1983-11-02',
                'usia' => Carbon::parse('1983-11-02')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 80,
                'nama' => 'Sutikno',
                'email' => 'sutikno@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3172011502520003',
                'tanggal_lahir' => '1952-02-15',
                'usia' => Carbon::parse('1952-02-15')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 81,
                'nama' => 'Bramanto Seno',
                'email' => 'bram@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3275042610860007',
                'tanggal_lahir' => '1986-10-26',
                'usia' => Carbon::parse('1986-10-26')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 82,
                'nama' => 'Rosarina',
                'email' => 'rosarina@ssprimadaya.co.id',
                'id_jenis_kelamin' => 2,
                'id_agama' => 3,
                'no_ktp' => '3173025805860001',
                'tanggal_lahir' => '1986-05-18',
                'usia' => Carbon::parse('1986-05-18')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 83,
                'nama' => 'Andi Burhan Nawawi',
                'email' => 'andiburhannawawi@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '7371090203700001',
                'tanggal_lahir' => '1970-03-02',
                'usia' => Carbon::parse('1970-03-02')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 84,
                'nama' => 'Eko Heriyanto',
                'email' => 'eko_h@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3402132710830001',
                'tanggal_lahir' => '1983-10-27',
                'usia' => Carbon::parse('1983-10-27')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 85,
                'nama' => 'Feri Surya Pranadi',
                'email' => 'ferisurya@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301232502760004',
                'tanggal_lahir' => '1976-02-25',
                'usia' => Carbon::parse('1976-02-25')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 86,
                'nama' => 'Resti Widia Ningsih',
                'email' => 'resti@ssprimadaya.co.id',
                'id_jenis_kelamin' => 2,
                'id_agama' => 1,
                'no_ktp' => '3277014610830019',
                'tanggal_lahir' => '1983-10-06',
                'usia' => Carbon::parse('1983-10-06')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 87,
                'nama' => 'Arif Uji Ristiyanto',
                'email' => 'arifuji@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3302232307860001',
                'tanggal_lahir' => '1986-07-23',
                'usia' => Carbon::parse('1986-07-23')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 88,
                'nama' => 'Suko Cahyo Hantoko',
                'email' => 'sukocahyo@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3374110211770002',
                'tanggal_lahir' => '1977-11-02',
                'usia' => Carbon::parse('1977-11-02')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 89,
                'nama' => 'Wasiyat Rohmat Pamuji',
                'email' => 'wasiyat_p@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301071701770002',
                'tanggal_lahir' => '1977-01-17',
                'usia' => Carbon::parse('1977-01-17')->diffInYears(Carbon::today())
            ],
            [ // BELUM ADA JABATAN
                'id_user' => 90,
                'nama' => 'Atmaji Rahmat Wisesho',
                'email' => NULL,
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3276050812890006',
                'tanggal_lahir' => '1989-12-08',
                'usia' => Carbon::parse('1989-12-08')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 91,
                'nama' => 'Defza Huristu',
                'email' => 'defza@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '1376032901940001',
                'tanggal_lahir' => '1994-01-29',
                'usia' => Carbon::parse('1994-01-29')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 92,
                'nama' => 'Lifransyah Gumay',
                'email' => 'lgumay@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => NULL,
                'tanggal_lahir' => NULL,
                'usia' => NULL
            ],
            [
                'id_user' => 93,
                'nama' => 'Harry Satria',
                'email' => 'harrysatria@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => NULL,
                'tanggal_lahir' => '1954-10-24',
                'usia' => Carbon::parse('1954-10-24')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 94,
                'nama' => 'Audrey Cecilia',
                'email' => 'audrey@ssprimadaya.co.id',
                'id_jenis_kelamin' => 2,
                'id_agama' => 2,
                'no_ktp' => '3175075909950000',
                'tanggal_lahir' => '1995-09-19',
                'usia' => Carbon::parse('1995-09-19')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 95,
                'nama' => 'Maria Friska',
                'email' => 'receptionist@ssprimadaya.co.id',
                'id_jenis_kelamin' => 2,
                'id_agama' => 3,
                'no_ktp' => NULL,
                'tanggal_lahir' => NULL,
                'usia' => NULL
            ],
            [
                'id_user' => 96,
                'nama' => 'Nabilah Syah Putri',
                'email' => 'receptionist@ssprimadaya.co.id',
                'id_jenis_kelamin' => 2,
                'id_agama' => 1,
                'no_ktp' => NULL,
                'tanggal_lahir' => NULL,
                'usia' => NULL
            ],
            [
                'id_user' => 97,
                'nama' => 'Ichvania Annisa Marantika',
                'email' => 'ichvania@ssprimadaya.co.id',
                'id_jenis_kelamin' => 2,
                'id_agama' => 1,
                'no_ktp' => '3301235309920001',
                'tanggal_lahir' => '1992-09-13',
                'usia' => Carbon::parse('1992-09-13')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 98,
                'nama' => 'Gian Djohan Junior',
                'email' => 'giandjohan@gmail.com',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3171070204960001',
                'tanggal_lahir' => '1996-04-02',
                'usia' => Carbon::parse('1996-04-02')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 99,
                'nama' => 'Catur Yulianto',
                'email' => 'catur_y@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3513122007720001',
                'tanggal_lahir' => '1972-07-20',
                'usia' => Carbon::parse('1972-07-20')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 100,
                'nama' => 'Joko Firmanto',
                'email' => 'joko_f@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '1807161103930002',
                'tanggal_lahir' => '1993-03-11',
                'usia' => Carbon::parse('1993-03-11')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 101,
                'nama' => 'Dimas Darma Setyawan',
                'email' => 'dimas_ds@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301221510920002',
                'tanggal_lahir' => '1992-10-15',
                'usia' => Carbon::parse('1992-10-15')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 102,
                'nama' => 'Mirza Lutfi',
                'email' => 'mirza_l@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301061006940002',
                'tanggal_lahir' => '1994-06-10',
                'usia' => Carbon::parse('1994-06-10')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 103,
                'nama' => 'Daryono',
                'email' => 'daryono@ssprimadaya.co.id',
                'id_jenis_kelamin' => 1,
                'id_agama' => 1,
                'no_ktp' => '3301170305820001',
                'tanggal_lahir' => '1982-05-03',
                'usia' => Carbon::parse('1982-05-03')->diffInYears(Carbon::today())
            ],
            [
                'id_user' => 104,
                'nama' => 'Wulan',
                'email' => NULL,
                'id_jenis_kelamin' => 2,
                'id_agama' => 1,
                'no_ktp' => NULL,
                'tanggal_lahir' => NULL,
                'usia' => NULL
            ],
            [
                'id_user' => 105,
                'nama' => 'Prita Purwanti',
                'email' => NULL,
                'id_jenis_kelamin' => 2,
                'id_agama' => 1,
                'no_ktp' => NULL,
                'tanggal_lahir' => NULL,
                'usia' => NULL
            ],
            [
                'id_user' => 106,
                'nama' => 'Krisdina Yulianto',
                'email' => NULL,
                'id_jenis_kelamin' => 1,
                'id_agama' => NULL,
                'no_ktp' => NULL,
                'tanggal_lahir' => NULL,
                'usia' => NULL
            ]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SeederTabelUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.user RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('user')->insert([
            [
                'nik' => '1JA100001',
                'password' => Hash::make('1JA100001'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '0884032J',
                'password' => Hash::make('0884032J'),
                'id_juu_default' => 3
            ],
            [
                'nik' => '0480008J',
                'password' => Hash::make('0480008J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1178047J',
                'password' => Hash::make('1178047J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '0482006J',
                'password' => Hash::make('0482006J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1888100J',
                'password' => Hash::make('1888100J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '0684021J',
                'password' => Hash::make('0684021J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1691083J',
                'password' => Hash::make('1691083J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1489058J',
                'password' => Hash::make('1489058J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '0383005J',
                'password' => Hash::make('0383005J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1694082J',
                'password' => Hash::make('1694082J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1882101J',
                'password' => Hash::make('1882101J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1590062J',
                'password' => Hash::make('1590062J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1376056J',
                'password' => Hash::make('1376056J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1688081J',
                'password' => Hash::make('1688081J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1083043C',
                'password' => Hash::make('1083043C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1487059J',
                'password' => Hash::make('1487059J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '0983033J',
                'password' => Hash::make('0983033J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '0778029J',
                'password' => Hash::make('0778029J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1890099J',
                'password' => Hash::make('1890099J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '0985036J',
                'password' => Hash::make('0985036J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '0671022C',
                'password' => Hash::make('0671022C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '0573018J',
                'password' => Hash::make('0573018J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1471060C',
                'password' => Hash::make('1471060C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1679072C',
                'password' => Hash::make('1679072C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1081044C',
                'password' => Hash::make('1081044C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1681066C',
                'password' => Hash::make('1681066C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1678068C',
                'password' => Hash::make('1678068C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1681071C',
                'password' => Hash::make('1681071C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1685076C',
                'password' => Hash::make('1685076C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1781095C',
                'password' => Hash::make('1781095C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1780096C',
                'password' => Hash::make('1780096C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1679070C',
                'password' => Hash::make('1679070C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1682077C',
                'password' => Hash::make('1682077C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1893112C',
                'password' => Hash::make('1893112C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1889104C',
                'password' => Hash::make('1889104C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1890105C',
                'password' => Hash::make('1890105C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1890107C',
                'password' => Hash::make('1890107C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1078039C',
                'password' => Hash::make('1078039C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1082041C',
                'password' => Hash::make('1082041C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1682069C',
                'password' => Hash::make('1682069C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1681073C',
                'password' => Hash::make('1681073C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1782087C',
                'password' => Hash::make('1782087C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1679075C',
                'password' => Hash::make('1679075C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1681078C',
                'password' => Hash::make('1681078C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1783094C',
                'password' => Hash::make('1783094C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1778089C',
                'password' => Hash::make('1778089C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1587065C',
                'password' => Hash::make('1587065C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1892103C',
                'password' => Hash::make('1892103C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1782093C',
                'password' => Hash::make('1782093C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1891102C',
                'password' => Hash::make('1891102C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1893106C',
                'password' => Hash::make('1893106C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1370055C',
                'password' => Hash::make('1370055C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1078040C',
                'password' => Hash::make('1078040C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1081042C',
                'password' => Hash::make('1081042C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1992114C',
                'password' => Hash::make('1992114C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1078038C',
                'password' => Hash::make('1078038C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1080037C',
                'password' => Hash::make('1080037C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '0672025C',
                'password' => Hash::make('0672025C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1084046C',
                'password' => Hash::make('1084046C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1884108C',
                'password' => Hash::make('1884108C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1990113C',
                'password' => Hash::make('1990113C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1682074C',
                'password' => Hash::make('1682074C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1682080C',
                'password' => Hash::make('1682080C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1778088C',
                'password' => Hash::make('1778088C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1186048C',
                'password' => Hash::make('1186048C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1790092C',
                'password' => Hash::make('1790092C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1756085C',
                'password' => Hash::make('1756085C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '0577017J',
                'password' => Hash::make('0577017J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '0577019C',
                'password' => Hash::make('0577019C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1682079C',
                'password' => Hash::make('1682079C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1780091C',
                'password' => Hash::make('1780091C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1281052C',
                'password' => Hash::make('1281052C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '0778030J',
                'password' => Hash::make('0778030J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1479057C',
                'password' => Hash::make('1479057C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1681067C',
                'password' => Hash::make('1681067C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1890111C',
                'password' => Hash::make('1890111C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1778090C',
                'password' => Hash::make('1778090C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1783084J',
                'password' => Hash::make('1783084J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '0752028C',
                'password' => Hash::make('0752028C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1586063J',
                'password' => Hash::make('1586063J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1386053J',
                'password' => Hash::make('1386053J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1070045C',
                'password' => Hash::make('1070045C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1183050J',
                'password' => Hash::make('1183050J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '0476011C',
                'password' => Hash::make('0476011C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1283051C',
                'password' => Hash::make('1283051C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1786097C',
                'password' => Hash::make('1786097C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1177049C',
                'password' => Hash::make('1177049C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1777086C',
                'password' => Hash::make('1777086C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1889098C',
                'password' => Hash::make('1889098C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1894110C',
                'password' => Hash::make('1894110C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '2JA100001',
                'password' => Hash::make('2JA100001'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1E0000001',
                'password' => Hash::make('1E0000001'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '2095117J',
                'password' => Hash::make('2095117J'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '5JA2111112',
                'password' => Hash::make('5JA2111112'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '5JA2111111',
                'password' => Hash::make('5JA2111111'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1992115C',
                'password' => Hash::make('1992115C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '2096116C',
                'password' => Hash::make('2096116C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '2072118C',
                'password' => Hash::make('2072118C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '2093119C',
                'password' => Hash::make('2093119C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '2092120C',
                'password' => Hash::make('2092120C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '2094121C',
                'password' => Hash::make('2094121C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '1882109C',
                'password' => Hash::make('1882109C'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '6CP115111',
                'password' => Hash::make('6CP115111'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '3CG117171',
                'password' => Hash::make('3CG117171'),
                'id_juu_default' => NULL
            ],
            [
                'nik' => '2JA711111',
                'password' => Hash::make('2JA711111'),
                'id_juu_default' => NULL
            ],
        ]);
    }
}

<?php
namespace Database\Seeders\Master;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelBank extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.bank RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('bank')->insert([
            [ 'kode' => '008', 'nama' => 'MANDIRI' ],
            [ 'kode' => '451', 'nama' => 'MANDIRI SYARIAH' ],
            [ 'kode' => '009', 'nama' => 'BNI' ],
            [ 'kode' => '427', 'nama' => 'BNI SYARIAH' ],
            [ 'kode' => '002', 'nama' => 'BRI' ],
            [ 'kode' => '422', 'nama' => 'BRI SYARIAH' ],
            [ 'kode' => '014', 'nama' => 'BCA' ],
            [ 'kode' => '536', 'nama' => 'BCA SYARIAH' ],
            [ 'kode' => '147', 'nama' => 'MUAMALAT' ],
            [ 'kode' => '022', 'nama' => 'CIMB NIAGA' ],
            [ 'kode' => '022', 'nama' => 'CIMB NIAGA SYARIAH' ],
            [ 'kode' => '213', 'nama' => 'BTPN' ],
            [ 'kode' => '547', 'nama' => 'BTPN SYARIAH' ],
            [ 'kode' => '200', 'nama' => 'BTN' ],
            [ 'kode' => '013', 'nama' => 'PERMATA' ],
            [ 'kode' => '011', 'nama' => 'DANAMON' ],
            [ 'kode' => '016', 'nama' => 'MAYBANK' ],
            [ 'kode' => '441', 'nama' => 'BUKOPIN' ],
            [ 'kode' => '521', 'nama' => 'BUKOPIN SYARIAH' ],
            [ 'kode' => '426', 'nama' => 'MEGA' ],
            [ 'kode' => '153', 'nama' => 'SINARMAS' ],
            [ 'kode' => '950', 'nama' => 'COMMONWEALTH' ],
            [ 'kode' => '028', 'nama' => 'OCBC NISP' ],
            [ 'kode' => '110', 'nama' => 'BANK JABAR' ],
            [ 'kode' => '111', 'nama' => 'BANK DKI JAKARTA' ],
            [ 'kode' => '112', 'nama' => 'BPD DIY (YOGYAKARTA)' ],
            [ 'kode' => '113', 'nama' => 'BANK JATENG' ],
            [ 'kode' => '114', 'nama' => 'BANK JATIM' ],
            [ 'kode' => '115', 'nama' => 'BPD JAMBI' ],
            [ 'kode' => '116', 'nama' => 'BPD ACEH' ],
            [ 'kode' => '116', 'nama' => 'BPD ACEH SYARIAH' ],
            [ 'kode' => '117', 'nama' => 'BANK SUMUT' ],
            [ 'kode' => '118', 'nama' => 'BANK NAGARI (BANK SUMBAR)' ],
            [ 'kode' => '119', 'nama' => 'BANK RIAU KEPRI' ],
            [ 'kode' => '120', 'nama' => 'BANK SUMSEL BABEL' ],
            [ 'kode' => '121', 'nama' => 'BANK LAMPUNG' ],
            [ 'kode' => '122', 'nama' => 'BANK KALSEL' ],
            [ 'kode' => '123', 'nama' => 'BANK KALBAR' ],
            [ 'kode' => '124', 'nama' => 'BANK KALTIMTARA' ],
            [ 'kode' => '125', 'nama' => 'BANK KALTENG' ],
            [ 'kode' => '126', 'nama' => 'BANK SULSELBAR' ],
            [ 'kode' => '127', 'nama' => 'BANK SULUTGO' ],
            [ 'kode' => '128', 'nama' => 'BANK NTB' ],
            [ 'kode' => '128', 'nama' => 'BANK NTB SYARIAH' ],
            [ 'kode' => '129', 'nama' => 'BPD BALI' ],
            [ 'kode' => '130', 'nama' => 'BANK NTT' ],
            [ 'kode' => '131', 'nama' => 'BANK MALUKU MALUT' ],
            [ 'kode' => '132', 'nama' => 'BANK PAPUA' ],
            [ 'kode' => '133', 'nama' => 'BANK BENGKULU' ],
            [ 'kode' => '134', 'nama' => 'BANK SULTENG' ],
            [ 'kode' => '135', 'nama' => 'BANK SULTRA' ],
            [ 'kode' => '137', 'nama' => 'BPB BANTEN' ]
        ]);
    }
}

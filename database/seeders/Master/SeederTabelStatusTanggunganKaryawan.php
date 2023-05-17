<?php
namespace Database\Seeders\Master;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelStatusTanggunganKaryawan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.status_tanggungan_karyawan RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('status_tanggungan_karyawan')->insert([
            [ 'kode' => 'TK', 'nama' => 'Tidak Kawin', 'keterangan' => 'Karyawan tidak memiliki tanggungan' ],
            [ 'kode' => 'TK/1', 'nama' => 'Tidak Kawin Anak 1', 'keterangan' => 'Karyawan memiliki tanggungan 1 anak' ],
            [ 'kode' => 'TK/2', 'nama' => 'Tidak Kawin Anak 2', 'keterangan' => 'Karyawan memiliki tanggungan 2 anak' ],
            [ 'kode' => 'TK/3', 'nama' => 'Tidak Kawin Anak 3', 'keterangan' => 'Karyawan memiliki tanggungan 3 anak' ],
            [ 'kode' => 'K/0', 'nama' => 'Kawin', 'keterangan' => 'Karyawan memiliki tanggungan suami/istri' ],
            [ 'kode' => 'K/1', 'nama' => 'Kawin Anak 1', 'keterangan' => 'Karyawan memiliki tanggungan suami/istri dan 1 anak' ],
            [ 'kode' => 'K/2', 'nama' => 'Kawin Anak 2', 'keterangan' => 'Karyawan memiliki tanggungan suami/istri dan 2 anak' ],
            [ 'kode' => 'K/3', 'nama' => 'Kawin Anak 3', 'keterangan' => 'Karyawan memiliki tanggungan suami/istri dan 3 anak' ],
        ]);
    }
}

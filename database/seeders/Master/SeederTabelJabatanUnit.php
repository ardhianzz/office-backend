<?php
namespace Database\Seeders\Master;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

use App\Models\Master\Unit;
use App\Models\Master\Jabatan;

class SeederTabelJabatanUnit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.jabatan_unit RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('jabatan_unit')->insert([
            [ /* 1 */
                'kode' => 'DIRUT',
                'id_jabatan' => Jabatan::where('nama', 'Direktur Utama')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 2 */
                'kode' => 'SEKPER',
                'id_jabatan' => Jabatan::where('nama', 'Sekretaris Perusahaan')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 3 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Senior Manager Keuangan & Umum')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 4 */
                'kode' => 'DIRKEUM',
                'id_jabatan' => Jabatan::where('nama', 'Direktur Keuangan & Umum')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 5 */
                'kode' => 'DIRTEK&OP',
                'id_jabatan' => Jabatan::where('nama', 'Direktur Teknik & Operasi')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 6 */
                'kode' => 'DIRPRO',
                'id_jabatan' => Jabatan::where('nama', 'Direktur Proyek')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 7 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Staf Keuangan')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 8 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Manager Pengadaan')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 9 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Asisten Manager SDM & Umum')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 10 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Sekretaris Junior')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 11 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Staf Pajak')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 12 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Staf Keuangan Umum')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 13 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Asisten Direktur Teknik & Operasi')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 14 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Sekretaris Senior')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 15 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Staf Pengadaan')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 16 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Keuangan')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 17 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Pajak')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 18 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Resepsionis')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 19 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Manager Keuangan')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 20 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Staf Teknologi Informasi')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 21 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Manager Akuntansi')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 22 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Pengadaan')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 23 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Akuntansi')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 24 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Staf SDM & Umum')->first()->id,
                'id_unit' => Unit::where('nama', 'Head Office')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 25 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Asisten Manager Operasi')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 1&2')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 26 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Coal Handling')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 1&2')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 27 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Boiler & Ash')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 1&2')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 28 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Operasi')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 1&2')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 29 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Listrik')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 1&2')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 30 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Electric & Instrument BOP')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 1&2')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 31 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Asisten Manager Pemeliharaan')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 1&2')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 32 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Instrument & Control')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 1&2')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 33 */
                'kode' => 'GM',
                'id_jabatan' => Jabatan::where('nama', 'General Manager')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 1&2')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 34 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Turbin')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 1&2')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 35 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Asisten Manager Pemeliharaan')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 36 */
                'kode' => 'GM',
                'id_jabatan' => Jabatan::where('nama', 'General Manager')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 37 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Instrument & Control')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 38 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Asisten Manager Operasi')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 39 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Boiler & Ash')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 40 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Electric & Instrument BOP')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 41 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Operasi')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 42 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Coal Handling')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 43 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Turbin')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 44 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Turbin')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3A')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 45 */
                'kode' => 'GM',
                'id_jabatan' => Jabatan::where('nama', 'General Manager')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3A')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 46 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Operasi')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3A')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 47 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Listrik')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3A')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 48 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Instrument & Control')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3A')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 49 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Asisten Manager Operasi')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3A')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 50 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Coal Handling')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3A')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 51 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Asisten Manager Pemeliharaan')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3A')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 52 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Boiler & Ash')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3A')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 53 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Electric & Instrument BOP')->first()->id,
                'id_unit' => Unit::where('nama', 'Unit 3A')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 54 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Asisten Manager Project Mechanical Engineer')->first()->id,
                'id_unit' => Unit::where('nama', 'Project')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 55 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Project Electrical Engineer')->first()->id,
                'id_unit' => Unit::where('nama', 'Project')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 56 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Asisten Manager Project Senior Engineer')->first()->id,
                'id_unit' => Unit::where('nama', 'Project')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 57 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Marine Civil Engineer')->first()->id,
                'id_unit' => Unit::where('nama', 'Project')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 58 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Project Civil Engineer')->first()->id,
                'id_unit' => Unit::where('nama', 'Project')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 59 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Project Secretary')->first()->id,
                'id_unit' => Unit::where('nama', 'Project')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 60 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Project Mechanical Junior Engineer')->first()->id,
                'id_unit' => Unit::where('nama', 'Project')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 61 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Project Manager')->first()->id,
                'id_unit' => Unit::where('nama', 'Project')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 62 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Senior Project Consultant')->first()->id,
                'id_unit' => Unit::where('nama', 'Project')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 63 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Sekretaris Site')->first()->id,
                'id_unit' => Unit::where('nama', 'Project')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 1
            ],
            [ /* 64 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Manager Engineering')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 65 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Warehouse')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 66 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Electric & IC Inventory')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 67 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Manager Warehouse & Inventory')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 68 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Pengadaan')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 69 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Asisten Manager Keuangan & Administrasi')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 70 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Sipil')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 71 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Staf Mechanical Inventory')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 72 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Niaga')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 73 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Administrasi & Umum')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 74 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Staf Pengadaan')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 75 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Staf Keuangan')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 76 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Asisten Manager Sipil')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 77 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Operasional & Bahan Bakar')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 78 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Lingkungan')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 79 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor SDM & Administrasi')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 80 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Pemeliharaan Prediktif')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 81 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor General & Consumable Inventory')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 82 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Sekretaris Site')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 83 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Staf Operasional & Bahan Bakar')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 84 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Tribology & NDT')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 85 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Mechanical Inventory')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 86 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Staf CSR')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 87 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Manager Operasional & Bahan Bakar')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 88 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Warehouse Expert')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 89 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Supervisor Alat Berat')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 90 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Asisten Manager LK3 & CSR')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 91 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Staf Lingkungan')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 92 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Asisten Manager Kimia & Laboratorium')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 93 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Staf Electrical Inventory')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 94 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Staf Workshop')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 95 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Staf Pemeliharaan Prediktif')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 96 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Asisten Sekretaris Site')->first()->id,
                'id_unit' => Unit::where('nama', 'Common')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],
            [ /* 97 */
                'kode' => NULL,
                'id_jabatan' => Jabatan::where('nama', 'Staf Administrasi')->first()->id,
                'id_unit' => Unit::where('nama', 'Project')->first()->id,
                'id_parent' => NULL,
                'is_nama_jabatan_unit' => 0
            ],













            // [
            //     'kode' => 'DIRKEUM',
            //     'id_jabatan' => 3,
            //     'id_unit' => 1,
            //     'id_parent' => 1,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 4,
            //     'id_unit' => 1,
            //     'id_parent' => 3,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 5,
            //     'id_unit' => 1,
            //     'id_parent' => 4,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 6,
            //     'id_unit' => 1,
            //     'id_parent' => 4,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 7,
            //     'id_unit' => 1,
            //     'id_parent' => 4,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 8,
            //     'id_unit' => 1,
            //     'id_parent' => 4,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 9,
            //     'id_unit' => 1,
            //     'id_parent' => 2,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 10,
            //     'id_unit' => 1,
            //     'id_parent' => 9,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 11,
            //     'id_unit' => 1,
            //     'id_parent' => 10,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 12,
            //     'id_unit' => 1,
            //     'id_parent' => 11,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 13,
            //     'id_unit' => 1,
            //     'id_parent' => 5,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 14,
            //     'id_unit' => 1,
            //     'id_parent' => 13,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 15,
            //     'id_unit' => 1,
            //     'id_parent' => 14,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 16,
            //     'id_unit' => 1,
            //     'id_parent' => 15,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 17,
            //     'id_unit' => 1,
            //     'id_parent' => 5,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 18,
            //     'id_unit' => 1,
            //     'id_parent' => 17,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 19,
            //     'id_unit' => 1,
            //     'id_parent' => 6,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 20,
            //     'id_unit' => 1,
            //     'id_parent' => 6,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 21,
            //     'id_unit' => 1,
            //     'id_parent' => 20,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 22,
            //     'id_unit' => 1,
            //     'id_parent' => 7,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 23,
            //     'id_unit' => 1,
            //     'id_parent' => 22,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 24,
            //     'id_unit' => 1,
            //     'id_parent' => 23,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => 'ASMANHRD',
            //     'id_jabatan' => 25,
            //     'id_unit' => 1,
            //     'id_parent' => 8,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 26,
            //     'id_unit' => 1,
            //     'id_parent' => 25,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => 'DIRTEK&OP',
            //     'id_jabatan' => 27,
            //     'id_unit' => 1,
            //     'id_parent' => 1,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 28,
            //     'id_unit' => 1,
            //     'id_parent' => 27,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => 'GM',
            //     'id_jabatan' => 29,
            //     'id_unit' => 2,
            //     'id_parent' => 27,
            //     'is_nama_jabatan_unit' => 1
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 30,
            //     'id_unit' => 2,
            //     'id_parent' => 29,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 31,
            //     'id_unit' => 2,
            //     'id_parent' => 29,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 32,
            //     'id_unit' => 2,
            //     'id_parent' => 30,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 33,
            //     'id_unit' => 2,
            //     'id_parent' => 30,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 34,
            //     'id_unit' => 2,
            //     'id_parent' => 30,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 35,
            //     'id_unit' => 2,
            //     'id_parent' => 30,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 36,
            //     'id_unit' => 2,
            //     'id_parent' => 30,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 37,
            //     'id_unit' => 2,
            //     'id_parent' => 30,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 38,
            //     'id_unit' => 2,
            //     'id_parent' => 31,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 39,
            //     'id_unit' => 2,
            //     'id_parent' => 31,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 40,
            //     'id_unit' => 2,
            //     'id_parent' => 38,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => 'GM',
            //     'id_jabatan' => 29,
            //     'id_unit' => 3,
            //     'id_parent' => 27,
            //     'is_nama_jabatan_unit' => 1
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 30,
            //     'id_unit' => 3,
            //     'id_parent' => 41,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 31,
            //     'id_unit' => 3,
            //     'id_parent' => 41,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 32,
            //     'id_unit' => 3,
            //     'id_parent' => 42,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 33,
            //     'id_unit' => 3,
            //     'id_parent' => 42,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 34,
            //     'id_unit' => 3,
            //     'id_parent' => 42,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 35,
            //     'id_unit' => 3,
            //     'id_parent' => 42,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 36,
            //     'id_unit' => 3,
            //     'id_parent' => 42,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 37,
            //     'id_unit' => 3,
            //     'id_parent' => 42,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 41,
            //     'id_unit' => 3,
            //     'id_parent' => 44,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 42,
            //     'id_unit' => 3,
            //     'id_parent' => 45,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 44,
            //     'id_unit' => 3,
            //     'id_parent' => 46,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 43,
            //     'id_unit' => 3,
            //     'id_parent' => 48,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 45,
            //     'id_unit' => 3,
            //     'id_parent' => 49,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 46,
            //     'id_unit' => 3,
            //     'id_parent' => 50,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 38,
            //     'id_unit' => 3,
            //     'id_parent' => 43,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 47,
            //     'id_unit' => 3,
            //     'id_parent' => 56,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 40,
            //     'id_unit' => 3,
            //     'id_parent' => 57,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => 'GM',
            //     'id_jabatan' => 29,
            //     'id_unit' => 4,
            //     'id_parent' => 27,
            //     'is_nama_jabatan_unit' => 1
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 30,
            //     'id_unit' => 4,
            //     'id_parent' => 59,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 31,
            //     'id_unit' => 4,
            //     'id_parent' => 59,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 48,
            //     'id_unit' => 1,
            //     'id_parent' => 27,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 49,
            //     'id_unit' => 1,
            //     'id_parent' => 27,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 50,
            //     'id_unit' => 1,
            //     'id_parent' => 27,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 51,
            //     'id_unit' => 1,
            //     'id_parent' => 27,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 52,
            //     'id_unit' => 1,
            //     'id_parent' => 63,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 53,
            //     'id_unit' => 1,
            //     'id_parent' => 64,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 54,
            //     'id_unit' => 1,
            //     'id_parent' => 27,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 55,
            //     'id_unit' => 1,
            //     'id_parent' => 65,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 56,
            //     'id_unit' => 1,
            //     'id_parent' => 66,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 57,
            //     'id_unit' => 1,
            //     'id_parent' => 66,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 58,
            //     'id_unit' => 1,
            //     'id_parent' => 67,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 59,
            //     'id_unit' => 1,
            //     'id_parent' => 67,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 60,
            //     'id_unit' => 1,
            //     'id_parent' => 68,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 61,
            //     'id_unit' => 1,
            //     'id_parent' => 68,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 62,
            //     'id_unit' => 1,
            //     'id_parent' => 69,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 63,
            //     'id_unit' => 1,
            //     'id_parent' => 69,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 64,
            //     'id_unit' => 1,
            //     'id_parent' => 69,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 65,
            //     'id_unit' => 1,
            //     'id_parent' => 77,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 66,
            //     'id_unit' => 1,
            //     'id_parent' => 78,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 67,
            //     'id_unit' => 1,
            //     'id_parent' => 27,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 68,
            //     'id_unit' => 1,
            //     'id_parent' => 27,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 69,
            //     'id_unit' => 1,
            //     'id_parent' => 27,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 15,
            //     'id_unit' => 1,
            //     'id_parent' => 81,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 70,
            //     'id_unit' => 1,
            //     'id_parent' => 83,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 71,
            //     'id_unit' => 5,
            //     'id_parent' => 1,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => 'DIRPRO',
            //     'id_jabatan' => 72,
            //     'id_unit' => 5,
            //     'id_parent' => 1,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 73,
            //     'id_unit' => 5,
            //     'id_parent' => 87,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 74,
            //     'id_unit' => 5,
            //     'id_parent' => 87,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 75,
            //     'id_unit' => 5,
            //     'id_parent' => 87,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 76,
            //     'id_unit' => 5,
            //     'id_parent' => 87,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 77,
            //     'id_unit' => 5,
            //     'id_parent' => 88,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 78,
            //     'id_unit' => 5,
            //     'id_parent' => 88,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 79,
            //     'id_unit' => 5,
            //     'id_parent' => 88,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 80,
            //     'id_unit' => 5,
            //     'id_parent' => 88,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 81,
            //     'id_unit' => 5,
            //     'id_parent' => 88,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 82,
            //     'id_unit' => 5,
            //     'id_parent' => 88,
            //     'is_nama_jabatan_unit' => 0
            // ],
            // [
            //     'kode' => NULL,
            //     'id_jabatan' => 83,
            //     'id_unit' => 5,
            //     'id_parent' => 88,
            //     'is_nama_jabatan_unit' => 0
            // ]
        ]);
    }
}

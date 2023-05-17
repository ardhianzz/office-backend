<?php
namespace Database\Seeders\Master;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeederTabelJabatan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('master_sys')->statement("TRUNCATE TABLE ONLY sys.jabatan RESTART IDENTITY CASCADE");
        DB::connection('master_sys')->table('jabatan')->insert([
            [ /* 1 */
                'kode' => 'DIRUT',
                'nama' => 'Direktur Utama',
                'nama_en' => 'President Director',
                'alias' => 'Dirut',
                'level' => 1,
                'is_direksi' => TRUE
            ],
            [ /* 2 */
                'kode' => 'SEKPER',
                'nama' => 'Sekretaris Perusahaan',
                'nama_en' => 'Corporate Secretary',
                'alias' => 'Sekper',
                'level' => 2,
                'is_direksi' => TRUE
            ],
            [ /* 3 */
                'kode' => NULL,
                'nama' => 'Senior Manager Keuangan & Umum',
                'nama_en' => 'Senior Manager of Finance & General Affairs',
                'alias' => NULL,
                'level' => 3,
                'is_direksi' => FALSE
            ],
            [ /* 4 */
                'kode' => 'DIRKEUM',
                'nama' => 'Direktur Keuangan & Umum',
                'nama_en' => 'Finance & General Affairs Director',
                'alias' => 'Dirkeum',
                'level' => 2,
                'is_direksi' => TRUE
            ],
            [ /* 5 */
                'kode' => 'DIRTEK&OP',
                'nama' => 'Direktur Teknik & Operasi',
                'nama_en' => 'Technical & Operations Director',
                'alias' => 'Dirtekop',
                'level' => 2,
                'is_direksi' => TRUE
            ],
            [ /* 6 */
                'kode' => 'DIRPRO',
                'nama' => 'Direktur Proyek',
                'nama_en' => 'Project Director',
                'alias' => 'Dirpro',
                'level' => 2,
                'is_direksi' => TRUE
            ],
            [ /* 7 */
                'kode' => NULL,
                'nama' => 'Staf Keuangan',
                'nama_en' => 'Finance Staff',
                'alias' => NULL,
                'level' => 7,
                'is_direksi' => FALSE
            ],
            [ /* 8 */
                'kode' => NULL,
                'nama' => 'Manager Pengadaan',
                'nama_en' => 'Purchasing Manager',
                'alias' => NULL,
                'level' => 4,
                'is_direksi' => FALSE
            ],
            [ /* 9 */
                'kode' => NULL,
                'nama' => 'Asisten Manager SDM & Umum',
                'nama_en' => 'HR & GA Asisstant Manager',
                'alias' => NULL,
                'level' => 5,
                'is_direksi' => FALSE
            ],
            [ /* 10 */
                'kode' => NULL,
                'nama' => 'Sekretaris Junior',
                'nama_en' => 'Junior Secretary',
                'alias' => NULL,
                'level' => 7,
                'is_direksi' => FALSE
            ],
            [ /* 11 */
                'kode' => NULL,
                'nama' => 'Staf Pajak',
                'nama_en' => 'Tax Staff',
                'alias' => NULL,
                'level' => 7,
                'is_direksi' => FALSE
            ],
            [ /* 12 */
                'kode' => NULL,
                'nama' => 'Staf Keuangan Umum',
                'nama_en' => 'General Finance Staff',
                'alias' => NULL,
                'level' => 7,
                'is_direksi' => FALSE
            ],
            [ /* 13 */
                'kode' => NULL,
                'nama' => 'Asisten Direktur Teknik & Operasi',
                'nama_en' => 'Senior Engineer to Technical & Operation Director',
                'alias' => NULL,
                'level' => 3,
                'is_direksi' => FALSE
            ],
            [ /* 14 */
                'kode' => NULL,
                'nama' => 'Sekretaris Senior',
                'nama_en' => 'Senior Secretary',
                'alias' => NULL,
                'level' => 5,
                'is_direksi' => FALSE
            ],
            [ /* 15 */
                'kode' => NULL,
                'nama' => 'Staf Pengadaan',
                'nama_en' => 'Purchasing Staff',
                'alias' => NULL,
                'level' => 7,
                'is_direksi' => FALSE
            ],
            [ /* 16 */
                'kode' => NULL,
                'nama' => 'Supervisor Keuangan',
                'nama_en' => 'Finance Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 17 */
                'kode' => NULL,
                'nama' => 'Supervisor Pajak',
                'nama_en' => 'Tax Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 18 */
                'kode' => NULL,
                'nama' => 'Resepsionis',
                'nama_en' => 'Receptionist',
                'alias' => NULL,
                'level' => 7,
                'is_direksi' => FALSE
            ],
            [ /* 19 */
                'kode' => NULL,
                'nama' => 'Manager Keuangan',
                'nama_en' => 'Finance Manager',
                'alias' => NULL,
                'level' => 4,
                'is_direksi' => FALSE
            ],
            [ /* 20 */
                'kode' => NULL,
                'nama' => 'Staf Teknologi Informasi',
                'nama_en' => 'IT Staff',
                'alias' => NULL,
                'level' => 7,
                'is_direksi' => FALSE
            ],
            [ /* 21 */
                'kode' => NULL,
                'nama' => 'Manager Akuntansi',
                'nama_en' => 'Accounting Manager',
                'alias' => NULL,
                'level' => 4,
                'is_direksi' => FALSE
            ],
            [ /* 22 */
                'kode' => NULL,
                'nama' => 'Supervisor Pengadaan',
                'nama_en' => 'Purchasing Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 23 */
                'kode' => NULL,
                'nama' => 'Supervisor Akuntansi',
                'nama_en' => 'Accounting Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 24 */
                'kode' => NULL,
                'nama' => 'Staf SDM & Umum',
                'nama_en' => 'HR & GA Staff',
                'alias' => NULL,
                'level' => 7,
                'is_direksi' => FALSE
            ],
            [ /* 25 */
                'kode' => NULL,
                'nama' => 'Asisten Manager Operasi',
                'nama_en' => 'Assistant Manager of Operations',
                'alias' => NULL,
                'level' => 5,
                'is_direksi' => FALSE
            ],
            [ /* 26 */
                'kode' => NULL,
                'nama' => 'Supervisor Coal Handling',
                'nama_en' => 'Coal Handling Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 27 */
                'kode' => NULL,
                'nama' => 'Supervisor Boiler & Ash',
                'nama_en' => 'Boiler & Ash Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 28 */
                'kode' => NULL,
                'nama' => 'Supervisor Operasi',
                'nama_en' => 'Operation Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 29 */
                'kode' => NULL,
                'nama' => 'Supervisor Listrik',
                'nama_en' => 'Electric Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 30 */
                'kode' => NULL,
                'nama' => 'Supervisor Electric & Instrument BOP',
                'nama_en' => 'Electric & Instrument BOP Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 31 */
                'kode' => NULL,
                'nama' => 'Asisten Manager Pemeliharaan',
                'nama_en' => 'Assistant Manager of Maintenance',
                'alias' => NULL,
                'level' => 5,
                'is_direksi' => FALSE
            ],
            [ /* 32 */
                'kode' => NULL,
                'nama' => 'Supervisor Instrument & Control',
                'nama_en' => 'Instrument & Control Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 33 */
                'kode' => 'GM',
                'nama' => 'General Manager',
                'nama_en' => 'General Manager',
                'alias' => NULL,
                'level' => 4,
                'is_direksi' => FALSE
            ],
            [ /* 34 */
                'kode' => NULL,
                'nama' => 'Supervisor Turbin',
                'nama_en' => 'Turbin Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 35 */
                'kode' => NULL,
                'nama' => 'Asisten Manager Project Mechanical Engineer',
                'nama_en' => 'Assistant Manager of Project Mechanical Engineer',
                'alias' => NULL,
                'level' => 5,
                'is_direksi' => FALSE
            ],
            [ /* 36 */
                'kode' => NULL,
                'nama' => 'Supervisor Project Electrical Engineer',
                'nama_en' => 'Project Electrical Engineer Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 37 */
                'kode' => NULL,
                'nama' => 'Asisten Manager Project Senior Engineer',
                'nama_en' => 'Assistant Manager of Project Senior Engineer',
                'alias' => NULL,
                'level' => 5,
                'is_direksi' => FALSE
            ],
            [ /* 38 */
                'kode' => NULL,
                'nama' => 'Supervisor Marine Civil Engineer',
                'nama_en' => 'Marine Civil Engineer Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 39 */
                'kode' => NULL,
                'nama' => 'Supervisor Project Civil Engineer',
                'nama_en' => 'Project Civil Engineer Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 40 */
                'kode' => NULL,
                'nama' => 'Project Secretary',
                'nama_en' => 'Project Secretary',
                'alias' => NULL,
                'level' => 5,
                'is_direksi' => FALSE
            ],
            [ /* 41 */
                'kode' => NULL,
                'nama' => 'Supervisor Project Mechanical Junior Engineer',
                'nama_en' => 'Project Mechanical Junior Engineer Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 42 */
                'kode' => NULL,
                'nama' => 'Project Manager',
                'nama_en' => 'Project Manager',
                'alias' => NULL,
                'level' => 4,
                'is_direksi' => FALSE
            ],
            [ /* 43 */
                'kode' => NULL,
                'nama' => 'Senior Project Consultant',
                'nama_en' => 'Senior Project Consultant',
                'alias' => NULL,
                'level' => 3,
                'is_direksi' => FALSE
            ],
            [ /* 44 */
                'kode' => NULL,
                'nama' => 'Sekretaris Site',
                'nama_en' => 'Sekretaris Site',
                'alias' => NULL,
                'level' => 7,
                'is_direksi' => FALSE
            ],
            [ /* 45 */
                'kode' => NULL,
                'nama' => 'Manager Engineering',
                'nama_en' => 'Engineering Manager',
                'alias' => NULL,
                'level' => 4,
                'is_direksi' => FALSE
            ],
            [ /* 46 */
                'kode' => NULL,
                'nama' => 'Supervisor Warehouse',
                'nama_en' => 'Warehouse Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 47 */
                'kode' => NULL,
                'nama' => 'Supervisor Electric & IC Inventory',
                'nama_en' => 'Electric & IC Inventory Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 48 */
                'kode' => NULL,
                'nama' => 'Manager Warehouse & Inventory',
                'nama_en' => 'Warehouse & Inventory Manager',
                'alias' => NULL,
                'level' => 4,
                'is_direksi' => FALSE
            ],
            [ /* 49 */
                'kode' => NULL,
                'nama' => 'Asisten Manager Keuangan & Administrasi',
                'nama_en' => 'Assistant Manager of Finance & Administration',
                'alias' => NULL,
                'level' => 5,
                'is_direksi' => FALSE
            ],
            [ /* 50 */
                'kode' => NULL,
                'nama' => 'Supervisor Sipil',
                'nama_en' => 'Civil Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 51 */
                'kode' => NULL,
                'nama' => 'Staf Mechanical Inventory',
                'nama_en' => 'Mechanical Inventory Staff',
                'alias' => NULL,
                'level' => 7,
                'is_direksi' => FALSE
            ],
            [ /* 52 */
                'kode' => NULL,
                'nama' => 'Supervisor Niaga',
                'nama_en' => 'Trade Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 53 */
                'kode' => NULL,
                'nama' => 'Supervisor Administrasi & Umum',
                'nama_en' => 'GA & Administration Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 54 */
                'kode' => NULL,
                'nama' => 'Asisten Manager Sipil',
                'nama_en' => 'Assistant Manager of Civil',
                'alias' => NULL,
                'level' => 5,
                'is_direksi' => FALSE
            ],
            [ /* 55 */
                'kode' => NULL,
                'nama' => 'Supervisor Operasional & Bahan Bakar',
                'nama_en' => 'Fuel & Operations Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 56 */
                'kode' => NULL,
                'nama' => 'Supervisor Lingkungan',
                'nama_en' => 'Environment Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 57 */
                'kode' => NULL,
                'nama' => 'Supervisor SDM & Administrasi',
                'nama_en' => 'HR & Administration Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 58 */
                'kode' => NULL,
                'nama' => 'Supervisor Pemeliharaan Prediktif',
                'nama_en' => 'Predictive Maintenance Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 59 */
                'kode' => NULL,
                'nama' => 'Supervisor General & Consumable Inventory',
                'nama_en' => 'General & Consumable Inventory Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 60 */
                'kode' => NULL,
                'nama' => 'Staf Operasional & Bahan Bakar',
                'nama_en' => 'Operational & Fuel Staff',
                'alias' => NULL,
                'level' => 7,
                'is_direksi' => FALSE
            ],
            [ /* 61 */
                'kode' => NULL,
                'nama' => 'Supervisor Tribology & NDT',
                'nama_en' => 'Tribology & NDT Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 62 */
                'kode' => NULL,
                'nama' => 'Supervisor Mechanical Inventory',
                'nama_en' => 'Mechanical Inventory Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 63 */
                'kode' => NULL,
                'nama' => 'Staf CSR',
                'nama_en' => 'CSR Staff',
                'alias' => NULL,
                'level' => 7,
                'is_direksi' => FALSE
            ],
            [ /* 64 */
                'kode' => NULL,
                'nama' => 'Manager Operasional & Bahan Bakar',
                'nama_en' => 'Operational & Fuel Manager',
                'alias' => NULL,
                'level' => 4,
                'is_direksi' => FALSE
            ],
            [ /* 65 */
                'kode' => NULL,
                'nama' => 'Warehouse Expert',
                'nama_en' => 'Warehouse Expert',
                'alias' => NULL,
                'level' => 3,
                'is_direksi' => FALSE
            ],
            [ /* 66 */
                'kode' => NULL,
                'nama' => 'Supervisor Alat Berat',
                'nama_en' => 'Heavy Machinery Supervisor',
                'alias' => NULL,
                'level' => 6,
                'is_direksi' => FALSE
            ],
            [ /* 67 */
                'kode' => NULL,
                'nama' => 'Asisten Manager LK3 & CSR',
                'nama_en' => 'Asisstant Manager of LK3 & CSR',
                'alias' => NULL,
                'level' => 5,
                'is_direksi' => FALSE
            ],
            [ /* 68 */
                'kode' => NULL,
                'nama' => 'Staf Lingkungan',
                'nama_en' => 'Environment Staff',
                'alias' => NULL,
                'level' => 7,
                'is_direksi' => FALSE
            ],
            [ /* 69 */
                'kode' => NULL,
                'nama' => 'Asisten Manager Kimia & Laboratorium',
                'nama_en' => 'Assistant Manager of Chemistry & Laboratory',
                'alias' => NULL,
                'level' => 5,
                'is_direksi' => FALSE
            ],
            [ /* 70 */
                'kode' => NULL,
                'nama' => 'Staf Electrical Inventory',
                'nama_en' => 'Electrical Inventory Staff',
                'alias' => NULL,
                'level' => 7,
                'is_direksi' => FALSE
            ],
            [ /* 71 */
                'kode' => NULL,
                'nama' => 'Staf Workshop',
                'nama_en' => 'Workshop Staff',
                'alias' => NULL,
                'level' => 7,
                'is_direksi' => FALSE
            ],
            [ /* 72 */
                'kode' => NULL,
                'nama' => 'Staf Pemeliharaan Prediktif',
                'nama_en' => 'Predictive Maintenance Staff',
                'alias' => NULL,
                'level' => 7,
                'is_direksi' => FALSE
            ],
            [ /* 73 */
                'kode' => NULL,
                'nama' => 'Asisten Sekretaris Site',
                'nama_en' => 'Site Secretary Assistant',
                'alias' => NULL,
                'level' => 7,
                'is_direksi' => FALSE
            ],
            [ /* 74 */
                'kode' => NULL,
                'nama' => 'Staf Administrasi',
                'nama_en' => 'Administration Staff',
                'alias' => NULL,
                'level' => 7,
                'is_direksi' => FALSE
            ],
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class SeederTabelJenisCuti extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('ecuti_sys')->statement("TRUNCATE TABLE ONLY sys.jenis_cuti RESTART IDENTITY CASCADE");
        DB::connection('ecuti_sys')->table('jenis_cuti')->insert([
            [
                'nama' => 'Cuti Tahunan',
                'min_pengajuan' => -21,
                'maks_pengajuan' => -1,
                'min_jumlah' => NULL,
                'maks_jumlah' => NULL,
                'is_lampiran' => 0,
                'id_jenis_hari_cuti' => 1,
                'id_parent' => NULL,
                'is_tanggal' => 0,
                'nama_tanggal' => NULL
            ],
            [
                'nama' => 'Cuti Khusus',
                'min_pengajuan' => NULL,
                'maks_pengajuan' => NULL,
                'min_jumlah' => NULL,
                'maks_jumlah' => NULL,
                'is_lampiran' => 0,
                'id_jenis_hari_cuti' => 1,
                'id_parent' => NULL,
                'is_tanggal' => 0,
                'nama_tanggal' => NULL
            ],
            [
                'nama' => 'Cuti Haji',
                'min_pengajuan' => NULL,
                'maks_pengajuan' => -1,
                'min_jumlah' => NULL,
                'maks_jumlah' => NULL,
                'is_lampiran' => 1,
                'id_jenis_hari_cuti' => 2,
                'id_parent' => 2,
                'is_tanggal' => 0,
                'nama_tanggal' => NULL
            ],
            [
                'nama' => 'Cuti Ibadah Keagamaan',
                'min_pengajuan' => NULL,
                'maks_pengajuan' => -1,
                'min_jumlah' => NULL,
                'maks_jumlah' => NULL,
                'is_lampiran' => 1,
                'id_jenis_hari_cuti' => 2,
                'id_parent' => 2,
                'is_tanggal' => 0,
                'nama_tanggal' => NULL
            ],
            [
                'nama' => 'Cuti Melahirkan',
                'min_pengajuan' => -45,
                'maks_pengajuan' => 7,
                'min_jumlah' => NULL,
                'maks_jumlah' => 90,
                'is_lampiran' => 1,
                'id_jenis_hari_cuti' => 2,
                'id_parent' => 2,
                'is_tanggal' => 1,
                'nama_tanggal' => 'Tanggal HPL/Melahirkan'
            ],
            [
                'nama' => 'Cuti Keguguran',
                'min_pengajuan' => 0,
                'maks_pengajuan' => 7,
                'min_jumlah' => NULL,
                'maks_jumlah' => 45,
                'is_lampiran' => 1,
                'id_jenis_hari_cuti' => 2,
                'id_parent' => 2,
                'is_tanggal' => 1,
                'nama_tanggal' => 'Tanggal Keguguran'
            ],
            [
                'nama' => 'Cuti Pernikahan',
                'min_pengajuan' => NULL,
                'maks_pengajuan' => -1,
                'min_jumlah' => NULL,
                'maks_jumlah' => 3,
                'is_lampiran' => 1,
                'id_jenis_hari_cuti' => 1,
                'id_parent' => 2,
                'is_tanggal' => 1,
                'nama_tanggal' => 'Tanggal Pernikahan'
            ],
            [
                'nama' => 'Cuti Istri Melahirkan/Keguguran',
                'min_pengajuan' => 0,
                'maks_pengajuan' => 7,
                'min_jumlah' => NULL,
                'maks_jumlah' => 2,
                'is_lampiran' => 1,
                'id_jenis_hari_cuti' => 1,
                'id_parent' => 2,
                'is_tanggal'  => 1,
                'nama_tanggal' => 'Tanggal Melahirkan/Keguguran'
            ],
            [
                'nama' => 'Cuti Kematian Suami/Istri/Anak',
                'min_pengajuan' => 0,
                'maks_pengajuan' => 7,
                'min_jumlah' => NULL,
                'maks_jumlah' => 2,
                'is_lampiran' => 1,
                'id_jenis_hari_cuti' => 1,
                'id_parent' => 2,
                'is_tanggal' => 1,
                'nama_tanggal' => 'Tanggal Kematian Suami/Istri/Anak'
            ],
            [
                'nama' => 'Cuti Kematian Saudara/Orang tua/Mertua',
                'min_pengajuan' => 0,
                'maks_pengajuan' => 7,
                'min_jumlah' => NULL,
                'maks_jumlah' => 2,
                'is_lampiran' => 1,
                'id_jenis_hari_cuti' => 1,
                'id_parent' => 2,
                'is_tanggal' => 1,
                'nama_tanggal' => 'Tanggal Kematian Saudara/Orang tua/Mertua'
            ],
            [
                'nama' => 'Cuti Kematian Saudara Suami/Istri',
                'min_pengajuan' => 0,
                'maks_pengajuan' => 7,
                'min_jumlah' => NULL,
                'maks_jumlah' => 1,
                'is_lampiran' => 1,
                'id_jenis_hari_cuti' => 1,
                'id_parent' => 2,
                'is_tanggal' => 1,
                'nama_tanggal' => 'Tanggal Kematian Saudara Suami/Istri'
            ],
            [
                'nama' => 'Cuti Kematian Anggota Keluarga Satu Rumah',
                'min_pengajuan' => 0,
                'maks_pengajuan' => 7,
                'min_jumlah' => NULL,
                'maks_jumlah' => 1,
                'is_lampiran' => 1,
                'id_jenis_hari_cuti' => 1,
                'id_parent' => 2,
                'is_tanggal' => 1,
                'nama_tanggal' => 'Tanggal Kematian Anggota Keluarga Satu Rumah'
            ],
            [
                'nama' => 'Cuti Pernikahan Anak',
                'min_pengajuan' => NULL,
                'maks_pengajuan' => -1,
                'min_jumlah' => NULL,
                'maks_jumlah' => 2,
                'is_lampiran' => 1,
                'id_jenis_hari_cuti' => 1,
                'id_parent' => 2,
                'is_tanggal' => 1,
                'nama_tanggal' => 'Tanggal Pernikahan Anak'
            ],
            [
                'nama' => 'Cuti Khitan/Baptis Anak',
                'min_pengajuan' => NULL,
                'maks_pengajuan' => -1,
                'min_jumlah' => NULL,
                'maks_jumlah' => 2,
                'is_lampiran' => 1,
                'id_jenis_hari_cuti' => 1,
                'id_parent' => 2,
                'is_tanggal' => 1,
                'nama_tanggal' => 'Tanggal Khitan/Baptis Anak'
            ],
            [
                'nama' => 'Cuti Sakit Keras Suami/Istri/Anak/Orang tua/Mertua/Menantu',
                'min_pengajuan' => 0,
                'maks_pengajuan' => 7,
                'min_jumlah' => NULL,
                'maks_jumlah' => 1,
                'is_lampiran' => 1,
                'id_jenis_hari_cuti' => 1,
                'id_parent' => 2,
                'is_tanggal' => 1,
                'nama_tanggal' => 'Tanggal Sakit Keras Suami/Istri/Anak/Orang tua/Mertua/Menantu'
            ],
            [
                'nama' => 'Cuti Rumah Rusak Bencana Alam',
                'min_pengajuan' => 0,
                'maks_pengajuan' => 7,
                'min_jumlah' => NULL,
                'maks_jumlah' => 2,
                'is_lampiran' => 1,
                'id_jenis_hari_cuti' => 1,
                'id_parent' => 2,
                'is_tanggal' => 1,
                'nama_tanggal' => 'Tanggal Bencana Alam'
            ],
            [
                'nama' => 'Cuti Wali Nikah Saudara Kandung',
                'min_pengajuan' => NULL,
                'maks_pengajuan' => -1,
                'min_jumlah' => NULL,
                'maks_jumlah' => 1,
                'is_lampiran' => 1,
                'id_jenis_hari_cuti' => 1,
                'id_parent' => 2,
                'is_tanggal' => 1,
                'nama_tanggal' => 'Tanggal Pernikahan Saudara Kandung'
            ],
            [
                'nama' => 'Cuti Panggilan Pihak Berwajib',
                'min_pengajuan' => NULL,
                'maks_pengajuan' => 7,
                'min_jumlah' => NULL,
                'maks_jumlah' => NULL,
                'is_lampiran' => 1,
                'id_jenis_hari_cuti' => 1,
                'id_parent' => 2,
                'is_tanggal' => 0,
                'nama_tanggal' => NULL
            ],
            [
                'nama' => 'Cuti Di Luar Tanggungan',
                'min_pengajuan' => -21,
                'maks_pengajuan' => -7,
                'min_jumlah' => 14,
                'maks_jumlah' => 90,
                'is_lampiran' => 0,
                'id_jenis_hari_cuti' => 2,
                'id_parent' => NULL,
                'is_tanggal' => 0,
                'nama_tanggal' => NULL
            ],
        ]);
    }
}

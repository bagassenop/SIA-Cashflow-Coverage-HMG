<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Akun;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $akun = [
        [
            'kode_akun' => '1-1000.000',
            'nama_akun' => 'Aktiva Lancar',
            'keterangan_akun' => null,
        ],
        [
            'kode_akun' => '1-1100.000',
            'nama_akun' => 'Kas',
            'keterangan_akun' => 'Aktiva Lancar',
        ],
        [
            'kode_akun' => '1-1200.000',
            'nama_akun' => 'Bank',
            'keterangan_akun' => 'Aktiva Lancar',
        ],
        [
            'kode_akun' => '1-1300.000',
            'nama_akun' => 'Piutang Dagang',
            'keterangan_akun' => 'Aktiva Lancar',
        ],
        [
            'kode_akun' => '1-1400.000',
            'nama_akun' => 'Piutang Karyawan',
            'keterangan_akun' => 'Aktiva Lancar',
        ],
        [
            'kode_akun' => '1-1500.000',
            'nama_akun' => 'Piutang Lain-lain',
            'keterangan_akun' => 'Aktiva Lancar',
        ],
        [
            'kode_akun' => '1-1600.000',
            'nama_akun' => 'Piutang Pemegang Saham',
            'keterangan_akun' => 'Aktiva Lancar',
        ],
        [
            'kode_akun' => '1-1700.000',
            'nama_akun' => 'Persediaan Barang',
            'keterangan_akun' => 'Aktiva Lancar',
        ],
        [
            'kode_akun' => '1-1800.000',
            'nama_akun' => 'Uang Muka & Biaya Dibayar Dimuka',
            'keterangan_akun' => 'Aktiva Lancar',
        ],
        [
            'kode_akun' => '1-1900.000',
            'nama_akun' => 'Pajak Dibayar Dimuka',
            'keterangan_akun' => 'Aktiva Lancar',
        ],
        [
            'kode_akun' => '1-2000.000',
            'nama_akun' => 'Aktiva Tetap',
            'keterangan_akun' => null,
        ],
        [
            'kode_akun' => '1-2100.000',
            'nama_akun' => 'Tanah',
            'keterangan_akun' => 'Aktiva Tetap',
        ],
        [
            'kode_akun' => '1-2200.000',
            'nama_akun' => 'Bangunan',
            'keterangan_akun' => 'Aktiva Tetap',
        ],
        [
            'kode_akun' => '1-2300.000',
            'nama_akun' => 'Mesin, Peralatan & Perlengkapan',
            'keterangan_akun' => 'Aktiva Tetap',
        ],
        [
            'kode_akun' => '1-2400.000',
            'nama_akun' => 'Kendaraan',
            'keterangan_akun' => 'Aktiva Tetap',
        ],
        [
            'kode_akun' => '1-2500.000',
            'nama_akun' => 'Inventaris Kantor',
            'keterangan_akun' => 'Aktiva Tetap',
        ],
        [
            'kode_akun' => '1-3100.000',
            'nama_akun' => 'Akum. Penyusutan Bangunan',
            'keterangan_akun' => 'Aktiva Tetap',
        ],
        [
            'kode_akun' => '1-3200.000',
            'nama_akun' => 'Akum. Penyusutan Mesin, Peralatan & Perlengkapan',
            'keterangan_akun' => 'Aktiva Tetap',
        ],
        [
            'kode_akun' => '1-3300.000',
            'nama_akun' => 'Akum. Penyusutan Kendaraan',
            'keterangan_akun' => 'Aktiva Tetap',
        ],
        [
            'kode_akun' => '1-3400.000',
            'nama_akun' => 'Akum. Penyusutan Inventaris Kantor',
            'keterangan_akun' => 'Aktiva Tetap',
        ],
        [
            'kode_akun' => '1-4100.000',
            'nama_akun' => 'Pajak Tangguhan',
            'keterangan_akun' => 'Nilai Buku Aktiva Tetap',
        ],
        [
            'kode_akun' => '1-4200.000',
            'nama_akun' => 'Investasi PT.Lain',
            'keterangan_akun' => 'Nilai Buku Aktiva Tetap',
        ],
        [
            'kode_akun' => '2-1000.000',
            'nama_akun' => 'Kewajiban Lancar',
            'keterangan_akun' => null,
        ],
        [
            'kode_akun' => '2-1100.000',
            'nama_akun' => 'Hutang Dagang',
            'keterangan_akun' => 'Kewajiban Lancar',
        ],
        [
            'kode_akun' => '2-1200.000',
            'nama_akun' => 'Hutang Komisi Penjualan',
            'keterangan_akun' => 'Kewajiban Lancar',
        ],
        [
            'kode_akun' => '2-1300.000',
            'nama_akun' => 'Hutang Lain-lain',
            'keterangan_akun' => 'Kewajiban Lancar',
        ],
        [
            'kode_akun' => '2-1400.000',
            'nama_akun' => 'Hutang Bank Jangka Pendek',
            'keterangan_akun' => 'Kewajiban Lancar',
        ],
        [
            'kode_akun' => '2-1500.000',
            'nama_akun' => 'Hutang Pajak',
            'keterangan_akun' => 'Kewajiban Lancar',
        ],
        [
            'kode_akun' => '2-1600.000',
            'nama_akun' => 'Liabilitas Pembiayaan Konsumen Jangka Pendek',
            'keterangan_akun' => 'Kewajiban Lancar',
        ],
        [
            'kode_akun' => '2-1700.000',
            'nama_akun' => 'Hutang Mesin',
            'keterangan_akun' => 'Kewajiban Lancar',
        ],
        [
            'kode_akun' => '2-1800.000',
            'nama_akun' => 'Uang Muka Penjualan',
            'keterangan_akun' => 'Kewajiban Lancar',
        ],
        [
            'kode_akun' => '2-1900.000',
            'nama_akun' => 'Biaya yang masih harus dibayar',
            'keterangan_akun' => 'Kewajiban Lancar',
        ],
        [
            'kode_akun' => '2-2000.000',
            'nama_akun' => 'Hutang Kepada Pemegang Saham',
            'keterangan_akun' => 'Kewajiban Jangka Panjang',
        ],
        [
            'kode_akun' => '2-2100.000',
            'nama_akun' => 'Hutang Bank Jangka Panjang',
            'keterangan_akun' => 'Kewajiban Jangka Panjang',
        ],
        [
            'kode_akun' => '2-2200.000',
            'nama_akun' => 'Liabilitas Pembiayaan Konsumen Jangka Panjang',
            'keterangan_akun' => 'Kewajiban Jangka Panjang',
        ],
        [
            'kode_akun' => '2-2300.000',
            'nama_akun' => 'Liabilitas Imbalan Kerja',
            'keterangan_akun' => 'Kewajiban Jangka Panjang',
        ],
        [
            'kode_akun' => '3-1000.000',
            'nama_akun' => 'Modal',
            'keterangan_akun' => null,
        ],
        [
            'kode_akun' => '3-1100.000',
            'nama_akun' => 'Modal Disetor',
            'keterangan_akun' => 'Modal',
        ],
        [
            'kode_akun' => '3-1200.000',
            'nama_akun' => 'Uang Muka Setoran Modal',
            'keterangan_akun' => 'Modal',
        ],
        [
            'kode_akun' => '3-1300.000',
            'nama_akun' => 'Surplus Revaluasi Tanah',
            'keterangan_akun' => 'Modal',
        ],
        [
            'kode_akun' => '3-1400.000',
            'nama_akun' => 'Tax Amnesty',
            'keterangan_akun' => 'Modal',
        ],
        [
            'kode_akun' => '3-1500.000',
            'nama_akun' => 'Laba Ditahan',
            'keterangan_akun' => 'Modal',
        ],
        [
            'kode_akun' => '3-1600.000',
            'nama_akun' => 'Deviden',
            'keterangan_akun' => 'Modal',
        ],
        [
            'kode_akun' => '3-1700.000',
            'nama_akun' => 'Laba Tahun Berjalan',
            'keterangan_akun' => 'Modal',
        ],
        [
            'kode_akun' => '4-0000.000',
            'nama_akun' => 'Pendapatan',
            'keterangan_akun' => null,
        ],
        [
            'kode_akun' => '4-1100.000',
            'nama_akun' => 'Penjualan Barang PPN',
            'keterangan_akun' => 'Pendapatan',
        ],
        [
            'kode_akun' => '4-2100.000',
            'nama_akun' => 'Jasa Makloon PPN',
            'keterangan_akun' => 'Pendapatan',
        ],
        [
            'kode_akun' => '4-3100.000',
            'nama_akun' => 'Jasa Servis PPN',
            'keterangan_akun' => 'Pendapatan',
        ],
        [
            'kode_akun' => '4-4100.000',
            'nama_akun' => 'Penjualan Bahan Baku & Bahan Penolong PPN',
            'keterangan_akun' => 'Pendapatan',
        ],
        [
            'kode_akun' => '6-9520.000',
            'nama_akun' => 'Pajak Penghasilan Ps 25',
            'keterangan_akun' => 'Pajak Penghasilan',
        ],
    ];
    Akun::insert($akun);
    }
}

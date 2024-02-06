<?php

namespace Database\Seeders;

use App\Models\Aktivitas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AktivitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aktivitas = [
        [
            'id_aktivitas' => '1',
            'keterangan' => 'Arus Kas Kegiatan Operasi',
            'keterangan_aktivitas' => null,
        ],
        [
            'id_aktivitas' => '2',
            'keterangan' => 'Arus Kas Kegiatan Investasi',
            'keterangan_aktivitas' => null,
        ],
        [
            'id_aktivitas' => '3',
            'keterangan' => 'Arus Kas Kegiatan Pendanaan',
            'keterangan_aktivitas' => null,
        ],
    ];
    Aktivitas::insert($aktivitas);
    }
}

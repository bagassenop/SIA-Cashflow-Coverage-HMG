<?php

namespace Database\Seeders;

use App\Models\PrediksiModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prediksi = [
            [
                'id' => '1',
                'liquiditas' => 'Liquid',
                'cashflowcoverage' => 'Baik',
                'perputaranpiutang' => 'Baik',
                'kondisiaruskas' => 'Aman',
            ],
            [
                'id' => '2',
                'liquiditas' => 'Liquid',
                'cashflowcoverage' => 'Tidak Baik',
                'perputaranpiutang' => 'Standar',
                'kondisiaruskas' => 'Tidak Aman',
            ],
            [
                'id' => '3',
                'liquiditas' => 'Iliquid',
                'cashflowcoverage' => 'Baik',
                'perputaranpiutang' => 'Tidak Baik',
                'kondisiaruskas' => 'Tidak Aman',
            ],
            [
                'id' => '4',
                'liquiditas' => 'Iliquid',
                'cashflowcoverage' => 'Standar',
                'perputaranpiutang' => 'Baik',
                'kondisiaruskas' => 'Aman',
            ],
            [
                'id' => '5',
                'liquiditas' => 'Liquid',
                'cashflowcoverage' => 'Tidak Baik',
                'perputaranpiutang' => 'Tidak Baik',
                'kondisiaruskas' => 'Tidak Aman',
            ],
            [
                'id' => '6',
                'liquiditas' => 'Iliquid',
                'cashflowcoverage' =>  'Standar',
                'perputaranpiutang' => 'Tidak Baik',
                'kondisiaruskas' => 'Tidak Aman',
            ],
            [
                'id' => '7',
                'liquiditas' => 'Liquid',
                'cashflowcoverage' => 'Tidak Baik',
                'perputaranpiutang' => 'Baik',
                'kondisiaruskas' => 'Aman',
            ],
            [
                'id' => '8',
                'liquiditas' => 'Liquid',
                'cashflowcoverage' => 'Standar',
                'perputaranpiutang' => 'Standar',
                'kondisiaruskas' => 'Tidak Aman',
            ],
            [
                'id' => '9',
                'liquiditas' => 'Iliquid',
                'cashflowcoverage' => 'Tidak Baik',
                'perputaranpiutang' => 'Tidak Baik',
                'kondisiaruskas' => 'Tidak Aman',
            ],
            [
                'id' => '10',
                'liquiditas' => 'Iliquid',
                'cashflowcoverage' => ' Tidak Baik',
                'perputaranpiutang' => 'Standar',
                'kondisiaruskas' => 'Tidak Aman',
            ],
            [
                'id' => '11',
                'liquiditas' => 'Liquid',
                'cashflowcoverage' => ' Standar',
                'perputaranpiutang' => 'Baik',
                'kondisiaruskas' => 'Aman',
            ],
            [
                'id' => '12',
                'liquiditas' => 'Liquid',
                'cashflowcoverage' => 'Baik',
                'perputaranpiutang' => 'Standar',
                'kondisiaruskas' => 'Aman',
            ],
            [
                'id' => '13',
                'liquiditas' => 'Iliquid',
                'cashflowcoverage' => 'Baik',
                'perputaranpiutang' => 'Standar',
                'kondisiaruskas' => 'Aman',
            ],
            [
                'id' => '14',
                'liquiditas' => 'Liquid',
                'cashflowcoverage' => 'Tidak Baik',
                'perputaranpiutang' => 'Baik',
                'kondisiaruskas' => 'Tidak Aman',
            ],
            [
                'id' => '15',
                'liquiditas' => 'Liquid',
                'cashflowcoverage' => ' Standar',
                'perputaranpiutang' => 'Tidak Baik',
                'kondisiaruskas' => 'Tidak Aman',
            ],
        ];
        PrediksiModel::insert($prediksi);
    }
    // }
}

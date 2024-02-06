<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\LabaRugi;
use App\Models\Neraca;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class LapArusKas extends Controller
{
    public function index()
    {
        $year = null;
        return view('konten.lap_arus_kas', compact('year'));
    }

    public function indexBulanan()
    {
        $year = null;
        $month = null;
        return view('konten.lap_arus_kas_monthly', compact('year', 'month'));
    }

    public function indexAfterFilter(Request $request)
    {
        // dd($request->year, ($request->year + 1));
        $dataNeracaNow = Neraca::where('periode', $request->year)->get();
        $dataNeracaThen = Neraca::where('periode', $request->year - 1)->get();
        $dataLabarugi = LabaRugi::where('periode', $request->year)->where('kode_akun', '6-9520.000')->first();
        $year = $request->year;
        $month = $request->month;
        // $dataNeracaThen =
        return view('konten.lap_arus_kas', compact('dataNeracaNow', 'dataNeracaThen', 'year', 'dataLabarugi', 'month'));
    }


    public function indexAfterFilterMonthly(Request $request)
    {
        // dd($request->year, ($request->year + 1));

        $dataNeracaNow = Neraca::where('periode', $request->year)->where('bulan', $request->month)->get();
        $yearThen = $request->year;

        if ($request->month == 'Januari') {
            $then = 'Desember';
            $yearThen = ($request->year - 1);
        } elseif ($request->month == 'Februari') {
            $then = 'Januari';
        } elseif ($request->month == 'Maret') {
            $then = 'Februari';
        } elseif ($request->month == 'April') {
            $then = 'Maret';
        } elseif ($request->month == 'Mei') {
            $then = 'April';
        } elseif ($request->month == 'Juni') {
            $then = 'Mei';
        } elseif ($request->month == 'Juli') {
            $then = 'Juni';
        } elseif ($request->month == 'Agustus') {
            $then = 'Juli';
        } elseif ($request->month == 'September') {
            $then = 'Agustus';
        } elseif ($request->month == 'Oktober') {
            $then = 'September';
        } elseif ($request->month == 'November') {
            $then = 'Oktober';
        } elseif ($request->month == 'Desember') {
            $then = 'November';
        }
        $dataNeracaThen = Neraca::where('periode', $yearThen)->where('bulan', $then)->get();
        // dd($dataNeracaThen, $then);
        $dataLabarugi = LabaRugi::where('periode', $request->year)->where('bulan', $request->month)->where('kode_akun', '6-9520.000')->first();
        // dd($dataLabarugi);
        $year = $request->year;
        $month = $request->month;
        // $dataNeracaThen =
        return view('konten.lap_arus_kas_monthly', compact('dataNeracaNow', 'dataNeracaThen', 'year', 'dataLabarugi', 'month', 'then'));
    }

    public function exportpdf(Request $request)
    {
        $dataLapArusKas = $this->indexAfterFilterMonthly($request); // No need for 'Request ($request)'
        view()->share('data', $dataLapArusKas);
        $pdf = PDF::loadview('data', ['data' => $dataLapArusKas]); // Pass data as an associative array
        return $pdf->download('data.pdf');
        // $dataLapArusKas = $this->indexAfterFilterMonthly(Request ($request));
        // view()->share('data', $dataLapArusKas);
        // $pdf = PDF::loadview('data', compact($dataLapArusKas));
        // return $pdf->download('data.pdf');
    }
}

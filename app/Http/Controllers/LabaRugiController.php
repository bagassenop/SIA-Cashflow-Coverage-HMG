<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\LabaRugi;
use Illuminate\Http\Request;

class LabaRugiController extends Controller
{
    public function index()
    {
        $data_akunlr = Akun::all();
        $dataLabaRugi = LabaRugi::all();
        // $test   = $dataLabaRugi->first();
        $year = null;
        $month = null;
        return view('finance.labarugi', [
            'akun' => $data_akunlr,
        ], compact('data_akunlr', 'dataLabaRugi', 'year', 'month'));
    }

    public function indexAfterFilter(Request $request)
    {
        // dd($request);
        $data_akunlr = Akun::all();
        $dataLabaRugi = LabaRugi::all();
        // $test   = $dataNeraca->first(); //Mengambil neraca yang pertama
        $year = $request->periode;
        $month = $request->month;
        // dd($dataNeraca->akun);
        return view('finance.labarugi', [
            'akun' => $data_akunlr,
        ], compact('data_akunlr', 'dataLabaRugi', 'year', 'month'));
    }

    public function submit(Request $request)
    {
        $labaRugi = ['Pendapatan', 'Pajak Penghasilan']; // Memanggil Akun Laba Rugi
        $jumlahlabaRugi = count($labaRugi); // Menghitung Jumlah Akun Laba Rugi
        // dd( $jumlahlabaRugi);

        //Memanggil Kode Akun
        for ($i = 0; $i < $jumlahlabaRugi; $i++) {
            $akunLabaRugi = Akun::where('keterangan_akun', $labaRugi[$i])->get();
            foreach ($akunLabaRugi as $key) {
                $kodeAkun[] =  $key->kode_akun;
            }
        }

        $kodeAsli = $kodeAkun;
        // Merubah titik menjadi
        foreach ($kodeAkun as $key => $value) {
            $kodeAkun[$key] = str_replace('.', '_', $value);
        }

        // dd();
        $angka  = 0;
        //Input Atau Update Laba Rugi Tahunan
        foreach ($kodeAkun as $key) {
            // dd($kodeAsli[0]);

            $cek = LabaRugi::where('periode', $request->year)->where('kode_akun', $kodeAsli[$angka])->where('bulan', $request->month)->first();

            if ($cek == null) {
                LabaRugi::create([
                    'kode_akun' =>  $kodeAsli[$angka],
                    'periode' => $request->year,
                    'bulan' => $request->month,
                    'nominal' => $request->{$key},

                ]);
            } else {
                $update = LabaRugi::where('periode', $request->year)->where('kode_akun', $kodeAsli[$angka])->where('bulan', $request->month)->first();
                $update->update([
                    'nominal' => $request->{$key}
                ]);
            }
            $angka++;
        }


        return redirect('/laba-rugi');
    }

    public function tambah(Request $request)
    {
        // dd(Neraca::all());
        $data = LabaRugi::create($request->all());
        $data->save();
        return redirect('/laba-rugi');
    }
}

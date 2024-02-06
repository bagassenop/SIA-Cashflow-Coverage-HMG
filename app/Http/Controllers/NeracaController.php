<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Neraca;
use Illuminate\Http\Request;

class NeracaController extends Controller
{
    public function index()
    {
        $data_akunnr = Akun::all();
        $dataNeraca = Neraca::all();
        $test   = $dataNeraca->first();
        $year = null;
        $month = null;
        // dd($dataNeraca->akun);
        return view('finance.neraca', [
            'akun' => $data_akunnr,
        ], compact('data_akunnr', 'dataNeraca', 'year', 'month'));
    }

    public function indexAfterFilter(Request $request)
    {
        // dd($request);
        $data_akunnr = Akun::all();
        $dataNeraca = Neraca::all();
        // $test   = $dataNeraca->first(); //Mengambilk neraca yang pertama
        $year = $request->periode;
        $month = $request->month;
        // dd($dataNeraca->akun);
        return view('finance.neraca', [
            'akun' => $data_akunnr,
        ], compact('data_akunnr', 'dataNeraca', 'year', 'month'));
    }

    public function submit(Request $request)
    {
        $neraca = ['Aktiva Lancar', 'Aktiva Tetap', 'Nilai Buku Aktiva Tetap', 'Kewajiban Lancar', 'Kewajiban Jangka Panjang', 'Modal']; // Memanggil Akun Laba Rugi
        $jumlahneraca = count($neraca); // Menghitung Jumlah Akun Laba Rugi
        // dd( $jumlahneraca);

        //Memanggil Kode Akun
        for ($i = 0; $i < $jumlahneraca; $i++) {
            $akunneraca = Akun::where('keterangan_akun', $neraca[$i])->get();
            foreach ($akunneraca as $key) {
                $kodeAkun[] =  $key->kode_akun;
            }
        }

        $kodeAsli = $kodeAkun;
        // Merubah titik menjadi _
        foreach ($kodeAkun as $key => $value) {
            $kodeAkun[$key] = str_replace('.', '_', $value);
        }

        // dd();
        $angka  = 0;
        //Input Atau Update Laba Rugi Tahunan

        // dd($kodeAkun);
        foreach ($kodeAkun as $key) {
            // dd($kodeAsli[0], $request, $request->{$key});

            $cek = Neraca::where('periode', $request->year)->where('kode_akun', $kodeAsli[$angka])->where('bulan', $request->month)->first();
            // dd($cek);
            if ($cek == null) {
                Neraca::create([
                    'kode_akun' =>  $kodeAsli[$angka],
                    'periode' => $request->year,
                    'bulan' => $request->month,
                    'nominal' => $request->{$key}
                ]);
            } else {
                $update = Neraca::where('periode', $request->year)->where('kode_akun', $kodeAsli[$angka])->where('bulan', $request->month)->first();
                $update->update([
                    'nominal' => $request->{$key}
                ]);
            }
            $angka++;
        }


        return redirect('/neraca');
    }
    public function tambah(Request $request)
    {
        // dd(Neraca::all());
        $data = Neraca::create($request->all());
        $data->save();
        return redirect('/neraca');
    }
}

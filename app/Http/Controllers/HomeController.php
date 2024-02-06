<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use App\Models\LabaRugi;
use App\Models\Neraca;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function loginPage()
    {
        return view('authen.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }

    public function liquiditas()
    {
        $year = null;
        return view('konten.liquiditas', compact('year'));
    }

    public function filterLiquiditas(Request $request)
    {
        $dataNeraca = Neraca::where('periode', $request->year)->get();
        $dataLabarugi = LabaRugi::where('periode', $request->year)->first();
        $kas = $dataNeraca->where('kode_akun', '1-1100.000')->first();
        $bank = $dataNeraca->where('kode_akun', '1-1200.000')->first();

        //Kewajiban Lancar
        $hutangDagang = $dataNeraca->where('kode_akun', '2-1100.000')->first();
        $hutangKomisiP = $dataNeraca->where('kode_akun', '2-1200.000')->first();
        $hutangLainLain = $dataNeraca->where('kode_akun', '2-1300.000')->first();
        $hutangBankJangkaPendek = $dataNeraca->where('kode_akun', '2-1400.000')->first();
        $hutangPajak = $dataNeraca->where('kode_akun', '2-1500.000')->first();
        $LiabilitasPembiayaanKonsumen = $dataNeraca->where('kode_akun', '2-1600.000')->first();
        $hutangMesin = $dataNeraca->where('kode_akun', '2-1700.000')->first();
        $uangMukaPenjualan = $dataNeraca->where('kode_akun', '2-1800.000')->first();
        $biayaYangMasihHarusDibayar = $dataNeraca->where('kode_akun', '2-1900.000')->first();

        // dd($hutangDagang, $hutangKomisiP, $hutangLainLain, $hutangBankJangkaPendek, $hutangPajak, $LiabilitasPembiayaanKonsumen, $hutangMesin, $uangMukaPenjualan, $biayaYangMasihHarusDibayar);
        $totalKewajibanLancar = $hutangDagang->nominal + $hutangKomisiP->nominal + $hutangLainLain->nominal + $hutangBankJangkaPendek->nominal + $hutangPajak->nominal + $LiabilitasPembiayaanKonsumen->nominal + $hutangMesin->nomimal + $uangMukaPenjualan->nomimal +  $biayaYangMasihHarusDibayar->nominal;
        // dd($totalKewajibanLancar, $kas->nominal, $bank->nominal,($kas->nominal + $bank->nominal), 7592136462 / 93853422394);
        $kasDanSetaraKas = $kas->nominal + $bank->nominal;
        $liqiuiditas =  $kasDanSetaraKas / $totalKewajibanLancar;
        // dd($liqiuiditas);
        $year = $request->year;
        return view('konten.liquiditas', compact('dataNeraca', 'dataLabarugi', 'year', 'kas', 'bank', 'totalKewajibanLancar', 'liqiuiditas'));
    }

    public function cashflowcov()
    {
        $year = null;
        return view('konten.cashflowcoverage', compact('year'));
    }

    public function filtercashflowcov(Request $request)
    {
        $dataNeraca = Neraca::where('periode', $request->year)->get();
        $dataLabarugi = LabaRugi::where('periode', $request->year)->first();
        $kas = $dataNeraca->where('kode_akun', '1-1100.000')->first();
        $bank = $dataNeraca->where('kode_akun', '1-1200.000')->first();
        // dd($request);
        //Kewajiban Lancar
        $hutangDagang = $dataNeraca->where('kode_akun', '2-1100.000')->first();
        $hutangKomisiP = $dataNeraca->where('kode_akun', '2-1200.000')->first();
        $hutangLainLain = $dataNeraca->where('kode_akun', '2-1300.000')->first();
        $hutangBankJangkaPendek = $dataNeraca->where('kode_akun', '2-1400.000')->first();
        $hutangPajak = $dataNeraca->where('kode_akun', '2-1500.000')->first();
        $LiabilitasPembiayaanKonsumen = $dataNeraca->where('kode_akun', '2-1600.000')->first();
        $hutangMesin = $dataNeraca->where('kode_akun', '2-1700.000')->first();
        $uangMukaPenjualan = $dataNeraca->where('kode_akun', '2-1800.000')->first();
        $biayaYangMasihHarusDibayar = $dataNeraca->where('kode_akun', '2-1900.000')->first();
        // dd($hutangDagang, $hutangKomisiP, $hutangLainLain, $hutangBankJangkaPendek, $hutangPajak, $LiabilitasPembiayaanKonsumen, $hutangMesin, $uangMukaPenjualan, $biayaYangMasihHarusDibayar);
        $totalKewajibanLancar = $hutangDagang->nominal + $hutangKomisiP->nominal + $hutangLainLain->nominal + $hutangBankJangkaPendek->nominal + $hutangPajak->nominal + $LiabilitasPembiayaanKonsumen->nominal + $hutangMesin->nomimal + $uangMukaPenjualan->nomimal +  $biayaYangMasihHarusDibayar->nominal;

        //Kewajiban Jangka Panjang
        $hutangSaham = $dataNeraca->where('kode_akun', '2-2000.000')->first();
        $hutangBankJangkaPanjang = $dataNeraca->where('kode_akun', '2-2100.000')->first();
        $LiabilitasPembiayaanKonsumenJangkaPanjang = $dataNeraca->where('kode_akun', '2-2200.000')->first();
        $liabilitasImbalanKerja = $dataNeraca->where('kode_akun', '2-2300.000')->first();
        // dd($hutangSaham,  $hutangBankJangkaPanjang, $LiabilitasPembiayaanKonsumenJangkaPanjang, $liabilitasImbalanKerja);
        if ($hutangSaham === null) {
            $hutangSaham = 0;
        } else {
            $hutangSaham = $hutangSaham->nominal;
        }
        // dd($hutangSaham);
        if ($hutangBankJangkaPanjang === null) {
            $hutangBankJangkaPanjang = 0;
        } else {
            $hutangBankJangkaPanjang =  $hutangBankJangkaPanjang->nominal;
        }

        if ($LiabilitasPembiayaanKonsumenJangkaPanjang === null) {
            $LiabilitasPembiayaanKonsumenJangkaPanjang = 0;
        } else {
            $LiabilitasPembiayaanKonsumenJangkaPanjang =  $LiabilitasPembiayaanKonsumenJangkaPanjang->nominal;
        }

        if ($liabilitasImbalanKerja === null) {
            $liabilitasImbalanKerja = 0;
        } else {
            $liabilitasImbalanKerja =  $liabilitasImbalanKerja->nominal;
        }
        $totalKewajibanJangkaPanjang = $hutangSaham + $hutangBankJangkaPanjang + $LiabilitasPembiayaanKonsumenJangkaPanjang + $liabilitasImbalanKerja;
        $cashflow = ($kas->nominal + $bank->nominal) / ($totalKewajibanLancar + $totalKewajibanJangkaPanjang);
        $year = $request->year;
        return view('konten.cashflowcoverage', compact('dataNeraca', 'dataLabarugi', 'year', 'kas', 'bank', 'totalKewajibanLancar', 'totalKewajibanJangkaPanjang', 'cashflow'));
    }

    public function perpupiutang()
    {
        $year = null;
        return view('konten.perputaranpiutang', compact('year'));
    }

    public function filterPerpupiutang(Request $request)
    {
        $dataNeraca = Neraca::where('periode', $request->year)->get();
        $dataLabarugi = LabaRugi::where('periode', $request->year)->first();

        $PenjualanBarangPPN = $dataLabarugi->where('kode_akun', '4-1100.000')->first();
        $JasaMakloonPPN = $dataLabarugi->where('kode_akun', '4-2100.000')->first();
        $JasaServisPPN = $dataLabarugi->where('kode_akun', '4-3100.000')->first();
        $PenjualanBahanBakuBahaPenolongPPN = $dataLabarugi->where('kode_akun', '4-4100.000')->first();

        $piutangDagang = $dataNeraca->where('kode_akun', '1-1300.000')->first();
        // dd($piutangDagang);
        $totalPendapatan = $PenjualanBarangPPN->nominal + $JasaMakloonPPN->nominal + $JasaServisPPN->nominal + $PenjualanBahanBakuBahaPenolongPPN->nominal;
        $perputaranPiutang = $totalPendapatan / $piutangDagang->nominal;
        $year = $request->year;
        return view('konten.perputaranpiutang', compact('dataNeraca', 'dataLabarugi', 'year', 'totalPendapatan', 'piutangDagang', 'perputaranPiutang'));
    }
    public function dashboard()
    {
        // $data_akun = Akun::paginate(10);

        $desember2022 = Neraca::where('periode', 2022) // Surplus Desember 2022
            ->where('bulan', 'Maret')
            ->whereNotIn('kode_akun', ['1-1100.000', '1-1200.000', '3-1500.000', '3-1600.000', '3-1700.000'])
            ->sum('nominal');
        $november2022 = Neraca::where('periode', 2022) // Surplus November 2022
            ->where('bulan', 'Februari')
            ->whereNotIn('kode_akun', ['1-1100.000', '1-1200.000', '3-1500.000', '3-1600.000', '3-1700.000'])
            ->sum('nominal');
        $labarugi2022 = LabaRugi::where('periode', 2022)->where('bulan', 'Maret')->first();
        $nominalLaba2022 =  $labarugi2022->nominal;
        $totalSurplusDefisit2022 = $desember2022 + $nominalLaba2022;
        // dd($totalSurplusDefisit2022);
        return view('dashboard', compact('totalSurplusDefisit2022'));
    }
}

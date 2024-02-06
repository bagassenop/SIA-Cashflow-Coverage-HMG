@extends('index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    @if ($year && $month == null)
                        <h1>Laporan Arus Kas</h1>
                    @else
                        <h1>Laporan Arus Kas {{ $year }} {{ $month }}</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="class container-fluid">
        <form action="/report-arus-kas/monthly/filter" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card body">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Periode Tahun</label>
                                    <select class="form-select form-select-lg w-100 mb-3" aria-label="Large select example"
                                        name="year">
                                        <option selected>Pilih Periode</option>
                                        {{-- <option value="2018">2018</option> --}}
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Periode Bulan</label>
                                    <select class="form-select form-select-lg w-100 mb-3" aria-label="Large select example"
                                        name="month">
                                        <option selected>Pilih Periode</option>
                                        {{-- <option value="2018">2018</option> --}}
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary">Show</button>
                                    {{-- <a href="#" class="btn btn-info">Export PDF</a> --}}
                                </div>
                                <div class="col-auto">
                                    <a href="/exportpdf" class="btn btn-info">Export PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @if ($year != null)
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="thead thead-primary">
                            <tr>
                                <th scope="col" style="background-color: #0a58f5">Arus Kas Aktifitas Operasi</th>
                                <th scope="col" style="background-color: #0a58f5"></th>
                                <th scope="col" style="background-color: #0a58f5"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">LABA TAHUN BERJALAN</th>
                                <td></td>

                                <td>{{ formatRupiah(($dataLabarugi->nominal), true) }}</td>
                            </tr>
                            <tr>
                                {{-- <th scope="row" style="font-weight: normal;">DITAMBAH :</th> --}}
                                <th scope="row">DITAMBAH :</th>
                                <td></td>
                                <td></td>
                            </tr>

                            @php
                                $penyusutanBangunan = $dataNeracaNow->where('kode_akun', '1-3100.000')->first();
                                $penyusutanMesin = $dataNeracaNow->where('kode_akun', '1-3200.000')->first();
                                $penyusutanKendaraan = $dataNeracaNow->where('kode_akun', '1-3300.000')->first();
                                $penyusutaninventaris = $dataNeracaNow->where('kode_akun', '1-3400.000')->first();
                                //   dd($penyusutanKendaraan->akun->nama_akun);
                                $penyusutanBangunanThen = $dataNeracaThen->where('kode_akun', '1-3100.000')->first();
                                //   dd($penyusutanBangunanThen);
                                $penyusutanMesinThen = $dataNeracaThen->where('kode_akun', '1-3200.000')->first();
                                $penyusutanKendaraanThen = $dataNeracaThen->where('kode_akun', '1-3300.000')->first();
                                $penyusutaninventarisThen = $dataNeracaThen->where('kode_akun', '1-3400.000')->first();
                                // dd($penyusutanBangunan, $penyusutanBangunanThen);
                                $hasilLabaBersih = abs($penyusutanBangunan->nominal - $penyusutanBangunanThen->nominal) + abs($penyusutanMesin->nominal - $penyusutanMesinThen->nominal) + abs($penyusutanKendaraan->nominal - $penyusutanKendaraanThen->nominal) + abs($penyusutaninventaris->nominal - $penyusutaninventarisThen->nominal) + $dataLabarugi->nominal;
                            @endphp
                            <tr>
                                <th scope="row" style="font-weight: normal;">{{ $penyusutanBangunan->akun->nama_akun }}</th>

                                <td>{{ formatRupiah(abs($penyusutanBangunan->nominal - $penyusutanBangunanThen->nominal), true) }}
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row" style="font-weight: normal;">{{ $penyusutanMesin->akun->nama_akun }}</th>

                                <td>{{ formatRupiah(abs($penyusutanMesin->nominal - $penyusutanMesinThen->nominal), true) }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row" style="font-weight: normal;">{{ $penyusutanKendaraan->akun->nama_akun }}</th>

                                <td>{{ formatRupiah(abs($penyusutanKendaraan->nominal - $penyusutanKendaraanThen->nominal), true) }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row" style="font-weight: normal;">{{ $penyusutaninventaris->akun->nama_akun }}</th>

                                <td>{{ formatRupiah(abs($penyusutaninventaris->nominal - $penyusutaninventarisThen->nominal), true) }}</td>
                                <td></td>
                            </tr>
                            {{-- <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                            </tr> --}}

                            <tr>
                                <th scope="row">PENYUSUTAN</th>
                                <td></td>
                                <td>{{ formatRupiah(abs($penyusutanBangunan->nominal - $penyusutanBangunanThen->nominal) + abs($penyusutanMesin->nominal - $penyusutanMesinThen->nominal) + abs($penyusutanKendaraan->nominal - $penyusutanKendaraanThen->nominal) + abs($penyusutaninventaris->nominal - $penyusutaninventarisThen->nominal), true) }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">LABA BERSIH</th>
                                <td></td>
                                <td>{{ formatRupiah(($hasilLabaBersih), true) }}
                                </td>
                            </tr>
                        </tbody>
                        @php
                            $kasNow = $dataNeracaNow->where('kode_akun', '1-1100.000')->first();
                            $bankNow = $dataNeracaNow->where('kode_akun', '1-1200.000')->first();
                            $piutangDagangNow = $dataNeracaNow->where('kode_akun', '1-1300.000')->first();
                            $piutangKaryawanNow = $dataNeracaNow->where('kode_akun', '1-1400.000')->first();
                            $piutangLainNow = $dataNeracaNow->where('kode_akun', '1-1500.000')->first();
                            $piutangSahamNow = $dataNeracaNow->where('kode_akun', '1-1600.000')->first();
                            $piutangBarangNow = $dataNeracaNow->where('kode_akun', '1-1700.000')->first();
                            $uangMukaNow = $dataNeracaNow->where('kode_akun', '1-1800.000')->first();
                            $pajakDibayarDimukaNow = $dataNeracaNow->where('kode_akun', '1-1900.000')->first();

                            $hutangDagangNow = $dataNeracaNow->where('kode_akun', '2-1100.000')->first();
                            $hutangKomisiPenjualanNow = $dataNeracaNow->where('kode_akun', '2-1200.000')->first();
                            $hutanglainNow = $dataNeracaNow->where('kode_akun', '2-1300.000')->first();
                            $hutangBankJPendekNow = $dataNeracaNow->where('kode_akun', '2-1400.000')->first();
                            $hutangPajakNow = $dataNeracaNow->where('kode_akun', '2-1500.000')->first();
                            $LiabititasPembiayaanNow = $dataNeracaNow->where('kode_akun', '2-1600.000')->first();
                            $hutangMesinNow = $dataNeracaNow->where('kode_akun', '2-1700.000')->first();
                            $uangMukaPenjualanNow = $dataNeracaNow->where('kode_akun', '2-1800.000')->first();
                            $biayaYangMasihHarusDibayarNow = $dataNeracaNow->where('kode_akun', '2-1900.000')->first();

                            $kasThen = $dataNeracaThen->where('kode_akun', '1-1100.000')->first();
                            $bankThen = $dataNeracaThen->where('kode_akun', '1-1200.000')->first();
                            $piutangDagangThen = $dataNeracaThen->where('kode_akun', '1-1300.000')->first();
                            $piutangKaryawanThen = $dataNeracaThen->where('kode_akun', '1-1400.000')->first();
                            $piutangLainThen = $dataNeracaThen->where('kode_akun', '1-1500.000')->first();
                            $piutangSahamThen = $dataNeracaThen->where('kode_akun', '1-1600.000')->first();
                            $piutangBarangThen = $dataNeracaThen->where('kode_akun', '1-1700.000')->first();
                            $uangMukaThen = $dataNeracaThen->where('kode_akun', '1-1800.000')->first();
                            $pajakDibayarDimukaThen = $dataNeracaThen->where('kode_akun', '1-1900.000')->first();

                            $hutangDagangThen = $dataNeracaThen->where('kode_akun', '2-1100.000')->first();
                            $hutangKomisiPenjualanThen = $dataNeracaThen->where('kode_akun', '2-1200.000')->first();
                            $hutanglainThen = $dataNeracaThen->where('kode_akun', '2-1300.000')->first();
                            $hutangBankJPendekThen = $dataNeracaThen->where('kode_akun', '2-1400.000')->first();
                            $hutangPajakThen = $dataNeracaThen->where('kode_akun', '2-1500.000')->first();
                            $LiabititasPembiayaanThen = $dataNeracaThen->where('kode_akun', '2-1600.000')->first();
                            $hutangMesinThen = $dataNeracaThen->where('kode_akun', '2-1700.000')->first();
                            $uangMukaPenjualanThen = $dataNeracaThen->where('kode_akun', '2-1800.000')->first();
                            $biayaYangMasihHarusDibayarThen = $dataNeracaThen->where('kode_akun', '2-1900.000')->first();

                            // dd($biayaYangMasihHarusDibayarNow->nominal, $biayaYangMasihHarusDibayarThen->nominal);
                            $nominalkas = $kasNow->nominal - $kasThen->nominal;
                            $nominalbank = $bankNow->nominal - $bankThen->nominal;
                            $nominalSaldoKasNow = $kasNow->nominal + $bankNow->nominal;
                            $nominalSaldoKasThen = $kasThen->nominal + $bankThen->nominal;
                            $nominalpiutangDagang = $piutangDagangNow->nominal - $piutangDagangThen->nominal;
                            $nominalpiutangKaryawan = $piutangKaryawanNow->nominal - $piutangKaryawanThen->nominal;
                            $nominalpiutangLain = $piutangLainNow->nominal - $piutangLainThen->nominal;
                            $nominalpiutangSaham = $piutangSahamNow->nominal - $piutangSahamThen->nominal;
                            $nominalpiutangBarang = $piutangBarangNow->nominal - $piutangBarangThen->nominal;
                            $nominaluangMuka = $uangMukaNow->nominal - $uangMukaThen->nominal;
                            $nominalpajakDibayarDimuka = $pajakDibayarDimukaNow->nominal - $pajakDibayarDimukaThen->nominal;
                            $nominalhutangDagang = $hutangDagangNow->nominal - $hutangDagangThen->nominal;
                            $nominalhutangKomisiPenjualan = $hutangKomisiPenjualanNow->nominal - $hutangKomisiPenjualanThen->nominal;
                            $nominalhutanglain = $hutanglainNow->nominal - $hutanglainThen->nominal;
                            $nominalhutangBankJPendek = $hutangBankJPendekNow->nominal - $hutangBankJPendekThen->nominal;
                            $nominalhutangPajak = $hutangPajakNow->nominal - $hutangPajakThen->nominal;
                            $nominalLiabititasPembiayaan = $LiabititasPembiayaanNow->nominal - $LiabititasPembiayaanThen->nominal;
                            $nominalhutangMesin = $hutangMesinNow->nominal - $hutangMesinThen->nominal;
                            $nominaluangMukaPenjualan = $uangMukaPenjualanNow->nominal - $uangMukaPenjualanThen->nominal;
                            $nominalbiayaYangMasihHarusDibayar = $biayaYangMasihHarusDibayarNow->nominal - $biayaYangMasihHarusDibayarThen->nominal;
                            $nominalTotalOperasi = $hasilLabaBersih + $nominalkas + $nominalbank + $nominalpiutangDagang + $nominalpiutangKaryawan + $nominalpiutangLain + $nominalpiutangSaham + $nominalpiutangBarang + $nominaluangMuka + $nominalpajakDibayarDimuka + $nominalhutangDagang + $nominalhutangKomisiPenjualan + $nominalhutanglain + $nominalhutangBankJPendek + $nominalhutangPajak + $nominalLiabititasPembiayaan + $nominalhutangMesin + $nominaluangMukaPenjualan + $nominalbiayaYangMasihHarusDibayar;
                        @endphp
                        <thead class="thead thead-primary">
                            <tr>
                                <th scope="col" style="background-color: #0a58f5">Arus Kas Masuk dari Aktifitas Operasi
                                </th>
                                <th scope="col" style="background-color: #0a58f5"></th>
                                <th scope="col" style="background-color: #0a58f5"></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @if ($nominalkas > 0)
                                <tr>
                                    <th scope="row">{{ $kasNow->akun->nama_akun }}</th>
                                    <td>{{ $nominalkas }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif --}}
                            {{-- @if ($nominalbank > 0)
                                <tr>
                                    <th scope="row">{{ $bankNow->akun->nama_akun }}</th>
                                    <td>{{ $nominalbank }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif --}}
                            @if ($nominalpiutangDagang > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $piutangDagangNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalpiutangDagang), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalpiutangKaryawan > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $piutangKaryawanNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalpiutangKaryawan), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalpiutangLain > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $piutangLainNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalpiutangLain), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalpiutangSaham > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $piutangSahamNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalpiutangSaham), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalpiutangBarang > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $piutangBarangNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalpiutangBarang), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominaluangMuka > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $uangMukaNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominaluangMuka), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalpajakDibayarDimuka > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $pajakDibayarDimukaNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalpajakDibayarDimuka), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalhutangDagang > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $hutangDagangNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalhutangDagang), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalhutangKomisiPenjualan > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $hutangKomisiPenjualanNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalhutangKomisiPenjualan), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalhutanglain > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $hutanglainNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalhutanglain), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalhutangBankJPendek > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $hutangBankJPendekNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalhutangBankJPendek), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalhutangPajak > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $hutangPajakNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalhutangPajak), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalLiabititasPembiayaan > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $LiabititasPembiayaanNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalLiabititasPembiayaan), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalhutangMesin > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $hutangMesinNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalhutangMesin), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominaluangMukaPenjualan > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $uangMukaPenjualanNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominaluangMukaPenjualan), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalbiayaYangMasihHarusDibayar > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $biayaYangMasihHarusDibayarNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalbiayaYangMasihHarusDibayar), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                        </tbody>

                        <thead class="thead thead-primary">
                            <tr>
                                <th scope="col" style="background-color: #0a58f5">Arus Kas Keluar dari Aktifitas Operasi
                                </th>
                                <th scope="col" style="background-color: #0a58f5"></th>
                                <th scope="col" style="background-color: #0a58f5"></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @if ($nominalkas < 0)
                                <tr>
                                    <th scope="row">{{ $kasNow->akun->nama_akun }}</th>
                                    <td>{{ $nominalkas }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif --}}
                            {{-- @if ($nominalbank < 0)
                                <tr>
                                    <th scope="row">{{ $bankNow->akun->nama_akun }}</th>
                                    <td>{{ $nominalbank }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif --}}
                            @if ($nominalpiutangDagang < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $bankNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalpiutangDagang), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalpiutangKaryawan < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $piutangKaryawanNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalpiutangKaryawan), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalpiutangLain < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $piutangLainNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalpiutangLain), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalpiutangSaham < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $piutangSahamNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalpiutangSaham), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalpiutangBarang < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $piutangBarangNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalpiutangBarang), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominaluangMuka < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $uangMukaNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominaluangMuka), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalpajakDibayarDimuka < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $pajakDibayarDimukaNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalpajakDibayarDimuka), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalhutangDagang < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $hutangDagangNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalhutangDagang), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalhutangKomisiPenjualan < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $hutangKomisiPenjualanNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalhutangKomisiPenjualan), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalhutanglain < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $hutanglainNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalhutanglain), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalhutangBankJPendek < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $hutangBankJPendekNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalhutangBankJPendek), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalhutangPajak < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $hutangPajakNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalhutangPajak), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalLiabititasPembiayaan < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $LiabititasPembiayaanNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalLiabititasPembiayaan), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalhutangMesin < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $hutangMesinNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalhutangMesin), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominaluangMukaPenjualan < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $uangMukaPenjualanNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominaluangMukaPenjualan), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalbiayaYangMasihHarusDibayar < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $biayaYangMasihHarusDibayarNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalbiayaYangMasihHarusDibayar), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            <tr>
                                <th scope='row' style="background-color: #0a58f5">Total Arus Kas dari Aktifitas Operasi
                                </th>
                                <td></td>
                                <td>{{ formatRupiah(($nominalTotalOperasi), true) }}</td>
                            </tr>
                        </tbody>

                        <thead class="thead thead-primary">
                            <tr>
                                <th scope="col" style="background-color: #ebaa13">Arus Kas Aktifitas Investasi</th>
                                <th scope="col" style="background-color: #ebaa13"></th>
                                <th scope="col" style="background-color: #ebaa13"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $tanahNow = $dataNeracaNow->where('kode_akun', '1-2100.000')->first();
                                $bangunanNow = $dataNeracaNow->where('kode_akun', '1-2200.000')->first();
                                $mesinNow = $dataNeracaNow->where('kode_akun', '1-2300.000')->first();
                                $kendaraanNow = $dataNeracaNow->where('kode_akun', '1-2400.000')->first();
                                $inventarisNow = $dataNeracaNow->where('kode_akun', '1-2500.000')->first();

                                $tanahThen = $dataNeracaThen->where('kode_akun', '1-2100.000')->first();
                                $bangunanThen = $dataNeracaThen->where('kode_akun', '1-2200.000')->first();
                                $mesinThen = $dataNeracaThen->where('kode_akun', '1-2300.000')->first();
                                $kendaraanThen = $dataNeracaThen->where('kode_akun', '1-2400.000')->first();
                                $inventarisThen = $dataNeracaThen->where('kode_akun', '1-2500.000')->first();
                                // $inventarisThen = $dataNeracaThen->where('kode_akun', '1-2500.000')->first();
                                // dd($bangunanNow->nominal, $bangunanThen->nominal);
                                $nominaltanah = ($tanahNow->nominal - $tanahThen->nominal) * -1;
                                $nominalbangunan = ($bangunanNow->nominal - $bangunanThen->nominal) * -1;
                                $nominalMesin = ($mesinNow->nominal - $mesinThen->nominal) * -1;
                                $nominalkendaraan = ($kendaraanNow->nominal - $kendaraanThen->nominal) * -1;
                                $nominalinventaris = ($inventarisNow->nominal - $inventarisThen->nominal) * -1;
                                $nominalTotalInvestasi = $nominaltanah + $nominalbangunan + $nominalMesin + $nominalkendaraan + $nominalinventaris;
                            @endphp
                            <tr>
                                <th scope="row" style="background-color: #ebaa13">Pembelian Aset Tetap</th>
                                <td></td>
                                <td></td>
                            </tr>
                            @if ($nominaltanah < 0)
                            <tr>
                                <th scope="row" style="font-weight: normal;">{{ $tanahNow->akun->nama_akun }}</th>
                                <td>{{ formatRupiah(($nominaltanah), true) }}</td>
                                <td></td>
                            </tr>
                            @else
                            @endif
                            @if ($nominalbangunan < 0)
                            <tr>
                                <th scope="row" style="font-weight: normal;">{{ $bangunanNow->akun->nama_akun }}</th>
                                <td>{{ formatRupiah(($nominalbangunan), true) }}</td>
                                <td></td>
                            </tr>
                            @else
                            @endif
                            @if ($nominalMesin < 0)
                            <tr>
                                <th scope="row" style="font-weight: normal;">{{ $mesinNow->akun->nama_akun }}</th>
                                <td>{{ formatRupiah(($nominalMesin), true) }}</td>
                                <td></td>
                            </tr>
                            @else
                            @endif
                            @if ($nominalkendaraan < 0)
                            <tr>
                                <th scope="row" style="font-weight: normal;">{{ $kendaraanNow->akun->nama_akun }}</th>
                                <td>{{ formatRupiah(($nominalkendaraan), true) }}</td>
                                <td></td>
                            </tr>
                            @else
                            @endif
                            @if ($nominalinventaris < 0)
                            <tr>
                                <th scope="row" style="font-weight: normal;">{{ $inventarisNow->akun->nama_akun }}</th>
                                <td>{{ formatRupiah(($nominalinventaris), true) }}</td>
                                <td></td>
                            </tr>
                            @else
                            @endif
                            <tr>
                                <th scope="row" style="background-color: #ebaa13">Penjualan Aset Tetap</th>
                                <td></td>
                                <td></td>
                            </tr>
                            @if ($nominaltanah > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $tanahNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominaltanah), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalbangunan > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $bangunanNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalbangunan), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            <tr>
                                <th scope="row" style="background-color: #ebaa13">Total Arus Kas dari Aktifitas
                                    Investasi</th>
                                <td></td>
                                <td> {{ formatRupiah(($nominalTotalInvestasi), true) }}
                                </td>
                            </tr>
                        </tbody>
                        @php
                            // dd($HutangKepadaPemegangSahamNow->nominal);
                            $HutangKepadaPemegangSahamNow = $dataNeracaNow->where('kode_akun', '2-2000.000')->first();
                            $HutangBankJangkaPanjangNow = $dataNeracaNow->where('kode_akun', '2-2100.000')->first();
                            $LiabilitasPembiayaanKonsumenJangkaPanjangNow = $dataNeracaNow->where('kode_akun', '2-2200.000')->first();
                            $LiabilitasImbalanKerjaNow = $dataNeracaNow->where('kode_akun', '2-2300.000')->first();

                            $HutangKepadaPemegangSahamThen = $dataNeracaThen->where('kode_akun', '2-2000.000')->first();
                            $HutangBankJangkaPanjangThen = $dataNeracaThen->where('kode_akun', '2-2100.000')->first();
                            $LiabilitasPembiayaanKonsumenJangkaPanjangThen = $dataNeracaThen->where('kode_akun', '2-2200.000')->first();
                            $LiabilitasImbalanKerjaThen = $dataNeracaThen->where('kode_akun', '2-2300.000')->first();

                            $ModalDisetorNow = $dataNeracaNow->where('kode_akun', '3-1100.000')->first();
                            $UangMukaSetoranModalNow = $dataNeracaNow->where('kode_akun', '3-1200.000')->first();
                            $SurplusRevaluasiTanahNow = $dataNeracaNow->where('kode_akun', '3-1300.000')->first();
                            $TaxAmnestyNow = $dataNeracaNow->where('kode_akun', '3-1400.000')->first();

                            $ModalDisetorThen = $dataNeracaThen->where('kode_akun', '3-1100.000')->first();
                            $UangMukaSetoranModalThen = $dataNeracaThen->where('kode_akun', '3-1200.000')->first();
                            $SurplusRevaluasiTanahThen = $dataNeracaThen->where('kode_akun', '3-1300.000')->first();
                            $TaxAmnestyThen = $dataNeracaThen->where('kode_akun', '3-1400.000')->first();
                            // dd($HutangKepadaPemegangSahamNow, $UangMukaSetoranModalThen, $SurplusRevaluasiTanahThen, $TaxAmnestyThen,  $ModalDisetorNow,  $UangMukaSetoranModalNow,  $SurplusRevaluasiTanahNow, $TaxAmnestyNow);

                            $nominalHutangKepadaPemegangSaham = $HutangKepadaPemegangSahamNow->nominal - $HutangKepadaPemegangSahamThen->nominal;
                            $nominalHutangBankJangkaPanjang = $HutangBankJangkaPanjangNow->nominal - $HutangBankJangkaPanjangThen->nominal;
                            $nominalLiabilitasPembiayaanKonsumenJangkaPanjang = $LiabilitasPembiayaanKonsumenJangkaPanjangNow->nominal - $LiabilitasPembiayaanKonsumenJangkaPanjangThen->nominal;
                            $nominalLiabilitasImbalanKerja = $LiabilitasImbalanKerjaNow->nominal - $LiabilitasImbalanKerjaThen->nominal;
                            // dd($HutangKepadaPemegangSahamNow->nominal);
                            $nominalModalDisetor = $ModalDisetorNow->nominal - $ModalDisetorThen->nominal;
                            $nominalUangMukaSetoranModal = $UangMukaSetoranModalNow->nominal - $UangMukaSetoranModalThen->nominal;
                            $nominalSurplusRevaluasiTanah = $SurplusRevaluasiTanahNow->nominal - $SurplusRevaluasiTanahThen->nominal;
                            $nominalTaxAmnesty = $TaxAmnestyNow->nominal - $TaxAmnestyThen->nominal;
                            $nominalTotalPendanaan = $nominalHutangKepadaPemegangSaham + $nominalHutangBankJangkaPanjang + $nominalLiabilitasPembiayaanKonsumenJangkaPanjang + $nominalLiabilitasImbalanKerja + $nominalModalDisetor + $nominalUangMukaSetoranModal + $nominalSurplusRevaluasiTanah + $nominalTaxAmnesty;
                        @endphp
                        <thead class="thead thead-primary">
                            <tr>
                                <th scope="col" style="background-color: #54eb13">Arus Kas Aktifitas Pendanaan
                                </th>
                                <th scope="col" style="background-color: #54eb13"></th>
                                <th scope="col" style="background-color: #54eb13"></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <th class="scope row">Hutang Bank Jangka Panjang</th>
                                <td>22258225107</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th class="scope row">Liabilitas Pembiayaan Konsumen Jangka Panjang</th>
                                <td>687525295</td>
                                <td></td>
                            </tr> --}}
                            <tr>
                                <th scope="row" style="background-color: #54eb13">Arus Kas Masuk Aktifitas Pendanaan
                                </th>
                                <td></td>
                                <td></td>
                            </tr>
                            @if ($nominalHutangKepadaPemegangSaham > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $HutangKepadaPemegangSahamNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalHutangKepadaPemegangSaham), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalHutangBankJangkaPanjang > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $HutangBankJangkaPanjangNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalHutangBankJangkaPanjang), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalLiabilitasPembiayaanKonsumenJangkaPanjang > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">
                                        {{ $LiabilitasPembiayaanKonsumenJangkaPanjangNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalLiabilitasPembiayaanKonsumenJangkaPanjang), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalLiabilitasImbalanKerja > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $LiabilitasImbalanKerjaNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalLiabilitasImbalanKerja), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalModalDisetor > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $ModalDisetorNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalModalDisetor), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalSurplusRevaluasiTanah > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $SurplusRevaluasiTanahNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalSurplusRevaluasiTanah), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalTaxAmnesty > 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $TaxAmnestyNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalTaxAmnesty), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            <tr>
                                <th scope="row" style="background-color: #54eb13">Arus Kas Keluar Aktifitas Pendanaan
                                </th>
                                <td></td>
                                <td></td>
                            </tr>
                            @if ($nominalHutangKepadaPemegangSaham < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $HutangKepadaPemegangSahamNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalHutangKepadaPemegangSaham), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalHutangBankJangkaPanjang < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $HutangBankJangkaPanjangNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalHutangBankJangkaPanjang), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalLiabilitasPembiayaanKonsumenJangkaPanjang < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">
                                        {{ $LiabilitasPembiayaanKonsumenJangkaPanjangNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalLiabilitasPembiayaanKonsumenJangkaPanjang), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalLiabilitasImbalanKerja < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $LiabilitasImbalanKerjaNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalLiabilitasImbalanKerja), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalModalDisetor < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $ModalDisetorNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalModalDisetor), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalSurplusRevaluasiTanah < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $SurplusRevaluasiTanahNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalSurplusRevaluasiTanah), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalTaxAmnesty < 0)
                                <tr>
                                    <th scope="row" style="font-weight: normal;">{{ $TaxAmnestyNow->akun->nama_akun }}</th>
                                    <td>{{ formatRupiah(($nominalTaxAmnesty), true) }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            <tr>
                                <th scope="row" style="background-color: #54eb13">Total Arus Kas dari Aktifitas
                                    Pendanaan</th>
                                <td></td>
                                <td>{{ formatRupiah(($nominalTotalPendanaan), true) }}</td>
                            </tr>
                        </tbody>

                        <thead class="thead thead-primary">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">Surplus / Defisit Arus Kas {{ $month }} {{ $year }}
                                </th>
                                <td></td>
                                <td>{{ formatRupiah(($nominalTotalPendanaan + $nominalTotalInvestasi + $nominalTotalOperasi), true) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Saldo Kas {{ $then }} {{ $year }}</th>
                                <td></td>
                                <td>{{ formatRupiah(($nominalSaldoKasThen), true) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Saldo Akhir Kas {{ $then }} {{ $year }}</th>
                                <td></td>
                                <td>{{ formatRupiah(($nominalTotalPendanaan + $nominalTotalInvestasi + $nominalTotalOperasi + $nominalSaldoKasThen), true) }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Kroscek Saldo Kas Neraca {{ $then }} {{ $year }}
                                </th>
                                <td></td>
                                <td>{{ formatRupiah(($nominalSaldoKasNow), true) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Different</th>
                                <td></td>
                                <td>{{ formatRupiah(($nominalTotalPendanaan + $nominalTotalInvestasi + $nominalTotalOperasi + $nominalSaldoKasThen) - ($nominalSaldoKasNow), true) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @else
        @endif
    </div>
@endsection

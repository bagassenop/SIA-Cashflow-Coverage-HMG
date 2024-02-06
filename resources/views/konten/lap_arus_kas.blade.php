@extends('index')

@section('content')
<!-- Content Header (Page header) -->
{{-- <div class="content-header"> --}}
    <div class="container-fluid">
      <div class="row">
        <div class="col-6">
        @if ($year == null)
            <h1>Laporan Arus Kas</h1>
        @else
            <h1>Laporan Arus Kas {{ $year }}</h1>
        @endif
        </div>
      </div>
    </div>
  </div>

  <div class="class container-fluid">
        <form action="/report-arus-kas/filter" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card body">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Periode</label>
                                    <select class="form-select form-select-lg w-100 mb-3" aria-label="Large select example" name="year">
                                    <option selected>Pilih Periode</option>
                                    {{-- <option value="2018">2018</option> --}}
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary">Show</button>
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
                                <th scope="col"  style="background-color: #0a58f5">Debet</th>
                                <th scope="col"  style="background-color: #0a58f5">Kredit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">LABA TAHUN BERJALAN</th>
                                <td></td>

                                <td>{{ $dataLabarugi->nominal }}</td>
                            </tr>
                            <tr>
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
                                $penyusutaninventarisThen = $dataNeracaThen->where('kode_akun', '1-3400.000')->first()


                            @endphp
                                <tr>
                                    <th scope="row">{{ $penyusutanBangunan->akun->nama_akun }}</th>

                                    <td>{{ abs($penyusutanBangunan->nominal - $penyusutanBangunanThen->nominal) }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $penyusutanMesin->akun->nama_akun }}</th>

                                    <td>{{ abs($penyusutanMesin->nominal - $penyusutanMesinThen->nominal) }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $penyusutanKendaraan->akun->nama_akun }}</th>

                                    <td>{{ abs($penyusutanKendaraan->nominal - $penyusutanKendaraanThen->nominal) }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $penyusutaninventaris->akun->nama_akun }}</th>

                                    <td>{{ abs($penyusutaninventaris->nominal - $penyusutaninventarisThen->nominal) }}</td>
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
                                <td>{{ abs($penyusutanBangunan->nominal - $penyusutanBangunanThen->nominal) + abs($penyusutanMesin->nominal - $penyusutanMesinThen->nominal) + abs($penyusutanKendaraan->nominal - $penyusutanKendaraanThen->nominal) + abs($penyusutaninventaris->nominal - $penyusutaninventarisThen->nominal)}}</td>
                            </tr>
                            <tr>
                                <th scope="row">LABA BERSIH</th>
                                <td></td>
                                <td>{{ (abs($penyusutanBangunan->nominal - $penyusutanBangunanThen->nominal) + abs($penyusutanMesin->nominal - $penyusutanMesinThen->nominal) + abs($penyusutanKendaraan->nominal - $penyusutanKendaraanThen->nominal) + abs($penyusutaninventaris->nominal - $penyusutaninventarisThen->nominal)) + ($dataLabarugi->nominal) }}</td>
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
                                $nominalkas = ($kasNow->nominal - $kasThen->nominal);
                                $nominalbank = ($bankNow->nominal - $bankThen->nominal);
                                $nominalpiutangDagang = ($piutangDagangNow->nominal - $piutangDagangThen->nominal);
                                $nominalpiutangKaryawan = ($piutangKaryawanNow->nominal - $piutangKaryawanThen->nominal);
                                $nominalpiutangLain = ($piutangLainNow->nominal - $piutangLainThen->nominal);
                                $nominalpiutangSaham = ($piutangSahamNow->nominal - $piutangSahamThen->nominal);
                                $nominalpiutangBarang = ($piutangBarangNow->nominal - $piutangBarangThen->nominal);
                                $nominaluangMuka = ($uangMukaNow->nominal - $uangMukaThen->nominal);
                                $nominalpajakDibayarDimuka = ($pajakDibayarDimukaNow->nominal - $pajakDibayarDimukaThen->nominal);
                                $nominalhutangDagang = ($hutangDagangNow->nominal - $hutangDagangThen->nominal);
                                $nominalhutangKomisiPenjualan = ($hutangKomisiPenjualanNow->nominal - $hutangKomisiPenjualanThen->nominal);
                                $nominalhutanglain = ($hutanglainNow->nominal - $hutanglainThen->nominal);
                                $nominalhutangBankJPendek = ($hutangBankJPendekNow->nominal - $hutangBankJPendekThen->nominal);
                                $nominalhutangPajak = ($hutangPajakNow->nominal - $hutangPajakThen->nominal);
                                $nominalLiabititasPembiayaan = ($LiabititasPembiayaanNow->nominal - $LiabititasPembiayaanThen->nominal);
                                $nominalhutangMesin = ($hutangMesinNow->nominal - $hutangMesinThen->nominal);
                                $nominaluangMukaPenjualan = ($uangMukaPenjualanNow->nominal - $uangMukaPenjualanThen->nominal);
                                $nominalbiayaYangMasihHarusDibayar = ($biayaYangMasihHarusDibayarNow->nominal - $biayaYangMasihHarusDibayarThen->nominal);
                            @endphp
                            <thead class="thead thead-primary">
                                <tr>
                                <th scope="col" style="background-color: #0a58f5">Arus Kas Masuk dari Aktifitas Operasi</th>
                                <th scope="col" style="background-color: #0a58f5">Debet</th>
                                <th scope="col" style="background-color: #0a58f5">Kredit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($nominalkas > 0 )
                                    <tr>
                                        <th scope="row">{{ $kasNow->akun->nama_akun }}</th>
                                        <td>{{ $nominalkas }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalbank > 0 )
                                    <tr>
                                        <th scope="row">{{ $bankNow->akun->nama_akun }}</th>
                                        <td>{{  $nominalbank }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalpiutangDagang > 0 )
                                    <tr>
                                        <th scope="row">{{ $piutangDagangNow->akun->nama_akun }}</th>
                                        <td>{{  $nominalpiutangDagang }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalpiutangKaryawan > 0 )
                                    <tr>
                                        <th scope="row">{{ $piutangKaryawanNow->akun->nama_akun }}</th>
                                        <td>{{$nominalpiutangKaryawan }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalpiutangLain > 0 )
                                    <tr>
                                        <th scope="row">{{ $piutangLainNow->akun->nama_akun }}</th>
                                        <td>{{$nominalpiutangLain }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalpiutangSaham > 0 )
                                    <tr>
                                        <th scope="row">{{ $piutangSahamNow->akun->nama_akun }}</th>
                                        <td>{{$nominalpiutangSaham }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalpiutangBarang > 0 )
                                    <tr>
                                        <th scope="row">{{ $piutangBarangNow->akun->nama_akun }}</th>
                                        <td>{{$nominalpiutangBarang }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominaluangMuka > 0 )
                                    <tr>
                                        <th scope="row">{{ $uangMukaNow->akun->nama_akun }}</th>
                                        <td>{{$nominaluangMuka }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalpajakDibayarDimuka > 0 )
                                    <tr>
                                        <th scope="row">{{ $pajakDibayarDimukaNow->akun->nama_akun }}</th>
                                        <td>{{$nominalpajakDibayarDimuka }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalhutangDagang > 0 )
                                    <tr>
                                        <th scope="row">{{ $hutangDagangNow->akun->nama_akun }}</th>
                                        <td>{{$nominalhutangDagang }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalhutangKomisiPenjualan > 0 )
                                    <tr>
                                        <th scope="row">{{ $hutangKomisiPenjualanNow->akun->nama_akun }}</th>
                                        <td>{{$nominalhutangKomisiPenjualan }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalhutanglain > 0 )
                                    <tr>
                                        <th scope="row">{{ $hutanglainNow->akun->nama_akun }}</th>
                                        <td>{{$nominalhutanglain }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalhutangBankJPendek > 0 )
                                    <tr>
                                        <th scope="row">{{ $hutangBankJPendekNow->akun->nama_akun }}</th>
                                        <td>{{$nominalhutangBankJPendek }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalhutangPajak > 0 )
                                    <tr>
                                        <th scope="row">{{ $hutangPajakNow->akun->nama_akun }}</th>
                                        <td>{{$nominalhutangPajak }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalLiabititasPembiayaan > 0 )
                                    <tr>
                                        <th scope="row">{{ $LiabititasPembiayaanNow->akun->nama_akun }}</th>
                                        <td>{{$nominalLiabititasPembiayaan }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalhutangMesin > 0 )
                                    <tr>
                                        <th scope="row">{{ $hutangMesinNow->akun->nama_akun }}</th>
                                        <td>{{$nominalhutangMesin }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominaluangMukaPenjualan > 0 )
                                    <tr>
                                        <th scope="row">{{ $uangMukaPenjualanNow->akun->nama_akun }}</th>
                                        <td>{{$nominaluangMukaPenjualan }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalbiayaYangMasihHarusDibayar > 0 )
                                    <tr>
                                        <th scope="row">{{ $biayaYangMasihHarusDibayarNow->akun->nama_akun }}</th>
                                        <td>{{$nominalbiayaYangMasihHarusDibayar }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                            </tbody>

                            <thead class="thead thead-primary">
                                <tr>
                                <th scope="col" style="background-color: #0a58f5">Arus Kas Keluar dari Aktifitas Operasi</th>
                                <th scope="col" style="background-color: #0a58f5">Debet</th>
                                <th scope="col" style="background-color: #0a58f5">Kredit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($nominalkas < 0 )
                                <tr>
                                    <th scope="row">{{ $kasNow->akun->nama_akun }}</th>
                                    <td>{{ $nominalkas }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalbank < 0 )
                                <tr>
                                    <th scope="row">{{ $bankNow->akun->nama_akun }}</th>
                                    <td>{{  $nominalbank }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalpiutangDagang < 0 )
                                <tr>
                                    <th scope="row">{{ $bankNow->akun->nama_akun }}</th>
                                    <td>{{  $nominalpiutangDagang }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalpiutangKaryawan < 0 )
                                <tr>
                                    <th scope="row">{{ $piutangKaryawanNow->akun->nama_akun }}</th>
                                    <td>{{$nominalpiutangKaryawan }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalpiutangLain < 0 )
                                <tr>
                                    <th scope="row">{{ $piutangLainNow->akun->nama_akun }}</th>
                                    <td>{{$nominalpiutangLain }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalpiutangSaham < 0 )
                                <tr>
                                    <th scope="row">{{ $piutangSahamNow->akun->nama_akun }}</th>
                                    <td>{{$nominalpiutangSaham }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalpiutangBarang < 0 )
                                <tr>
                                    <th scope="row">{{ $piutangBarangNow->akun->nama_akun }}</th>
                                    <td>{{$nominalpiutangBarang }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominaluangMuka < 0 )
                                <tr>
                                    <th scope="row">{{ $uangMukaNow->akun->nama_akun }}</th>
                                    <td>{{$nominaluangMuka }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalpajakDibayarDimuka < 0 )
                                <tr>
                                    <th scope="row">{{ $pajakDibayarDimukaNow->akun->nama_akun }}</th>
                                    <td>{{$nominalpajakDibayarDimuka }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalhutangDagang < 0 )
                                <tr>
                                    <th scope="row">{{ $hutangDagangNow->akun->nama_akun }}</th>
                                    <td>{{$nominalhutangDagang }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalhutangKomisiPenjualan < 0 )
                                <tr>
                                    <th scope="row">{{ $hutangKomisiPenjualanNow->akun->nama_akun }}</th>
                                    <td>{{$nominalhutangKomisiPenjualan }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalhutanglain < 0 )
                                <tr>
                                    <th scope="row">{{ $hutanglainNow->akun->nama_akun }}</th>
                                    <td>{{$nominalhutanglain }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalhutangBankJPendek < 0 )
                                <tr>
                                    <th scope="row">{{ $hutangBankJPendekNow->akun->nama_akun }}</th>
                                    <td>{{$nominalhutangBankJPendek }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalhutangPajak < 0 )
                                <tr>
                                    <th scope="row">{{ $hutangPajakNow->akun->nama_akun }}</th>
                                    <td>{{$nominalhutangPajak }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalLiabititasPembiayaan < 0 )
                                <tr>
                                    <th scope="row">{{ $LiabititasPembiayaanNow->akun->nama_akun }}</th>
                                    <td>{{$nominalLiabititasPembiayaan }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalhutangMesin < 0 )
                                <tr>
                                    <th scope="row">{{ $hutangMesinNow->akun->nama_akun }}</th>
                                    <td>{{$nominalhutangMesin }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominaluangMukaPenjualan < 0 )
                                <tr>
                                    <th scope="row">{{ $uangMukaPenjualanNow->akun->nama_akun }}</th>
                                    <td>{{$nominaluangMukaPenjualan }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            @if ($nominalbiayaYangMasihHarusDibayar < 0 )
                                <tr>
                                    <th scope="row">{{ $biayaYangMasihHarusDibayarNow->akun->nama_akun }}</th>
                                    <td>{{$nominalbiayaYangMasihHarusDibayar }}</td>
                                    <td></td>
                                </tr>
                            @else
                            @endif
                            <tr>
                                <th>Total Arus Kas dari Aktifitas Operasi</th>
                                <td></td>
                                <td>(7126299335)</td>
                            </tr>
                            </tbody>

                            <thead class="thead thead-primary">
                                <tr>
                                <th scope="col" style="background-color: #ebaa13">Arus Kas Aktifitas Investasi</th>
                                <th scope="col" style="background-color: #ebaa13">Debet</th>
                                <th scope="col" style="background-color: #ebaa13">Kredit</th>
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

                                    $nominaltanah = ($tanahNow->nominal - $tanahThen->nominal) * -1;
                                    $nominalbangunan = ($bangunanNow->nominal - $bangunanThen->nominal) * -1;
                                    $nominalMesin = ($mesinNow->nominal - $mesinThen->nominal) * -1;
                                    $nominalkendaraan = ($kendaraanNow->nominal - $kendaraanThen->nominal) * -1;
                                    $nominalinventaris = ($inventarisNow->nominal - $inventarisThen->nominal) * -1;

                                @endphp
                                <tr>
                                    <th scope="row" style="background-color: #ebaa13">Pembelian Aset Tetap</th>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $tanahNow->akun->nama_akun }}</th>
                                    <td>{{  $nominaltanah }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $bangunanNow->akun->nama_akun }}</th>
                                    <td>{{ $nominalbangunan }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $mesinNow->akun->nama_akun }}</th>
                                    <td>{{ $nominalMesin }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $kendaraanNow->akun->nama_akun }}</th>
                                    <td>{{ $nominalkendaraan }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $inventarisNow->akun->nama_akun }}</th>
                                    <td>{{ $nominalinventaris }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row" style="background-color: #ebaa13">Penjualan Aset Tetap</th>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $tanahNow->akun->nama_akun }}</th>
                                    <td>{{  $nominaltanah }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ $bangunanNow->akun->nama_akun }}</th>
                                    <td>{{ $nominalbangunan }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row" style="background-color: #ebaa13">Total Arus Kas dari Aktifitas Investasi</th>
                                    <td></td>
                                    <td> (9399925960)</td>
                                </tr>
                            </tbody>
                            {{-- @php
                              dd($HutangKepadaPemegangSahamNow->nominal);
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

                                $nominalHutangKepadaPemegangSaham = ($HutangKepadaPemegangSahamNow->nominal - $HutangKepadaPemegangSahamThen->nominal);
                                $nominalHutangBankJangkaPanjang = ($HutangBankJangkaPanjangNow->nominal - $HutangBankJangkaPanjangThen->nominal);
                                $nominalLiabilitasPembiayaanKonsumenJangkaPanjang = ($LiabilitasPembiayaanKonsumenJangkaPanjangNow->nominal - $LiabilitasPembiayaanKonsumenJangkaPanjangThen->nominal);
                                $nominalLiabilitasImbalanKerja = ($LiabilitasImbalanKerjaNow->nominal - $LiabilitasImbalanKerjaThen->nominal);

                                $nominalModalDisetor = ($ModalDisetorNow->nominal - $ModalDisetorThen->nominal);
                                $nominalUangMukaSetoranModal = ($UangMukaSetoranModalNow->nominal - $UangMukaSetoranModalThen->nominal);
                                $nominalSurplusRevaluasiTanah = ($SurplusRevaluasiTanahNow->nominal - $SurplusRevaluasiTanahThen->nominal);
                                $nominalTaxAmnesty = ($TaxAmnestyNow->nominal - $TaxAmnestyThen->nominal);


                            @endphp --}}
                            <thead class="thead thead-primary">
                                <tr>
                                <th scope="col" style="background-color: #54eb13">Arus Kas Masuk Aktifitas Pendanaan</th>
                                <th scope="col" style="background-color: #54eb13">Debet</th>
                                <th scope="col" style="background-color: #54eb13">Kredit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="scope row">Hutang Bank Jangka Panjang</th>
                                    <td>22258225107</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="scope row">Liabilitas Pembiayaan Konsumen Jangka Panjang</th>
                                    <td>687525295</td>
                                    <td></td>
                                </tr>
                                {{-- @if ($nominalHutangKepadaPemegangSaham > 0 )
                                    <tr>
                                        <th scope="row">{{ $nominalHutangKepadaPemegangSahamNow->akun->nama_akun }}</th>
                                        <td>{{$nominalHutangKepadaPemegangSaham }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalHutangBankJangkaPanjang > 0 )
                                    <tr>
                                        <th scope="row">{{ $nominalHutangBankJangkaPanjangNow->akun->nama_akun }}</th>
                                        <td>{{$nominalHutangBankJangkaPanjang }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalLiabilitasPembiayaanKonsumenJangkaPanjang > 0 )
                                    <tr>
                                        <th scope="row">{{ $nominalLiabilitasPembiayaanKonsumenJangkaPanjangNow->akun->nama_akun }}</th>
                                        <td>{{$nominalLiabilitasPembiayaanKonsumenJangkaPanjang }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalLiabilitasImbalanKerja > 0 )
                                    <tr>
                                        <th scope="row">{{ $nominalLiabilitasImbalanKerjaNow->akun->nama_akun }}</th>
                                        <td>{{$nominalLiabilitasImbalanKerja }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalModalDisetor > 0 )
                                    <tr>
                                        <th scope="row">{{ $nominalModalDisetorNow->akun->nama_akun }}</th>
                                        <td>{{$nominalModalDisetor }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($SurplusRevaluasiTanah > 0 )
                                    <tr>
                                        <th scope="row">{{ $SurplusRevaluasiTanahNow->akun->nama_akun }}</th>
                                        <td>{{$SurplusRevaluasiTanah }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif
                                @if ($nominalaxAmnesty > 0 )
                                    <tr>
                                        <th scope="row">{{ $$nominalaxAmnestyNow->akun->nama_akun }}</th>
                                        <td>{{$nominalaxAmnesty }}</td>
                                        <td></td>
                                    </tr>
                                @else
                                @endif --}}
                                <tr>
                                    <th scope="row" style="background-color: #54eb13">Total Arus Kas dari Aktifitas Pendanaan</th>
                                    <td></td>
                                    <td>22945750402</td>
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
                                    <th scope="row">Surplus / Defisit Arus Kas 2022</th>
                                    <td></td>
                                    <td> 850070445                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Saldo Kas 2021</th>
                                    <td></td>
                                    <td> 3762384202                                     </td>
                                </tr>
                                <tr>
                                    <th scope="row">Saldo Akhir Kas 2022</th>
                                    <td></td>
                                    <td> 4612454647                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Kroscek Saldo Kas Neraca 2022</th>
                                    <td></td>
                                    <td> 4612454657                                     </td>
                                </tr>
                                <tr>
                                    <th scope="row">Different</th>
                                    <td></td>
                                    <td>10</td>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        @else
        @endif
    {{-- </form> --}}
  </div>
@endsection

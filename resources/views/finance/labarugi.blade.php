@extends('index')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h1>Data Laba Rugi</h1>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="content"> --}}
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="/laba-rugi/filter" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Periode Tahun</label>
                                    <select class="form-select form-select-lg w-100 mb-3" aria-label="Large select example"
                                        name="periode" id="selectFilter" onchange="filterTahun()">
                                        <option selected>Pilih Periode</option>
                                        <option value="2018">2018</option>
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
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary" value="Show">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <form action="/laba-rugi/submit" method="post">
                    @csrf
                    <input type="text" class="form-control" id="year" name="year" value="{{ $year }}"
                        hidden>
                    <input type="text" class="form-control" id="month" name="month" value="{{ $month }}"
                        hidden>
                    @if ($year != null)
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Akun</th>
                                            @for ($j = 18; $j <= 23; $j++)
                                                @if ($year == '20' . $j)
                                                    <th>{{ $month }} {{ $year }}</th>
                                                @endif
                                            @endfor
                                        </tr>
                                        <tr>
                                            <th colspan="7">Pendapatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @if ($year == null) --}}
                                        {{-- @if ($year == '20' . $j) --}}
                                        @foreach ($data_akunlr as $k)
                                            @if ($k->keterangan_akun == 'Pendapatan')
                                                <tr>
                                                    <td>{{ $k->nama_akun }}</td>
                                                    @php
                                                        // for ($i = 18; $i <= 23; $i++) {
                                                        ${'data' . $year} = $dataLabaRugi
                                                            ->where('kode_akun', $k->kode_akun)
                                                            ->where('periode', $year)
                                                            ->where('bulan', $month)
                                                            ->first();
                                                        // }
                                                    @endphp
                                                    {{-- @for ($j = 18; $j <= 23; $j++) --}}
                                                    @if (${'data' . $year} != null)
                                                        <td>
                                                            <input type="number" class="form-control"
                                                                name="{{ $k->kode_akun }}"
                                                                value="{{ ${'data' . $year}->nominal }}">
                                                        </td>
                                                    @else
                                                        <td>
                                                            <input type="number" class="form-control"
                                                                name="{{ $k->kode_akun }}" value="0">
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Akun</th>
                                            @for ($j = 18; $j <= 23; $j++)
                                                @if ($year == '20' . $j)
                                                    <th>{{ $month }} {{ $year }}</th>
                                                @endif
                                            @endfor
                                        </tr>
                                        <tr>
                                            <th colspan="7">Pajak Penghasilan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @if ($year == null) --}}
                                        {{-- @if ($year == '20' . $j) --}}
                                        @foreach ($data_akunlr as $k)
                                            @if ($k->keterangan_akun == 'Pajak Penghasilan')
                                                <tr>
                                                    <td>{{ $k->nama_akun }}</td>
                                                    @php
                                                        // for ($i = 18; $i <= 23; $i++) {
                                                        ${'data' . $year} = $dataLabaRugi
                                                            ->where('kode_akun', $k->kode_akun)
                                                            ->where('periode', $year)
                                                            ->where('bulan', $month)
                                                            ->first();
                                                        // }
                                                    @endphp
                                                    {{-- @for ($j = 18; $j <= 23; $j++) --}}
                                                    @if (${'data' . $year} != null)
                                                        <td>
                                                            <input type="number" class="form-control"
                                                                name="{{ $k->kode_akun }}"
                                                                value="{{ ${'data' . $year}->nominal }}">
                                                        </td>
                                                    @else
                                                        <td>
                                                            <input type="number" class="form-control"
                                                                name="{{ $k->kode_akun }}" value="0">
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Simpan">
                            </div>
                        </div>
                    @else
                    @endif

                </form>
            </div>
        </div>
    </div>
    </div>

    <script>
        // console.log(test);
        let namaAkun = document.getElementById('kode_akun');
        let hasil = document.getElementById('nama_akun');

        function akun() {
            // console.log(namaAkun.value);
            $.ajax({
                url: '/api/get-akun' + '/' + namaAkun.value, // Ganti dengan URL rute Anda
                type: 'GET',
                success: function(data) {
                    // Lakukan sesuatu dengan data yang diterima
                    console.log(data); // Contoh: mencetak data ke konsol
                    hasil.value = data.nama_akun
                }
            });
        }
    </script>
@endsection

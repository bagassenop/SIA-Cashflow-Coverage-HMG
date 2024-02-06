@extends('index')
@section('content')
        <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            @if ($year == null)
                <h1>Perputaran Piutang</h1>
            @else
                <h1>Perputaran Piutang {{ $year }}</h1>
            @endif
        </div><!-- /.col -->
        <div class="col-sm-5">
        </div>
        <div class="col-sm-1">
          {{-- <a href="akun-olah" style="float: right;" class="btn btn-block bg-gradient-primary btn-sm">Tambah</a> --}}
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title primary">Data</h3>

            <div class="card-tools">
            </div>

          </div>
          <!-- /.card-header -->
          <div class="card">
            <form action="/perputaran-piutang/filter" method="post">
                @csrf
                <div class="card-body">
                    <select class="form-select form-select-lg w-100 mb-3" aria-label="Large select example" name="year">
                        <option selected>Pilih Periode</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                </div>
                <div class="col-4 mb-2">
                    <button type="submit" class="btn btn-primary">Show</button>
                </div>
            </form>
          </div>
        @if ($year != null)
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Total Pendapatan</th>
                  <th>Total Piutang</th>
                  <th>Hasil</th>
                </tr>
              </thead>
              <tbody>
                    <tr>
                        {{-- <td>{{ $loop->iteration }}</td> iterasi nomor urut --}}
                        <td>{{ $totalPendapatan }}</td>
                        <td>{{ $piutangDagang->nominal }}</td>
                        <td>{{ $perputaranPiutang }}</td>
                    </tr>
              </tbody>
                    </table>
                  </div>
        @else
        @endif
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </section>
          <!-- /.content -->
@endsection

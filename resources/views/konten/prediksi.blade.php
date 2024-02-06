@extends('index')
@section('content')
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Prediksi</h1>
        </div><!-- /.col -->
        <div class="col-sm-5">
            <button style="float: right;" class="btn btn-block bg-gradient-primary btn-sm" data-bs-toggle="modal" data-bs-target="#inputTest">Data Tes</button>
        </div>
        <div class="col-sm-1">
          <button style="float: right;" type="button" class="btn btn-block bg-gradient-primary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadData">Input Dataset</button>
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
                    <h3 class="card-title primary">List Data</h3>

                    <div class="card-tools">
                    </div>

                </div>

                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Rasio Kas Kewajiban Lancar</th>
                                <th>Rasio Kas Terhadap Total Hutang</th>
                                <th>Rasio Perputaran Piutang</th>
                                <th>Kondisi Arus Kas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> iterasi nomor urut --}}
                                <td>Liquid</td>
                                <td>Baik</td>
                                <td>Tidak Baik</td>
                                <td>Tidak Aman</td>
                            </tr>
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> iterasi nomor urut --}}
                                <td>Liquid</td>
                                <td>Baik</td>
                                <td>Baik</td>
                                <td>Aman</td>
                            </tr>
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> iterasi nomor urut --}}
                                <td>Iliquid</td>
                                <td>Baik</td>
                                <td>Tidak Baik</td>
                                <td>Tidak Aman</td>
                            </tr>
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> iterasi nomor urut --}}
                                <td>Liquid</td>
                                <td>Standar</td>
                                <td>Tidak Baik</td>
                                <td>Tidak Aman</td>
                            </tr>
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> iterasi nomor urut --}}
                                <td>Liquid</td>
                                <td>Standar</td>
                                <td>Baik</td>
                                <td>Aman</td>
                            </tr>
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> iterasi nomor urut --}}
                                <td>Iliquid</td>
                                <td>Baik</td>
                                <td>Standar</td>
                                <td>Aman</td>
                            </tr>
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> iterasi nomor urut --}}
                                <td>Liquid</td>
                                <td>Baik</td>
                                <td>Tidak Baik</td>
                                <td>Tidak Aman</td>
                            </tr>
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> iterasi nomor urut --}}
                                <td>Liquid</td>
                                <td>Baik</td>
                                <td>Tidak Baik</td>
                                <td>Tidak Aman</td>
                            </tr>
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> iterasi nomor urut --}}
                                <td>Liquid</td>
                                <td>Baik</td>
                                <td>Tidak Baik</td>
                                <td>Tidak Aman</td>
                            </tr>
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> iterasi nomor urut --}}
                                <td>Liquid</td>
                                <td>Baik</td>
                                <td>Tidak Baik</td>
                                <td>Tidak Aman</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                  <!-- /.card-body -->
            </div>
                <!-- /.card -->
        </div>
              <!-- /.col -->
    </div>
            <!-- /.row -->
</section>
          <!-- /.content -->

          <!-- Modal -->
        <div class="modal fade" id="uploadData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-6" id="exampleModalLabel">Upload Dataset</h3>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="dataset">
                            <label class="input-group-text" for="dataset">Csv</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="inputTest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/prediksi/submit" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h3 class="modal-title fs-6" id="exampleModalLabel">Input Datatest</h3>
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                        </div>
                        <div class="modal-body">
                                <div class="mb-3">
                                    <label for="rasio_kas_kewajiban_lancar" class="form-label">Rasio Kas Kewajiban Lancar</label>
                                    <select class="form-select form-select-lg w-100 mb-3" id="rasio_kas_kewajiban_lancar" aria-label="Large select example" name="rasio_kas_kewajiban_lancar">
                                        <option selected>Pilih jenis Liquiditas</option>
                                        <option value="Liquid">Liquid</option>
                                        <option value="Iliquid">Iliquid</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="rasio_kas_terhadap_total_hutang" class="form-label">Rasio Kas Terhadap Total Hutang</label>
                                    <select class="form-select form-select-lg w-100 mb-3" id="rasio_kas_terhadap_total_hutang" aria-label="Large select example" name="rasio_kas_terhadap_total_hutang">
                                        <option selected>Pilih jenis Kas Terhadap Total Hutang</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Standar">Standar</option>
                                        <option value="Tidak Baik">Tidak Baik</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="rasio_perputaran_piutang" class="form-label">Rasio Perputaran Piutang</label>
                                    <select class="form-select form-select-lg w-100 mb-3" id="rasio_perputaran_piutang" aria-label="Large select example" name="rasio_perputaran_piutang">
                                        <option selected>Pilih jenis Rasio Perputaran Piutang</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Standar">Standar</option>
                                        <option value="Tidak Baik">Tidak Baik</option>
                                    </select>
                                </div>
                                {{-- <div class="mb-3">
                                    <button style="float: right;" type="submit" class="btn btn-block bg-gradient-primary btn-sm" >Submit</button>
                                </div> --}}
                            {{-- </form> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@extends('index')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data akun</h1>
        </div><!-- /.col -->
        <div class="col-sm-5">
        </div>
        <div class="col-sm-1">
          <a href="akun-olah" style="float: right;" class="btn btn-block bg-gradient-primary btn-sm">Tambah</a>
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
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Kode Akun</th>
                  <th>Nama Akun</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($akun as $item)
                    <tr>
                        {{-- <td>{{ $loop->iteration }}</td> iterasi nomor urut --}}
                        <td>{{ $item->kode_akun }}</td>
                        <td>{{ $item->nama_akun }}</td>
                        <td>
                          <a href="/akun/edit/{{ $item->kode_akun }}" class="btn btn-info">Edit</a>
                          <a href="/akun/delete/{{ $item->kode_akun }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
                    </table>
                    {{ $akun->links() }}
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
@endsection

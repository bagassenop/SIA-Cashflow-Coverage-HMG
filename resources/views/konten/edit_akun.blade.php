@extends('index')

@section('content')
<!-- Main content -->
<section class="content" style="margin-top: 10px;">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Data Akun</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {{-- <form role="form" id="quickForm" action="akun_olah" method="post"> --}}
            <form action="/akun/edit/{{ $data->kode_akun }}/simpan" method="post" enctype="multipart/form-data">
            @csrf

              <div class="card-body">

                <div class="form-group">
                  <label for="nama">Kode Akun</label>
                  <input type="text" id="kode_akun" name="kode_akun" class="form-control" value="{{ $data->kode_akun }}" required>
                </div>

                <div class="form-group">
                  <label for="nama">Nama Akun</label>
                 <input type="text" id="nama_akun" name="nama_akun" class="form-control" value="{{ $data->nama_akun }}" required>
                </div>

              </div>

              <!-- /.card-body -->
              <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Simpan">
                <a href="/akun" class="btn btn-default">
                  Batal
                </a>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection

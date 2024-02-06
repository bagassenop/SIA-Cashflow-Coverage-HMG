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
              <h3 class="card-title">Olah Data Aktivitas</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/aktivitas-olah" method="post" enctype="multipart/form-data">
            @csrf

              <div class="card-body">
  
                <div class="form-group">
                  <label for="nama">Id Aktivitas</label>
                  <input type="text" id="id_aktivitas" name="id_aktivitas" class="form-control" placeholder="Inputkan Kode Aktivitas" required>
                </div>
  
                <div class="form-group">
                  <label for="nama">Keterangan</label>
                 <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Inputkan Keterangan" required>
                </div>
  
              </div>
  
              <!-- /.card-body -->
              <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Simpan">
                <a href="aktivitas" class="btn btn-default">
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
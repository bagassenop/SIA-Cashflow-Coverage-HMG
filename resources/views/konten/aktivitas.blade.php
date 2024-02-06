@extends('index')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Aktivitas</h1>
        </div><!-- /.col -->
        <div class="col-sm-5">
        </div>
        <div class="col-sm-1">
          <a href="aktivitas-olah" style="float: right;" class="btn btn-block bg-gradient-primary btn-sm">Tambah</a>
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
                  <th>Id Aktivitas</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($aktivitas as $item)
                    <tr>
                        {{-- <td>{{ $loop->iteration }}</td> iterasi nomor urut --}}
                        <td>{{ $item->id_aktivitas }}</td>                    
                        <td>{{ $item->keterangan }}</td>                    
                        <td>
                          <a href="/aktivitas/edit/{{ $item->id }}" class="btn btn-info">Edit</a>
                          <a href="/aktivitas/delete/{{ $item->id }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>               
                @endforeach
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
@endsection
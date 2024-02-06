@extends('index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar Arus Kas Tahunan </h1>
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
            <div class="col-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title primary">Surplus/Defisit Arus Kas 2022</h3>
                        <div class="card-tools">
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <h3>{{ formatRupiah(($totalSurplusDefisit2022), true) }}</h3>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title primary">Surplus/Defisit Arus Kas 2021</h3>
                        <div class="card-tools">
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title primary">Surplus/Defisit Arus Kas 2020</h3>
                        <div class="card-tools">
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title primary">Surplus/Defisit Arus Kas 2019</h3>
                        <div class="card-tools">
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

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

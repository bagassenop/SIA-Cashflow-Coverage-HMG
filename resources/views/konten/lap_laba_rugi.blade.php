@extends('index')
@section('content')
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-6">
          <h1>Laporan Laba Rugi</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="class container-fluid">
    <form action="/report-arus-kas" method="GET">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card body">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Periode</label>
                                <select class="form-select form-select-lg w-100 mb-3" aria-label="Large select example" name="periode">
                                  <option selected>Pilih Periode</option>
                                  <option value="2018">2018</option>
                                  <option value="2019">2019</option>
                                  <option value="2020">2020</option>
                                  <option value="2021">2021</option>
                                  <option value="2022">2022</option>
                                  <option value="2023">2023</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-primary">Show</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
  </div>
@endsection

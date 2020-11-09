@extends('layouts/main')

@section('title', 'Monitoring')

@section('breadcumbs')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Home</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Home</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!-- Default box -->
        <div class="card">
          {{-- <div class="card-header">
            <h3 class="card-title">Title</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
          </div> --}}
          <div class="card-body text-center">
            <h4>IMPLEMENTASI TEKNIK AUTO SCALING PADA SISTEM MANAJEMEN BALANCING SERVER BERBASIS WEBSITE</h4>
            <img class="mb-3 mt-3" src="/images/untan.png" alt="" width="150px">
            <br>
            <h4><strong>RIDHO SUBHI <br>
              H1051131049</strong></h4>
              <h4 class="mt-3">PRODI STUDI REKAYASA SISTEM KOMPUTER <br>
                FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM <br>
                UNIVERSITAS TANJUNGPURA <br>
                PONTIANAK <br>
                TAHUN 2020
                </h4>
          </div>
          <!-- /.card-body -->
          {{-- <div class="card-footer">
            Footer
          </div> --}}
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
      </div>


    </div>
  </div>
</section>
@endsection
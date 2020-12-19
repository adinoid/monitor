@extends('layouts/main')

@section('title', 'Monitoring')

@section('breadcumbs')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>System</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">System</li>
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
    <div class="col">
      <!-- jQuery Knob -->
      <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title">
            <i class="far fa-chart-bar"></i>
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <figure class="highcharts-figure">
              <div id="grafik"></div>
            </figure>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->



  </div>
</section>
@endsection

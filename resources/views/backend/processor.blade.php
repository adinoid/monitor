@extends('layouts/main')

@section('title', 'Monitoring')

@section('breadcumbs')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Processor</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Processor</li>
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
    @forelse ($hosts as $host)
    <div class="col-6">
      <!-- jQuery Knob -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="far fa-chart-bar"></i>
            Server {{ $host->name }}
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body" id="host-{{ $host->id }}">
          <div class="row">
            @forelse (onlyEnabled($host->checks) as $check)
            <div class="col-md-4 mb-3 text-center">
              <input type="text" class="knob" value="{{ $check->last_run_message }}" data-width="120" data-height="120" data-fgColor="{{ ($check->enabled) < 70 ? 'blue' : 'red' }}">

              <div class="knob-label">{{ $check->type }}</div>
              <hr>
            </div>
            
            @empty
              <p>Belum Bisa Diakses</p>
            @endforelse
          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->

    @empty
    <p>Tidak Ada Server</p>
    @endforelse
  </div>
  <!-- /.row -->



  </div>
</section>
@endsection

@extends('layouts/main')

@section('title', 'Monitoring')

@section('breadcumbs')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <div class="row">
          <div class="col-4">
            <h1>Cek Status</h1>
          </div>
          <div class="col-8">
            <button class="btn btn-primary mr-2" disabled>{{ $server->name = NULL ? '' : $server->name }}</button>
            <button class="btn {{ ($server->last_run_message) < 51 ? 'btn-success' : ( ($server->last_run_message) >= 51 && ($server->last_run_message) < 91 ? 'btn-warning' : 'btn-danger' ) }}" disabled>{{ ($server->last_run_message) < 51 ? 'Normal' : ( ($server->last_run_message) >= 51 && ($server->last_run_message) < 91 ? 'Warning' : 'Critical' ) }}</button>
          </div>
        </div>
        
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Cek Status</li>
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
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body" id="host-{{ $host->id }}">
          <div class="row">
            {{-- @forelse ($host->checks as $check) --}}
            @forelse (onlyEnabled($host->checks) as $check)
            <div class="col-md-4 mb-3 text-center">
              @if ($check->type == "cpu" || $check->type == "diskspace" || $check->type == "memory")
              <textarea type="text" class="knob" value="{{ $check->last_run_message }}" data-width="120" data-height="120" readonly data-fgColor="{{ ($check->last_run_message) < 51 ? 'green' : ( ($check->last_run_message) >= 51 && ($check->last_run_message) < 91 ? 'orange' : 'red' ) }}">{{ $check->last_run_message }}</textarea>

              <div class="knob-label"><a href="{{ url('cekstatus/'.$check->type) }}">{{ $check->type }}</a></div>
              @endif
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

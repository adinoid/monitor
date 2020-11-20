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
            <div class="col-6 mb-3 text-center">
              {{-- @if ($host->checks->type == "mysql" || $check->type == "apache" || $check->type == "memcached") --}}

              <div class="card">
                <h3>{{ $check->type }}</h3>
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                  @if ($check->type == "cpu" || $check->type == "diskspace" || $check->type == "memory")
                  <a href="#" class="btn btn-success btn-lg disabled" tabindex="-1" role="button" aria-disabled="true"> <i class="fas fa-spinner"></i></a>
                  @else
                  <a href="#" class="btn btn-success btn-lg disabled" tabindex="-1" role="button" aria-disabled="true"><i class="fas fa-spinner"></i></a> 
                  @endif
              
                </div>
              </div>
              {{-- @endif --}}
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

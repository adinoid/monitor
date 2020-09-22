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
    <div class="col-md-4">
      <!-- Widget: user widget style 1 -->
      <div class="card card-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header">
          <h3 class="widget-user-username">Server {{ $host->name }}</h3>
          
          <h5 class="widget-user-desc">Status Processor</h5>
        </div>
        @forelse (onlyEnabled($host->checks) as $check)

        {{-- @if($host->checks->type('cpu')) --}}
        {{-- <div class="widget-user-image">
          <img class="img-circle elevation-2" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
        </div> --}}
        <div class="card-footer bg-primary">
              <div class="description-block">
                <h3 class="description-header">3,200</h3>
                <span class="description-text">Usage</span>
              </div>
        </div>
        @empty
          <p class="card-text">Tidak Ada Processor</p>
        @endforelse
      </div>
      <!-- /.widget-user -->
    </div>

    @empty
    <p>Tidak Ada Server</p>
    @endforelse

  </div>


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
        <div class="card-body">
          <div class="row">
            
            <div class="col-md-4 text-center">
              <input type="text" class="knob" value="40" data-width="90" data-height="90" data-fgColor="#00c0ef">

              <div class="knob-label">CPU</div>
            </div>

            @forelse ($tes as $tesini)

            <div class="col-md-4 text-center">
              <input type="text" class="knob" value="90" data-width="90" data-height="90" data-fgColor="{{ ($tesini->angka) < 70 ? 'blue' : 'red' }}">

              <div class="knob-label">Memory</div>
            </div>
            @empty
              <p>Belum Terkoneksi</p>
            @endforelse
            <!-- ./col -->
            <div class="col-md-4 text-center">
              <input type="text" class="knob" value="54" data-width="90" data-height="90" data-fgColor="#39CCCC">

              <div class="knob-label">Disk Space</div>
            </div>
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

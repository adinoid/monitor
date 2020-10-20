@extends('layouts/main')

@section('title', 'Monitoring')

@section('breadcumbs')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Cek</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Cek</li>
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
          <div class="card-header">
            <h3 class="card-title">Cek Monitoring</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">


            <main class="py-4 container">
              <div class="row">
        
                @forelse ($hosts as $host)
                  <div class="col">
                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title">{{ $host->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted" id="host-{{ $host->id }}"> Last updated: {{ minValue($host->checks) }}</h6>
                        @forelse (onlyEnabled($host->checks) as $check)
                        <ul class="mt-3">
                          <li id="check-{{ $check->id }}">
                            {{ $check->type }}: <span class="{{ $check->type }} {{ numberTextClass($check->type, $check->status, $check->last_run_message) }}">{{ $check->last_run_message }}</span>
                          </li>
                        </ul>
                        @empty
                        <p class="card-text">No checks yet</p>
                        @endforelse
                      </div>
                    </div>
                  </div>
                @empty
                  <p>No hosts yet</p>
                @endforelse
        
              </div>
            </main>
           
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
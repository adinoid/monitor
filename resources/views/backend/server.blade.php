@extends('layouts/main')

@section('title', 'Monitoring')

@section('breadcumbs')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Server</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Server</li>
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

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="/images/server.png">
            </div>
            <h3 class="profile-username text-center">{{ $host->name }}</h3>
            <p class="text-muted text-center">Last Update : {{ $host->updated_at }} </p>
            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>SSH User</b> <a class="float-right">{{ $host->ssh_user }}</a>
              </li>
              <li class="list-group-item">
                <b>Port</b> <a class="float-right">{{ $host->port }}</a>
              </li>
              <li class="list-group-item">
                <b>IP</b> <a class="float-right">{{ $host->ip }}</a>
              </li>
            </ul>

            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      @empty
        <p>No hosts yet</p>
      @endforelse
    </div>
  </div>
</section>
@endsection
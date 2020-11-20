<?php

namespace App\Http\Controllers;

use App\Check;
use App\Host;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SystemController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $server = Host::where('custom_properties', '1')->first();
    $hosts = Host::get();
    $cpus = Check::where('type', 'mysql')
      ->orWhere('type', 'apache')
      ->orWhere('type', 'memcached')
      ->get();
    return view('backend/system',  [
      'hosts' => $hosts,
      'cpu' => $cpus,
      'server' => $server,
    ]);
  }
}

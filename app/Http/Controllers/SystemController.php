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
    // $hosts = Host::get();

    $hosts = Host::get();

    // $hosts = DB::select('select * from checks where type = :type', ['type' => 'cpu', 'type' => 'memory', 'type' => 'diskspace']);
    return view('backend/system',  [
      'hosts' => $hosts
    ]);


    // $checks = Check::get();
    // // $checks = Check::where('type', 'like', 'cpu' or 'memory')->get();
    // return view('backend/cek',  [
    //   'checks' => $checks
    // ]);
  }
}

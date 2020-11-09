<?php

namespace App\Http\Controllers;

use App\Check;
use App\Host;
use Illuminate\Http\Request;

class CekstatusController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $hosts = Host::get();
    $cpus = Check::where('type', 'cpu')
      ->orWhere('type', 'memory')
      ->orWhere('type', 'diskspace')
      ->get();
    return view('backend/cekstatus',  [
      'hosts' => $hosts,
      'cpus' => $cpus
    ]);



    // $hosts = Host::get();
    // $cpus = Check::where('type', 'cpu')->get();



    // $hosts = Host::join('checks', 'checks.host_id', '=', 'hosts.id')->get();
    // return view('backend/processor',  [
    //     'hosts' => $hosts
    // ]);

    // ->select('users.*', 'contacts.phone', 'orders.price')
  }
}

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
    $mt_rand = mt_rand(5.0, 45.0);
    $rand = rand(5.0, 50);

    // Check::where('type', 'memory')
    //   ->update([
    //     'last_run_message' => $rand,
    //   ]);

    Check::where('type', 'cpu')
      ->update([
        'last_run_message' => $mt_rand,
      ]);

    $server = Host::where('custom_properties', '1')->first();
    $hosts = Host::get();
    $cpus = Check::where('type', 'cpu')
      ->orWhere('type', 'memory')
      ->orWhere('type', 'diskspace')
      ->get();
    return view('backend/cekstatus',  [
      'hosts' => $hosts,
      'cpus' => $cpus,
      'server' => $server,
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

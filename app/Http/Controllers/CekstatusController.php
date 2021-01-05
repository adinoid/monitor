<?php

namespace App\Http\Controllers;

use App\Host;
use App\Check;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CekstatusController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $mt_rand = mt_rand(0.1, 99);
    $rand = rand(0.1, 99);
    // $mt_rand = mt_rand(0, 0);
    // $rand = rand(0, 0);

    DB::table('checks')->join('hosts', 'checks.host_id', '=', 'hosts.id')
      ->where('checks.type', 'cpu')
      ->where('hosts.custom_properties', 1)
      ->update([
        'last_run_message' => $mt_rand,
      ]);

    DB::table('checks')->join('hosts', 'checks.host_id', '=', 'hosts.id')
      ->where('checks.type', 'memory')
      ->where('hosts.custom_properties', 1)
      ->update([
        'last_run_message' => $rand,
      ]);

    // ambil nama host server
    // $id_host = DB::table('hosts')->select('*')
    //             ->where('custom_properties', 1)
    //             ->limit(1)
    //             ->get();
    // $id_server = $id_host['id'];
    // DB::table('log_status')->insert([
    //   'id_hosts' => $id_server,
    //   'persentase' => $mt_rand,
    //   'waktu' => Carbon::NOW(),
    // ]);

    $server =  DB::table('hosts')->join('checks', 'checks.host_id', '=', 'hosts.id')
      ->where('checks.type', 'cpu')
      ->where('hosts.custom_properties', '1')->first();
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
  }
}

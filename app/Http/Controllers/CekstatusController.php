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
    //   ->where('custom_properties', 1)
    //   ->limit(1)
    //   ->get();
    $id_server = 9;
    DB::table('log_status')->insert([
      'id_hosts' => $id_server,
      'persentase' => $mt_rand,
      'waktu' => Carbon::NOW(),
    ]);

    $server =  DB::table('hosts')->join('checks', 'checks.host_id', '=', 'hosts.id')
      ->where('checks.type', 'memory')
      ->where('hosts.custom_properties', '1')->first();
    $hosts = Host::get();
    // $hosts = Host::table('hosts')->join('checks', 'checks.host_id', '=', 'hosts.id');
    //   ->where('checks.type', 'cpu')
    //   ->where('hosts.custom_properties', '1')->first();
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

  public function diskspace()
  {
    $mt_rand = mt_rand(0.1, 50);
    $rand = rand(0.1, 50);
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

    $id_server = 9;
    DB::table('log_status')->insert([
      'id_hosts' => $id_server,
      'persentase' => $mt_rand,
      'waktu' => Carbon::NOW(),
    ]);

    $server =  DB::table('hosts')->join('checks', 'checks.host_id', '=', 'hosts.id')
      ->where('checks.type', 'memory')
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

  public function cpu()
  {
    $mt_rand = mt_rand(51, 90);
    $rand = rand(51, 90);
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

    $id_server = 9;
    DB::table('log_status')->insert([
      'id_hosts' => $id_server,
      'persentase' => $mt_rand,
      'waktu' => Carbon::NOW(),
    ]);

    $server =  DB::table('hosts')->join('checks', 'checks.host_id', '=', 'hosts.id')
      ->where('checks.type', 'memory')
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

  public function memory()
  {
    $mt_rand = mt_rand(91, 100);
    $rand = rand(91, 100);
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

    $id_server = 9;
    DB::table('log_status')->insert([
      'id_hosts' => $id_server,
      'persentase' => $mt_rand,
      'waktu' => Carbon::NOW(),
    ]);

    $server =  DB::table('hosts')->join('checks', 'checks.host_id', '=', 'hosts.id')
      ->where('checks.type', 'memory')
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

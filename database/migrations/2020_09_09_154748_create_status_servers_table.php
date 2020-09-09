<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_servers', function (Blueprint $table) {
            $table->id();
            $table->integer('cpu');
            $table->integer('lv1');
            $table->integer('lv2');
            $table->integer('lv3');
            $table->integer('memory');
            $table->integer('memorySwap');
            $table->integer('disk');
            $table->integer('memoryPhp');
            $table->integer('processPhp');
            $table->integer('fpm_idle_processes');
            $table->integer('fpm_active_processes');
            $table->integer('fpm_slow_requests');
            $table->integer('fpm_listen_queue');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_servers');
    }
}

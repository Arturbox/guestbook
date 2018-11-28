<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientIpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_ips', function (Blueprint $table) {
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('ip_id');

            //relationship to clients and reviews tables
            $table ->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('cascade');
            $table ->foreign('ip_id')
                ->references('id')->on('ips')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_ips');
    }
}

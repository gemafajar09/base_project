<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouterModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_router', function (Blueprint $table) {
            $table->id('router_id');
            $table->string('router_type', 255);
            $table->string('router_url', 255);
            $table->string('router_controller', 255);
            $table->string('router_name', 255)->nullable();
            $table->string('router_middleware', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_router');
    }
}

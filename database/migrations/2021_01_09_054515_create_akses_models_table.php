<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAksesModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_akses', function (Blueprint $table) {
            $table->id('id_akses');
            $table->integer('admin_id');
            $table->integer('menu_level_1_id');
            $table->integer('menu_level_2_id')->nullable();
            $table->integer('menu_level_3_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_akses');
    }
}

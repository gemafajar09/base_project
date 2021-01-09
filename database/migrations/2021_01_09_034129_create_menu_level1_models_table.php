<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuLevel1ModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_menu_level_1', function (Blueprint $table) {
            $table->id('menu_level_1_id');
            $table->string('menu_level_1_nama',255);
            $table->string('menu_level_1_router',255);
            $table->string('menu_level_1_icon',255);
            $table->integer('menu_level_1_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_menu_level_1');
    }
}

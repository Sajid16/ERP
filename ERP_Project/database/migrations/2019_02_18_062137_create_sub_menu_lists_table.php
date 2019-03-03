<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubMenuListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_menu_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subMenuListName');
            $table->integer('submenuId')->unsigned();
            $table->foreign('submenuId')->references('id')->on('sub_menu_names');
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
        Schema::dropIfExists('sub_menu_lists');
    }
}

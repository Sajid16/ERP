<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('training_topics');
            $table->string('emp_email');
            $table->string('proposer_email');
            $table->text('description');
            $table->text('comments')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('duration')->nullable();
            $table->integer('status')->nullable();
            $table->string('ratings')->nullable();
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
        Schema::dropIfExists('trainings');
    }
}

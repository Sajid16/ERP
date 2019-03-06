<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emp_fname');
            $table->string('emp_lname');
            $table->string('emp_email');
            $table->string('sessionStrat');
            $table->string('sessionEnd');
            $table->string('dateFrom');
            $table->string('dateTo');
            $table->string('duration');
            $table->string('leaveReason');
            $table->string('reviewer');
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
        Schema::dropIfExists('leave_requests');
    }
}

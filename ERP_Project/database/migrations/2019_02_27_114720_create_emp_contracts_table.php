<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contracts_name');
            $table->string('company_name');
            $table->string('contacts_types');
            $table->string('dept_name');
            $table->string('deg_name');
            $table->string('position');
            $table->string('salary');
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('emp_contracts');
    }
}

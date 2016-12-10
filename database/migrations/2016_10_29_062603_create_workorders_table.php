<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('workorders');
        Schema::create('workorders', function (Blueprint $table) 
        {
            $table->increments('id');
			$table->string('desc');
			$table->string('tenantname');
			$table->string('createdBy')->default('Admin');;
			$table->string('status');
			$table->date('expecteddate');
			$table->integer('estmtdcost');
			$table->date('actualdate');
			$table->integer('actualcost');
            $table->integer('tenant_id');
            $table->timestamps();				
      
           $table->foreign('tenant_id')->references('id')->on('users');
           // $table->foreign('tenant_id')->references('id')->on('apartments');
           // $table->foreign('tenant_id')->references('id')->on('properties');

       });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('workorders');
    }
}

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
        Schema::create('workorders', function (Blueprint $table) 
        {
            $table->increments('id');
			$table->string('desc');
			$table->string('status');
			$table->date('expecteddate');
			$table->integer('estmtdcost');
			$table->date('actualdate');
			$table->integer('actualcost');
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
        Schema::drop('workorders');
    }
}

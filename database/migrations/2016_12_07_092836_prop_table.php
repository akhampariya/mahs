<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PropTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
	{
		Schema::create('Property', function(Blueprint $table) {
			$table->increments('id');
			$table->softDeletes();
			$table->string('property_name', 20)->default('MAHS Apartments');
			$table->string('apt_no', 3)->default('0');
			$table->string('adress', 30)->default('Dodge Street  68106');
		});
	}

	public function down()
	{
		Schema::drop('Property');
	}
}
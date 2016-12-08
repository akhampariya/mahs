<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function(Blueprint $table) {
            $table->increments('id');
            $table->softDeletes();
            $table->string('property_name', 20)->default('MAHS Apartments');
            $table->string('apt_no', 3);
            $table->string('adress', 30)->default('Dodge Street  68106');
            $table->timestamps();   
        });

        Schema::table('properties', function (Blueprint $table) {
           $table->foreign('apt_no')->references('id')->on('workorders');
       });
    }

    public function down()
    {
        Schema::drop('properties');
    }
}

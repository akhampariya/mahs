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
            $table->string('property_name')->default('MAHS Apartments');
            $table->string('address')->default('Dodge Street 68106');
            $table->integer('tid')->unsigned()->nullable();
            $table->timestamps();   
        });

       //  Schema::table('properties', function (Blueprint $table) {
       //     $table->foreign('apt_no')->references('id')->on('workorders');
       // // });
    }

    public function down()
    {
        Schema::drop('properties');
    }
}

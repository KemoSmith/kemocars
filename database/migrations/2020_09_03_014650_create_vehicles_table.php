<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('user_id');

            $table->string('make', 25);
            $table->string('model', 25);
            $table->integer('year');
            $table->string('chassis', 80);
            $table->integer('engine_displacement');
            $table->string('engine_model', 25);
            $table->enum('fuel', ['Petrol', 'Diesel', 'LPG', 'Electric', 'Hybrid', 'Other']);
            $table->integer('distance');
            $table->integer('seats');
            $table->integer('doors');
            $table->enum('transmission', ['Automatic', 'Manual', 'CVT', 'Other']);
            $table->enum('driving_wheels', ['Rear Wheel Drive', 'Front Wheel Drive', 'Four Wheel Drive', 'All Wheel Drive']);
            $table->string('colour', 25);
            $table->enum('steering', ['Left Hand Drive', 'Right Hand Drive', 'Other']);
            $table->string('location', 100);
            $table->integer('weight')->nullable();
            $table->string('size', 25)->nullable();
            $table->enum('condition', ['New', 'Foreign Used', 'Used', 'Refurbished']);
            $table->string('description', 500)->nullable();
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}

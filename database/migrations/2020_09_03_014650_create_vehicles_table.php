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
            $table->string('fuel');
            $table->integer('distance');
            $table->integer('seats');
            $table->integer('doors');
            $table->string('transmission');
            $table->string('driving_wheels');
            $table->string('colour', 25);
            $table->string('steering');
            $table->string('location', 100);
            $table->integer('weight')->nullable();
            $table->string('size', 25)->nullable();
            $table->string('condition');
            $table->string('description', 500)->nullable();
            $table->integer('price');
            $table->string('status')->nullable();
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

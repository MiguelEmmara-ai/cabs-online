<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();
            $table->string('bookingRefNo');
            $table->string('customerName');
            $table->integer('phoneNumber');
            $table->string('unitNumber');
            $table->string('streetNumber');
            $table->string('streetName');
            $table->string('suburb');
            $table->string('destinationSuburb');
            $table->date('pickUpDate');
            $table->time('pickUpTime');
            $table->enum('status', ['Assigned', 'Unassigned']);
            $table->enum('carsNeed', ['Scooter', 'Hatchback', 'Suv', 'Sedan', 'Van']);
            $table->string('assignedBy');
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
        Schema::dropIfExists('passengers');
    }
}

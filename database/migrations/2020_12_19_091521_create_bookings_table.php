<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBookingsTable.
 */
class CreateBookingsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        Schema::create('rooms', function(Blueprint $table) {
            $table->increments('id');
            $table->string('roomNumber',200);
            $table->decimal('price');
            $table->boolean('isBooked')->default(0)->comment="1=booked 0=notBooked";
            $table->integer('maxPerson');
            $table->tinyInteger('roomType')->comment="1=AC 2=NonAC";
            $table->timestamps();
        });



		Schema::create('bookings', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')
                ->references('id')
                ->on('rooms')
                ->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->string('room_number', 200);

            $table->dateTime("arrival")->nullable();
            $table->dateTime("checkout")->nullable();
            $table->tinyInteger("book_type");
            $table->dateTime("book_time");

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
        Schema::drop('rooms');
	    Schema::drop('bookings');
	}
}

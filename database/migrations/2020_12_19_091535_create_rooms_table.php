<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateRoomsTable.
 */
class CreateRoomsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
//		Schema::create('rooms', function(Blueprint $table) {
//            $table->increments('id');
//            $table->string('roomNumber',200);
//            $table->decimal('price');
//            $table->boolean('isBooked')->default(0)->comment="1=booked 0=notBooked";
//            $table->integer('maxPerson');
//            $table->tinyInteger('roomType')->comment="1=AC 2=NonAC";
//            $table->timestamps();
//		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
//		Schema::drop('rooms');
	}
}

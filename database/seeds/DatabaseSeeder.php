<?php

use App\Models\Room;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Room::create([
            "roomNumber" => "11-BAN-1452",
            "price" => "5000",
            'maxPerson' => "5",
            "roomType" => "1"
        ]);

        Room::create([
            "roomNumber" => "11-BAN-1453",
            "price" => "6000",
            'maxPerson' => "5",
            "roomType" => "1"
        ]);


        Room::create([
            "roomNumber" => "11-BAN-1453",
            "price" => "5000",
            'maxPerson' => "5",
            "roomType" => "1"
        ]);


        Room::create([
            "roomNumber" => "11-BAN-1454",
            "price" => "7000",
            'maxPerson' => "5",
            "roomType" => "1"
        ]);


        Room::create([
            "roomNumber" => "11-BAN-1457",
            "price" => "8000",
            'maxPerson' => "3",
            "roomType" => "1"
        ]);


        Room::create([
            "roomNumber" => "11-BAN-1480",
            "price" => "10000",
            'maxPerson' => "2",
            "roomType" => "1"
        ]);


        Room::create([
            "roomNumber" => "11-BAN-1465",
            "price" => "4000",
            'maxPerson' => "2",
            "roomType" => "0"
        ]);

        Room::create([
            "roomNumber" => "11-BAN-1465",
            "price" => "3000",
            'maxPerson' => "3",
            "roomType" => "0"
        ]);

        Room::create([
            "roomNumber" => "11-BAN-1425",
            "price" => "2500",
            'maxPerson' => "1",
            "roomType" => "0"
        ]);


        Room::create([
            "roomNumber" => "11-BAN-1405",
            "price" => "2000",
            'maxPerson' => "2",
            "roomType" => "0"
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

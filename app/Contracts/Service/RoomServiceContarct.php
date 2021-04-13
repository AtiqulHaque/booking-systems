<?php
namespace App\Contracts\Service;


interface RoomServiceContarct
{
    public function getAllRooms();

    public function roomDetails($room_id);
}

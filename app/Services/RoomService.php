<?php


namespace App\Services;


use App\Contracts\RoomRepository;
use App\Contracts\Service\RoomServiceContarct;

class RoomService implements RoomServiceContarct
{
    /**
     * @var RoomRepository
     */
    private $roomRepo;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepo = $roomRepository;
    }

    public function getAllRooms()
    {
        return $this->roomRepo->getAllRooms();
    }

    public function roomDetails($room_id)
    {
        return $this->roomRepo->roomDetails($room_id);
    }
}

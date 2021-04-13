<?php

namespace App\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RoomRepository.
 *
 * @package namespace App\Contracts;
 */
interface RoomRepository extends RepositoryInterface
{
    public function getAllRooms();

    public function roomDetails($roomId);

}

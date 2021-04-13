<?php

namespace App\Http\Controllers;

use App\Contracts\Service\RoomServiceContarct;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RoomCreateRequest;
use App\Http\Requests\RoomUpdateRequest;
use App\Contracts\RoomRepository;
use App\Validators\RoomValidator;

/**
 * Class RoomsController.
 *
 * @package namespace App\Http\Controllers;
 */
class RoomsController extends BaseController
{
    /**
     * @var RoomRepository
     */
    protected $repository;

    /**
     * @var RoomValidator
     */
    protected $validator;
    /**
     * @var RoomServiceContarct
     */
    private $roomService;

    /**
     * RoomsController constructor.
     *
     * @param RoomServiceContarct $roomService
     * @param RoomValidator $validator
     */
    public function __construct(RoomServiceContarct $roomService)
    {
        $this->roomService = $roomService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendApiResponse("success", $this->roomService->getAllRooms());
    }



}

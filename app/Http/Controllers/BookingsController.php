<?php

namespace App\Http\Controllers;

use App\Contracts\Service\BookingServiceContract;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Contracts\BookingRepository;
use App\Validators\BookingValidator;

/**
 * Class BookingsController.
 *
 * @package namespace App\Http\Controllers;
 */
class BookingsController extends BaseController
{
    /**
     * @var BookingRepository
     */
    protected $repository;

    /**
     * @var BookingValidator
     */
    protected $validator;
    /**
     * @var BookingServiceContract
     */
    private $bookService;

    /**
     * BookingsController constructor.
     *
     * @param BookingServiceContract $bookService
     * @param BookingValidator $validator
     */
    public function __construct(BookingServiceContract $bookService, BookingValidator $validator)
    {
        $this->bookService = $bookService;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->bookService->bookRoom($request->all());

        if (!empty($data['status']) && $data['status'] == 'validation-error') {
            return $this->sendApiValidationError($data['error']);
        }

        if (!empty($data['status']) && $data['status'] == 'success') {
            return $this->sendApiResponse("Success",$data['data']);
        }

        return $this->sendApiError($data['html']);
    }

    public function checkin(Request $request)
    {
        $user = \JWTAuth::user();

        if (empty($user)) {
            return $this->sendApiError("The token is invalid", Response::HTTP_FORBIDDEN);
        }

        $data = $this->bookService->checkIn($request->all('room_id'), $user->id);

        if (!empty($data['status']) && $data['status'] == 'validation-error') {
            return $this->sendApiValidationError($data['error']);
        }

        if (!empty($data['status']) && $data['status'] == 'success') {
            return $this->sendApiResponse("Success",$data['data']);
        }

        return $this->sendApiError($data['html']);
    }

    public function checkout(Request $request)
    {
        $user = \JWTAuth::user();

        if (empty($user)) {
            return $this->sendApiError("The token is invalid", Response::HTTP_FORBIDDEN);
        }

        $data = $this->bookService->checkOut($request->all('room_id'), $user->id);

        if (!empty($data['status']) && $data['status'] == 'success') {
            return $this->sendApiResponse("Success",$data['data']);
        }

        return $this->sendApiError($data['html']);
    }


    public function bookingList(Request $request)
    {
        $data = $this->bookService->bookingList();

        if (!empty($data['status']) && $data['status'] == 'success') {
            return $this->sendApiResponse("Success",$data['data']);
        }

        return $this->sendApiError($data['html']);
    }


}

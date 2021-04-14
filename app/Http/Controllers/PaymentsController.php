<?php

namespace App\Http\Controllers;

use App\Contracts\Service\BookingServiceContract;
use App\Contracts\Service\PaymentServiceContract;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Contracts\PaymentsRepository;
use App\Validators\PaymentsValidator;

/**
 * Class PaymentsController.
 *
 * @package namespace App\Http\Controllers;
 */
class PaymentsController extends BaseController
{
    /**
     * @var PaymentsRepository
     */
    protected $repository;

    /**
     * @var PaymentsValidator
     */
    protected $validator;
    /**
     * @var PaymentServiceContract
     */
    private $paymentService;
    /**
     * @var BookingServiceContract
     */
    private $bookingService;

    /**
     * PaymentsController constructor.
     *
     * @param PaymentServiceContract $paymentService
     * @param BookingServiceContract $bookingService
     * @param PaymentsValidator $validator
     */
    public function __construct(PaymentServiceContract $paymentService,
        BookingServiceContract $bookingService,
        PaymentsValidator $validator)
    {
        $this->paymentService = $paymentService;
        $this->bookingService = $bookingService;
        $this->validator  = $validator;
    }


    /**
     * @OA\Post(
     *      path="/booking/payment",
     *      operationId="pyemnt",
     *      tags={"Payment"},
     *      summary="Room check in payment",
     *      description="Room check in payment",
     *      * @OA\RequestBody(
     *          required=true,
     *          description="Pass the room information",
     *          @OA\JsonContent(
     *                  required={"booking_id","user_id", "amount"},
     *                  @OA\Property(property="booking_id", type="string", example="booking_id"),
     *                  @OA\Property(property="amount", type="float", example="860.30"),
     *                  @OA\Property(property="user_id", type="string", example="15471"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */

    public function payment(Request $request)
    {
        $user = \JWTAuth::user();

        if (empty($user)) {
            return $this->sendApiError("The token is invalid", Response::HTTP_FORBIDDEN);
        }

        $data = $this->bookingService->getBookingDetails($request->get('booking_id'));




        if (!empty($data['status']) && $data['status'] == 'success') {

            if($request->get('amount') < $data['data']['room']['price']){
                $response = $this->paymentService->fullPayment(
                    $request->get('booking_id'),
                    $user->id,
                    $request->get('amount'),
                    false
                );
            }else {
                $response = $this->paymentService->fullPayment(
                    $request->get('booking_id'),
                    $user->id,
                    $request->get('amount'),
                    true
                );
            }


            if (!empty($response['status']) && $response['status'] == 'validation-error') {
                return $this->sendApiValidationError($response['error']);
            }


            if (!empty($response['status']) && $response['status'] == 'success') {
                return $this->sendApiResponse("Success",$response['data']);
            }
        }

        return $this->sendApiError($data['html']);
    }


}

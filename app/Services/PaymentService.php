<?php


namespace App\Services;


use App\Contracts\PaymentsRepository;
use App\Contracts\Service\PaymentServiceContract;
use App\Validators\PaymentsValidator;
use Carbon\Carbon;

class PaymentService implements PaymentServiceContract
{
    /**
     * @var PaymentsRepository
     */
    private $paymentRepo;
    /**
     * @var PaymentsValidator
     */
    private $validator;

    public function __construct(PaymentsRepository $paymentRepo, PaymentsValidator $validator)
    {
        $this->paymentRepo = $paymentRepo;
        $this->validator = $validator;
    }

    public function fullPayment($bookingId, $userId, $amount, $isFullPayment = true)
    {
        $this->validator->setRules();

        if (!$this->validator->with([
            'booking_id' => $bookingId,
            'user_id' => $userId,
            'amount' => $amount
        ])->passes()) {
            return [
                'html'   => "Payment validation errors",
                'status' => 'validation-error',
                'error'  => $this->validator->errors()->messages()
            ];
        }



        $responseBooking = $this->paymentRepo->create([
            'booking_id'      => $bookingId,
            'user_id'         => $userId,
            'amount'          => $amount,
            'isFullPayment'   => ($isFullPayment == true) ? 1 : 0,
            'payment_of_date' => Carbon::now()
        ]);

        if(!empty($responseBooking)){
            return [
                "status" => 'success',
                'data' => $responseBooking
            ];
        } else{
            return [
                "status" => 'error',
                'data' => $responseBooking
            ];
        }
    }

    public function pertialPayment($bookingId, $amount, $userId)
    {
        $response = $this->paymentRepo->create([
            'booking_id'      => $bookingId,
            'user_id'         => $userId,
            'amount'          => $amount,
            'payment_of_date' => Carbon::now()
        ]);

        if(!empty($response)){
            return [
                "status" => 'error',
                'html' => "Faild"
            ];
        } else{
            return [
                "status" => 'success',
                'data' => $response
            ];
        }
    }
}

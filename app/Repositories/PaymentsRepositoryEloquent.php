<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\PaymentsRepository;
use App\Models\Payments;
use App\Validators\PaymentsValidator;

/**
 * Class PaymentsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PaymentsRepositoryEloquent extends BaseRepository implements PaymentsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Payments::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function paidPayment()
    {
        // TODO: Implement paidPayment() method.
    }
}

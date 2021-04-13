<?php

namespace App\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PaymentsRepository.
 *
 * @package namespace App\Contracts;
 */
interface PaymentsRepository extends RepositoryInterface
{
   public function paidPayment();
}

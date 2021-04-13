<?php

namespace App\Presenters;

use App\Transformers\RoomTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RoomPresenter.
 *
 * @package namespace App\Presenters;
 */
class RoomPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RoomTransformer();
    }
}

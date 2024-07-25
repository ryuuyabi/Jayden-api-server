<?php

namespace App\Observers;

use App\Services\OperatorAuth;
use Illuminate\Database\Eloquent\Model;

class OperatorActiveObserver
{
    protected int $operator_id;

    public function __construct($operator_auth = new OperatorAuth())
    {
        $this->operator_id = $operator_auth->getId();
    }

    public function creating(Model $model): void
    {
        $model->operator_id = $this->operator_id;
    }
}

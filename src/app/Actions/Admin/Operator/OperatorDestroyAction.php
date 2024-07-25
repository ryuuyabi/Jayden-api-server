<?php

namespace App\Actions\Admin\Operator;

use App\Repositories\OperatorRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class OperatorDestroyAction
{
    /**
     * @var OperatorRepositoryInterface repository
     */
    private OperatorRepositoryInterface $operator_repository;

    /**
     * instance
     *
     * @param OperatorRepositoryInterface $operator_repository
     */
    public function __construct(OperatorRepositoryInterface $operator_repository)
    {
        $this->operator_repository = $operator_repository;
    }

    /**
     * 管理者の削除を行います
     *
     * @param array $validate_data
     * @return void
     */
    public function __invoke(array $validate_data)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $this->operator_repository->softDelete($validate_data['operator_id']);
    }
}

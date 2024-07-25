<?php

namespace App\Actions\Admin\Operator;

use App\Repositories\OperatorRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class OperatorShowAction
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
     * 管理者詳細を取得します
     *
     * @param integer $operator_id
     * @return array
     */
    public function __invoke(int $operator_id): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->operator_repository->findOrFail($operator_id)->toArray();
    }
}

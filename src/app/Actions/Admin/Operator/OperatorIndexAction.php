<?php

namespace App\Actions\Admin\Operator;

use App\Repositories\OperatorRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class OperatorIndexAction
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
     * 管理者一覧を取得します
     *
     * @param Request $request
     * @return array
     */
    public function __invoke(Request $request): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->operator_repository->getOperatorsLengthAwarePaginatorForOperatorSite($request)->toArray();
    }
}

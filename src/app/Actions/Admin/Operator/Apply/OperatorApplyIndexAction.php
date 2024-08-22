<?php

namespace App\Actions\Admin\Operator\Apply;

use App\Repositories\RegistrationOperatorApplyRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class OperatorApplyIndexAction
{
    /**
     * @var RegistrationOperatorApplyRepositoryInterface repository
     */
    private RegistrationOperatorApplyRepositoryInterface $registration_operator_apply_repository;

    /**
     * instance
     *
     * @param RegistrationOperatorApplyRepositoryInterface $registration_operator_apply_repository
     */
    public function __construct(RegistrationOperatorApplyRepositoryInterface $registration_operator_apply_repository)
    {
        $this->registration_operator_apply_repository = $registration_operator_apply_repository;
    }

    /**
     * 管理者申請一覧を取得します
     *
     * @return array<string, mixed>
     */
    public function __invoke(): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->registration_operator_apply_repository->fetchAppliesLengthAwarePaginator()->toArray();
    }
}

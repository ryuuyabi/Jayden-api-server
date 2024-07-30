<?php

namespace App\Repositories;

use App\Enums\Identifier\IdentifierType;
use App\Models\Identifier;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

final class IdentifierRepository implements IdentifierRepositoryInterface
{
    /**
     * @var Identifier model
     */
    private Identifier $model;

    /**
     * instance
     */
    public function __construct()
    {
        $this->model = new Identifier();
    }

    /**
     * 利用可能な管理者サーバー用の識別子を取得します
     *
     * @return string
     */
    public function getAvailableSubOfOperatorServer(): string
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->where('identifier_type', IdentifierType::OPERATOR_SERVER)->first()->sub ?? throw new ModelNotFoundException('管理者サーバー用の識別子が見つかりませんでした');
    }

    /**
     * 利用可能な管理者クライアント用の識別子を取得します
     *
     * @return string
     */
    public function getAvailableSubOfOperatorClient(): string
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->where('identifier_type', IdentifierType::OPERATOR_CLIENT)->first()->sub ?? throw new ModelNotFoundException('管理者クライアント用の識別子が見つかりませんでした');
    }
}

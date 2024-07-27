<?php

namespace App\Actions\Admin\Auth\Register;

use App\Mail\Admin\OperatorRegistrationApplicant;
use App\Repositories\RegistrationOperatorApplyRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

final class RegisterStoreAction
{
    /**
     * @var RegistrationOperatorApplyRepositoryInterface repository
     */
    private RegistrationOperatorApplyRepositoryInterface $registration_operator_apply;

    /**
     * instance
     *
     * @param RegistrationOperatorApplyRepositoryInterface $registration_operator_apply
     */
    public function __construct(RegistrationOperatorApplyRepositoryInterface $registration_operator_apply)
    {
        $this->registration_operator_apply = $registration_operator_apply;
    }

    /**
     * 管理者作成申請のメールアドレスのを送信します
     *
     * @param array<string, mixed> $validate_data
     * @return void
     */
    public function __invoke(array $validate_data): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        DB::transaction(function () use ($validate_data) {
            $this->registration_operator_apply->save($validate_data);
            Log::debug("{$validate_data['email']}宛に管理者作成申請完了のメールを送信しました");

            Mail::to($validate_data['email'])->send(new OperatorRegistrationApplicant());
        });
    }
}

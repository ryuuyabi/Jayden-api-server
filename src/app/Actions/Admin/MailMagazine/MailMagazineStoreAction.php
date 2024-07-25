<?php

namespace App\Actions\Admin\MailMagazine;

use App\Enums\MailMagazine\MailMagazineType;
use App\Models\MailMagazine;
use App\Models\OperatorMailMagazine;
use App\Models\UserMailMagazine;
use Illuminate\Support\Facades\Log;

final class MailMagazineStoreAction
{
    public function __invoke(array $validate_data)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $mail_magazine = $this->createAllMailMagazine($validate_data);
        match (MailMagazineType::from($validate_data['type'])) {
            MailMagazineType::ALL => $this->createAllMailMagazine($validate_data),
            MailMagazineType::USER => $this->createUserMailMagazine($validate_data, $mail_magazine->id),
            MailMagazineType::USER_ALL => $this->createAllUserMailMagazine($validate_data, $mail_magazine->id),
            MailMagazineType::OPERATOR => $this->createOperatorMailMagazine($validate_data, $mail_magazine->id),
            MailMagazineType::OPERATOR_ALL => $this->createAllOperatorMailMagazine($validate_data, $mail_magazine->id),
        };
    }

    private function createAllMailMagazine(array $validate_data)
    {
        $mail_magazine = new MailMagazine();
        $mail_magazine->body = $validate_data['body'];
        $mail_magazine->type = $validate_data['type'];
        $mail_magazine->release_at = $validate_data['release_at'];
        $mail_magazine->save();
        return $mail_magazine;
    }

    private function createUserMailMagazine(array $validate_data, int $mail_magazine_id)
    {
        foreach ($validate_data['user_ids'] as $user_id) {
            $user_mail_magazine = new UserMailMagazine();
            $user_mail_magazine->user_id = $user_id;
            $user_mail_magazine->mail_magazine_id = $mail_magazine_id;
            $user_mail_magazine->save();
        }
    }

    private function createAllUserMailMagazine(array $validate_data, int $mail_magazine_id)
    {
        foreach ($validate_data['user_ids'] as $user_id) {
            $user_mail_magazine = new UserMailMagazine();
            $user_mail_magazine->user_id = $user_id;
            $user_mail_magazine->mail_magazine_id = $mail_magazine_id;
            $user_mail_magazine->save();
        }
    }

    private function createOperatorMailMagazine(array $validate_data, int $mail_magazine_id)
    {
        foreach ($validate_data['operator_ids'] as $operator_id) {
            $user_mail_magazine = new OperatorMailMagazine();
            $user_mail_magazine->operator_id = $operator_id;
            $user_mail_magazine->mail_magazine_id = $mail_magazine_id;
            $user_mail_magazine->save();
        }
    }

    private function createAllOperatorMailMagazine(array $validate_data, int $mail_magazine_id)
    {
        foreach ($validate_data['operator_ids'] as $operator_id) {
            $user_mail_magazine = new OperatorMailMagazine();
            $user_mail_magazine->operator_id = $operator_id;
            $user_mail_magazine->mail_magazine_id = $mail_magazine_id;
            $user_mail_magazine->save();
        }
    }
}

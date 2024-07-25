<?php

namespace App\Services;

final class OperatorAuth
{
    public function loginOperator(int $operator_id): void
    {
        session()->put('operator_id', $operator_id);
    }

    public function getId(): int
    {
        return session()->get('operator_id') ?? abort(404);
    }

    public function getIdArray(): array
    {
        return ['operator_id', $this->getId()];
    }
}

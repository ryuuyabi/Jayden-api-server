<?php

namespace App\Repositories;

use App\Concerns\Repository\RepositorySaveHandle;
use App\Models\RegistrationOperatorApply;

final class RegistrationOperatorApplyRepository implements RegistrationOperatorApplyRepositoryInterface
{
    use RepositorySaveHandle;

    private RegistrationOperatorApply $model;

    public function __construct()
    {
        $this->model = new RegistrationOperatorApply();
    }
}

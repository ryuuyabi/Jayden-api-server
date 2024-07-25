<?php

namespace App\Repositories;

interface IdentifierRepositoryInterface
{
    public function getAvailableSubOfOperatorServer(): string;
    public function getAvailableSubOfOperatorClient(): string;
}

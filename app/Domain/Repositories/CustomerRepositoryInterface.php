<?php

namespace App\Domain\Repositories;

use Illuminate\Support\Collection;

interface CustomerRepositoryInterface
{
    public function all(): Collection;
}
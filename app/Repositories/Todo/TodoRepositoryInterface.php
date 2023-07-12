<?php

namespace App\Repositories\Todo;
use Illuminate\Support\Collection;

interface TodoRepositoryInterface
{
    public function all(): Collection;
}

<?php

namespace App\Repositories\Todo;

use App\Models\Todo;
use Illuminate\Support\Collection;

class TodoRepository implements TodoRepositoryInterface
{
    public function all(): Collection
    {
        return Todo::all();
    }
}

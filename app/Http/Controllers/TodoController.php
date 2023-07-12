<?php

namespace App\Http\Controllers;

use App\Repositories\Todo\TodoRepositoryInterface;

class TodoController extends Controller
{

    private TodoRepositoryInterface $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function index()
    {
        return response()->json($this->todoRepository->all());
    }

}

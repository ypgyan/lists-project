<?php

namespace App\Actions\Api\Todos;

use App\Models\Mongo\Todo;

class CreateTodo
{
    public function execute(array $todoData): Todo
    {
        return Todo::create($todoData);
    }
}

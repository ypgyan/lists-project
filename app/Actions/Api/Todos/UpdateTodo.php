<?php

namespace App\Actions\Api\Todos;

use App\Models\Mongo\Todo;

class UpdateTodo
{
    public function execute(Todo $todo, array $todoData): Todo
    {
        $todo->update($todoData);
        return $todo;
    }
}

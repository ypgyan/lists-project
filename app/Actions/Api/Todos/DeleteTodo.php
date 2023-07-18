<?php

namespace App\Actions\Api\Todos;

use App\Models\Mongo\Todo;

class DeleteTodo
{
    public function execute(Todo $todo): Todo
    {
        $todo->delete();
        return $todo;
    }
}

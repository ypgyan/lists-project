<?php

namespace App\Http\Controllers;

use App\Actions\Api\Todos\CreateTodo;
use App\Actions\Api\Todos\DeleteTodo;
use App\Actions\Api\Todos\UpdateTodo;
use App\Exceptions\TodoGenericException;
use App\Http\Requests\Api\Todos\TodoFormRequest;
use App\Http\Resources\Api\Todos\TodoResource;
use App\Models\Mongo\Todo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $userTodos = Todo::where('user_id', $request->user()->id)->get();
        return response()->json(TodoResource::collection($userTodos));
    }

    public function store(TodoFormRequest $request, CreateTodo $action)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = $request->user()->id;
        return response()->json(new TodoResource($action->execute($validatedData)));
    }

    public function show(Todo $todo): JsonResponse
    {
        return response()->json(new TodoResource($todo));
    }

    public function update(TodoFormRequest $request, Todo $todo, UpdateTodo $action): JsonResponse
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = $request->user()->id;
        return response()->json(new TodoResource($action->execute($todo, $validatedData)));
    }

    public function destroy(Request $request, Todo $todo, DeleteTodo $action): JsonResponse
    {
        if ($todo->user_id != $request->user()->id) {
            abort(403);
        }
        return response()->json($action->execute($todo));
    }
}

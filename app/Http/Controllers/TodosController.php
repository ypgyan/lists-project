<?php

namespace App\Http\Controllers;

use App\Actions\Api\Todos\CreateTodo;
use App\Http\Requests\Api\Todos\TodoCreateRequest;
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

    public function store(TodoCreateRequest $request, CreateTodo $action)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = $request->user()->id;
        return response()->json($action->execute($validatedData));
    }

    public function show(int $id): JsonResponse
    {
        return response()->json(Todo::find($id));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

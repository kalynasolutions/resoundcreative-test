<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * List Todos for only the authenticated user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return TodoResource::collection($request->user()->todos);
    }

    /**
     * Create a new Todo for the authenticated user
     *
     * @param  TodoRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TodoRequest $request)
    {
        return TodoResource::make($request->user()->todos()->create($request->validated()));
    }

    /**
     * Update a Todo for the authenticated user
     *
     * @param  TodoRequest  $request
     * @param  Todo  $todo
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TodoRequest $request, Todo $todo)
    {
        $todo->update($request->validated());

        return TodoResource::make($todo);
    }

    /**
     * Delete a Todo for the authenticated user
     *
     * @param  Request  $request
     * @param  Todo  $todo
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, Todo $todo)
    {
        $todo->delete();

        return response()->json(['message' => 'Todo successfully deleted']);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * List Todos for only the authenticated user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $todos = [];

        //TODO: Implement this method

        return response()->json($todos);
    }

    /**
     * Create a new Todo for the authenticated user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $todo = null;

        //TODO: Implement this method

        return response()->json($todo);
    }

    /**
     * Update a Todo for the authenticated user
     *
     * @param Request $request
     * @param $todoId
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $todoId)
    {
        //TODO: Implement this method

        return response()->json([]);
    }

    /**
     * Delete a Todo for the authenticated user
     *
     * @param Request $request
     * @param $todoId
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $todoId)
    {
        //TODO: Implement this method

        return response()->json([]);
    }
}

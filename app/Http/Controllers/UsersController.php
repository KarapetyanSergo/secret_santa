<?php

namespace App\Http\Controllers;

use App\Http\Services\UsersService;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request, UsersService $usersService): JsonResponse
    {
        $query = User::query()
        ->with('recipient')
        ->with('santa');

        if ($request->filters) {
            $usersService->listFilter($query, $request->filters);
        }

        $users = $query->paginate()->toArray();

        $response = [
            'current_page' => $users['current_page'],
            'data' => $users['data'],
            'per_page' => $users['per_page'],
            'users_count' => $users['per_page'],
        ];

        return response()->json($response);
    }

    public function show(int $userId): JsonResponse
    {
        $user = User::query()
        ->with('recipient')
        ->with('santa')
        ->where('id', $userId)
        ->get();

        return response()->json($user);
    }
}

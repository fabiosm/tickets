<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $columns = ['id', 'name', 'email', 'is_admin', 'is_active', 'is_pending', 'created_at'];
        $users = User::select($columns)->get();
        return response()->json(['data' => $users]);
    }
    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->safe()->except('password');
        $user = User::findOrFail($id);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->fill($data)->save();
        return response()->json(['data' => new UserResource($user)]);
    }
}

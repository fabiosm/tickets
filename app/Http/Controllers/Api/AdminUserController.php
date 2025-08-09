<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $columns = ['id', 'name', 'email', 'is_admin', 'is_active', 'is_pending', 'created_at'];
        $users = User::select($columns)->get();
        return response()->json(['data' => $users]);
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json(['data' => $user]);
    }
}

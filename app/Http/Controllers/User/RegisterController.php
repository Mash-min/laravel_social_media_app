<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
        $user = User::create($request->all() + [
            'slug' => 'user'.'-'.time().'-'.rand()
        ]);
        return response()->json(['user' => $user]);
    }
}

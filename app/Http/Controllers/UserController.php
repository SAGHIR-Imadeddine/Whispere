<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function search(Request $request)
    {
        $name = $request->input('unique_identifier');
        $users = User::where('unique_identifier', 'like', '%' . $name . '%')->get();

        return view('chat', ['users' => $users]);
    }
}

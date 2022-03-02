<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function userListView()
    {
        // Get all users without login user
        $users = User::where('id', '!=', auth()->id())->get();
        return view('user.index', compact('users'));
    }
}

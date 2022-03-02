<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FileInfo;
use App\Models\FileGroupInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $total_users = User::count();
        // without admin
        $total_users = $total_users - 1;

        $total_files = FileInfo::count();
        $total_groups = FileInfo::sum('group');
        $total_contacts = FileGroupInfo::count();

        return view('dashboard', compact('total_users', 'total_files', 'total_groups', 'total_contacts'));
    }
}

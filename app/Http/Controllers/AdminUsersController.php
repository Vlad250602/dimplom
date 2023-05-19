<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function index()
    {
        $data = User::paginate(10);
        return view('admin-users',
            ['data' => $data]);
    }
}

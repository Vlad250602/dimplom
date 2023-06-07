<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUsersController extends Controller
{
    public function index()
    {
        if (Auth::user()->admin == 0){
            return redirect()->route('main');
        }

        $data = User::paginate(10);
        return view('admin-users', ['data' => $data]);
    }
}

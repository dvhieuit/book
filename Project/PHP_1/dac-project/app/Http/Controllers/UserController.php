<?php

namespace App\Http\Controllers;

use App\Enum\UserRoles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Show the list user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = $this->getUserList();
        return view('layouts.users.index', compact('users'));
    }

    public function createUser()
    {

    }

    public function deleteUser(Request $request)
    {
        User::where('id', $request->id)->delete();

        $users = self::getUserList();
        return view('components.users.list', compact('users'));
    }

    private function getUserList()
    {
        return User::select('id', 'email', 'fullname', 'phone_number')->where('role_id', '<>', UserRoles::ADMIN)->get();
    }
}

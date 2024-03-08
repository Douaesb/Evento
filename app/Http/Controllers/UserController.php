<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewUsers()
    {
        $users = User::where('role', '<>', 'admin')->get();
        return view('admin.users', compact('users'));
    }

    public function banUser($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->update(['banned' => true]);
            if (auth()->check() && auth()->user()->id == $userId) {
                auth()->logout();
                return redirect()->route('login')->with('banned_message', 'You are banned from logging in.');
            }

            return redirect()->route('users')->with('success', 'User has been banned.');
        }

        return redirect()->route('users')->with('error', 'User not found.');
    }

    public function unbanUser($userId)
{
    $user = User::find($userId);
    if ($user) {
        $user->update(['banned' => false]);
        return redirect()->route('users')->with('success', 'User unbanned successfully.');
    }
    return redirect()->route('users')->with('error', 'User not found.');
}

}

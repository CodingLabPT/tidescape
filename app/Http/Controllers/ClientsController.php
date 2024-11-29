<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ClientsController extends Controller
{
    public function show() {
        $users = User::whereNot('role', 'admin')->get();

        return view('admin.Pages.clients', compact('users'));
    }

    public function destroy($id) {

        User::destroy($id);
        return redirect()->back()->with('success', __('backend/Pages/admins.user_delete'));
    }
}

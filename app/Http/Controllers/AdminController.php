<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Tour;
use App\Models\Reserve;
use App\Models\Newsletter;
use App\Models\User;


class AdminController extends Controller
{
    public function AdminDashboard() {
        $tours = Tour::all();
        $reserves = Reserve::all();
        $newsletters = Newsletter::all();
        $users = User::all();

        return view('admin.admin_dashboard', compact('tours','reserves','newsletters','users'));
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminLogin() {
        return view('/login');
    }

    public function destroy($id) {

        User::destroy($id);
        return redirect()->back()->with('success', __('backend/Pages/admins.admin_delete'));
    }

    public function show() {
        $users = User::where('role', 'admin')->get();
        return view('admin.Pages.admins',compact('users'));
    }


}

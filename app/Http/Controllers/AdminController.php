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

    public function deleteAdmins($id) {

        User::destroy($id);
        return redirect()->back()->with('success', __('backend/Pages/admins.admin_delete'));
    }

    public function deleteClients($id) {

        User::destroy($id);
        return redirect()->back()->with('success', __('backend/Pages/admins.user_delete'));
    }

    public function AdminDashboardCalendary() {

        $events = array();
        $reserves = Reserve::all();

        foreach($reserves as $reserve) {
            $color = null;

            if($reserve->status == 'Active') {
                $color = '#008000';

            } else if ($reserve->status == 'Waiting') {
                $color = '#FF7F50';
            }

            $events[] =  [
                'title' =>  $reserve->id,
                'start' => $reserve->checkin,
                'end' => $reserve->checkin,
                'color' => $color,
            ];
        }

        $reserves = json_encode($events);

        return view('admin.Pages.calendary',compact('events','reserves','reserves'));
    }

    public function AdminDashboardAdmins() {
        $users = User::where('role', 'admin')->get();
        return view('admin.Pages.admins',compact('users'));
    }

    public function AdminDashboardClients() {
        $users = User::whereNot('role', 'admin')->get();

        return view('admin.Pages.clients', compact('users'));
    }


}

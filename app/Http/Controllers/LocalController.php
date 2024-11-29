<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\TourRequest;
use App\Mail\ContactResponse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Models\Tour;
use App\Models\Reserve;
use App\Models\Newsletter;
use App\Models\User;
use App\Models\Contact;
use App\Models\Boat;

use App\Models\Local;
use App\Models\Duration;

class LocalController extends Controller
{
    public function store(Request $request) {
        $local = new Local;
        $local->name = $request->name;
        $local->save();
        return redirect()->route('locals.show')->with('success', __('backend/Pages/admins.local_create'));
    }

    public function show() {
        $locals = Local::all();
        return view('admin.Pages.locals', compact('locals'));
    }

    public function create() {
        return view ("admin.Pages.addLocalForm");
    }

    public function delete($id) {

        Local::destroy($id);
        return redirect()->route('locals.show')->with('success', __('backend/Pages/admins.local_delete'));
    }

    public function details($id) {
        $local = Local::findOrFail($id);

        return view('admin.Pages.locals.{id}',compact('local'));
    }

    public function edit(Request $request, $id) {
        $local = Local::findOrFail($id);

        $local->name = $request->name;

        $local->save();

        return redirect()->route('locals.show')->with('success', __('backend/Pages/admins.local_update'));
    }

}

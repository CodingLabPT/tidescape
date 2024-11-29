<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\Duration;

class DurationController extends Controller
{
    public function store(Request $request) {

        $duration = new Duration;
        $duration->name = $request->name;
        $duration->save();
        return redirect()->route('durations.show')->with('success', __('backend/Pages/admins.duration_create'));
    }

    public function show() {
        $durations = Duration::all();
        return view('admin.Pages.durations', compact('durations'));
    }
    public function create() {
        return view ("admin.Pages.addDurationForm");
    }

    public function delete($id) {
        Duration::destroy($id);
        return redirect()->route('durations.show')->with('success', __('backend/Pages/admins.duration_delete'));
    }

    public function details($id) {
        $duration = Duration::findOrFail($id);

        return view('admin.Pages.durations.{id}', compact('duration'));
    }

    public function edit(Request $request, $id) {
        $duration = Duration::findOrFail($id);

        $duration->name = $request->name;

        $duration->save();

        return redirect()->route('durations.show')->with('success', __('backend/Pages/admins.duration_update'));
    }



}

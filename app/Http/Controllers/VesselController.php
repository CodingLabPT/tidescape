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

class VesselController extends Controller
{
    public function store(Request $request) {

        $boat = new Boat;

        $boat->tipo = $request->name;
        $boat->img = $request->img;
        $boat->img2 = $request->img2;
        $boat->img3 = $request->img3;
        $boat->descricao = $request->obs;


        if($request->img) {
            //$tour->img = $request->img->store('public/images');

            $path = 'assets/img/boats';

            $imageName = md5($request->img->getClientOriginalName() . strtotime("now")) . "." . $request->img->extension();
            $boat->img = $request->img->move(($path), $imageName);
        }

        if($request->img2) {
            //$tour->img = $request->img->store('public/images');

            $path2 = 'assets/img/boats';

            $imageName2 = md5($request->img2->getClientOriginalName() . strtotime("now")) . "." . $request->img2->extension();
            $boat->img2 = $request->img2->move(($path2), $imageName2);
        }

        if($request->img3) {
            //$tour->img = $request->img->store('public/images');

            $path3 = 'assets/img/boats';

            $imageName3 = md5($request->img3->getClientOriginalName() . strtotime("now")) . "." . $request->img3->extension();
            $boat->img3 = $request->img3->move(($path3), $imageName3);
        }


        $boat->save();

        return redirect()->route('boats.show')->with('success', __('backend/Pages/admins.new_vessel_success'));
    }

    public function show() {
        $boats = Boat::all();
        return view('admin.Pages.configs', compact('boats'));
    }

    public function create() {
        return view ("admin.Pages.addBoatForm");
    }

    public function delete($id) {
        Boat::destroy($id);
        return redirect()->route('boats.show')->with('success', __('backend/Pages/admins.vessel_deleted_success'));
    }

    public function details($id) {
        $boat = Boat::findOrFail($id);
        return view('admin.Pages.configs.{id}', compact('boat'));
    }

    public function edit(Request $request, $id) {
        $boat = Boat::findOrFail($id);

        $boat->tipo       =  $request->type;
        $boat->descricao  =  $request->obs;

        if($request->img) {
            //$tour->img = $request->img->store('public/images');

            $path = 'assets/img/boats';

            $imageName = md5($request->img->getClientOriginalName() . strtotime("now")) . "." . $request->img->extension();
            $boat->img = $request->img->move(($path), $imageName);
        }

        if($request->img2) {
            //$tour->img = $request->img->store('public/images');

            $path2 = 'assets/img/boats';

            $imageName2 = md5($request->img2->getClientOriginalName() . strtotime("now")) . "." . $request->img2->extension();
            $boat->img2 = $request->img2->move(($path2), $imageName2);
        }

        if($request->img3) {
            //$tour->img = $request->img->store('public/images');

            $path3 = 'assets/img/boats';

            $imageName3 = md5($request->img3->getClientOriginalName() . strtotime("now")) . "." . $request->img3->extension();
            $boat->img3 = $request->img3->move(($path3), $imageName3);
        }

        $boat->save();

        return redirect()->route('boats.show')->with('success', __('backend/Pages/admins.vessel_updated_success'));
    }
}

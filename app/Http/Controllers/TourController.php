<?php

namespace App\Http\Controllers;

use App\Http\Requests\TourRequest;
use App\Models\Tour;
use App\Models\Local;
use App\Models\Duration;
use App\Models\Boat;

use Illuminate\Http\Request;


class TourController extends Controller
{

    public function show() {
        $tours = Tour::all();
        return view('admin.Pages.tours', compact('tours'));
    }


    public function create() {
        $locals = Local::all();
        $durations = Duration::all();
        $boats = Boat::all();

        return view ("admin.Pages.addTourForm",compact('locals','durations','boats'));
    }


    public function store(TourRequest $request) {

        $tour = new Tour;

        $tour->name = $request->name;
        $tour->local = $request->local;
        $tour->duration = $request->duration;
        $tour->ep = $request->ep;
        $tour->eg = $request->eg;
        $tour->emg = $request->emg;
        $tour->obs = $request->obs;
        $tour->destaque = $request->destaque;

        $precoMaximo = max($request->ep, $request->eg, $request->emg);

        $tour->price = $precoMaximo;

        if($request->img) {
            //$tour->img = $request->img->store('public/images');

            $path = 'assets/img/tours';

            $imageName = md5($request->img->getClientOriginalName() . strtotime("now")) . "." . $request->img->extension();
            $tour->img = $request->img->move(($path), $imageName);
        }

        if($request->img2) {
            //$tour->img = $request->img->store('public/images');

            $path2 = 'assets/img/tours';

            $imageName2 = md5($request->img2->getClientOriginalName() . strtotime("now")) . "." . $request->img2->extension();
            $tour->img2 = $request->img2->move(($path2), $imageName2);
        }

        if($request->img3) {
            //$tour->img = $request->img->store('public/images');

            $path3 = 'assets/img/tours';

            $imageName3 = md5($request->img3->getClientOriginalName() . strtotime("now")) . "." . $request->img3->extension();
            $tour->img3 = $request->img3->move(($path3), $imageName3);
        }

        if($request->ep == "0" and $request->eg == "0" and $request->emg == "0") {
            return redirect()->back()->with('error', __('backend/Pages/admins.tour_no_create'));
        } else {

        $tour->save();

        return redirect()->route('tours.show')->with('success', __('backend/Pages/admins.tour_create'));
        }
    }

    public function details($id) {
        $tour = Tour::findOrFail($id);
        $locals = Local::all();
        $durations = Duration::all();
        return view('admin.Pages.tours.{id}',compact('tour','locals','durations'));
    }

    public function delete($id) {
        Tour::destroy($id);
        return redirect()->route('tours.show')->with('success', __('backend/Pages/admins.tour_delete'));
    }

    public function edit(Request $request, $id) {

        $tour = Tour::findOrFail($id);

        $tour->name     =  $request->name;
        $tour->local    =  $request->local;
        $tour->duration =  $request->duration;
        $tour->ep       =  $request->ep;
        $tour->eg       =  $request->eg;
        $tour->emg      =  $request->emg;
        $tour->destaque =  $request->destaque;
        $tour->obs      =  $request->obs;


        $tour->price = max($request->ep, $request->eg, $request->emg);

        if($request->img) {
            //$tour->img = $request->img->store('public/images');

            $path = 'assets/img/tours';

            $imageName = md5($request->img->getClientOriginalName() . strtotime("now")) . "." . $request->img->extension();
            $tour->img = $request->img->move(($path), $imageName);
        }

        if($request->img2) {
            //$tour->img = $request->img->store('public/images');

            $path2 = 'assets/img/tours';

            $imageName2 = md5($request->img2->getClientOriginalName() . strtotime("now")) . "." . $request->img2->extension();
            $tour->img2 = $request->img2->move(($path2), $imageName2);
        }

        if($request->img3) {
            //$tour->img = $request->img->store('public/images');

            $path3 = 'assets/img/tours';

            $imageName3 = md5($request->img3->getClientOriginalName() . strtotime("now")) . "." . $request->img3->extension();
            $tour->img3 = $request->img3->move(($path3), $imageName3);
        }


        $tour->save();

        return redirect()->route('tours.show')->with('success', __('backend/Pages/admins.update_tour'));
    }
}

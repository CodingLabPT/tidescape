<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

use Illuminate\Http\RedirectResponse;


use App\Models\Tour;

class LoginController extends Controller
{
    public function login($id)
    {
        return view('auth.login2',compact('id'));
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $idTour = $request->tour;

        $tour = Tour::find($idTour);

        $slug = Str::slug($tour->name, '-');


        $url = '';

        if($request->user()->role === 'admin') {
            $url = 'tour/'.$idTour .'/' . $slug . '';
        }elseif($request->user()->role === 'agent') {
            $url = 'tour/'.$idTour .'/' . $slug . '';
        } elseif($request->user()->role === 'user') {
            $url = 'tour/'.$idTour .'/' . $slug . '';
        }

        return redirect()->intended($url);
    }
}

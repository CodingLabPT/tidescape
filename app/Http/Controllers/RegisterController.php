<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\View\View;
use Illuminate\Support\Str;

use App\Models\Tour;

class RegisterController extends Controller
{
    public function register($id): View
    {
        return view('auth.register2')->with(['id' => $id]);
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        // Inicializa a variável $foto como null
        $foto = null;

        // Verifica se a foto de perfil foi enviada e é válida
        if ($request->hasFile('profile_photo') && $request->file('profile_photo')->isValid()) {
            $path = 'assets/img/profile_photo';

            $imageName = md5($request->profile_photo->getClientOriginalName() . strtotime("now")) . "." . $request->profile_photo->extension();
            $foto = $request->profile_photo->move($path, $imageName);
        } else {
            // Se a foto não for fornecida, define como NULL
            $foto = null; // ou você pode simplesmente não fazer nada aqui
        }


        $user = User::create([
            'fn' => $request->fn,
            'ln' => $request->ln,
            'nif' => $request->nif ?? '000', // Preenche com "000" se $request->nif não for fornecido
            'email' => $request->email,
            'phone' => $request->phone,
            'photo' => $foto,
            'remember_token' =>  Str::random(10),
            'password' => Hash::make($request->password),
        ]);

        /*
        $sent = Mail::to($request->email, '')->send(new \App\Mail\Register([
            'fromNameFn' => $request->fn,
            'fromNameLn' => $request->ln,
            'fromEmail' => $request->email,
            'fromPhone' => $request->phone,
            'fromPassword' => $request->password,
            'subject' => 'noreply@tidescape.pt',
        ]));
        */

        event(new Registered($user));

        Auth::login($user);


        $idTour = $request->tour;
        $tour = Tour::find($idTour);

        if (!$tour) {
            return redirect()->back()->withErrors(['tour' => 'Tour not found.']);
        }

        $slug = Str::slug($tour->name, '-');

        $url = 'tour/'.$idTour .'/' . $slug . '';

        $emailUniqueMessage = __('auth.login.auto');

        return redirect()->intended($url)->with('success',$emailUniqueMessage);
        //return redirect(RouteServiceProvider::HOME);
    }
}

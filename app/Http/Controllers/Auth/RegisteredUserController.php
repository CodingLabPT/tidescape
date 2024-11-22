<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\Register;
use App\Models\User;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\View\View;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
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


        // Envio do e-mail
        $firstName    = $request->fn;
        $lastName    = $request->ln;
        $email = $request->email;
        $phone = $request->phone;
        $password  = $request->password;
        $locale = App::getLocale();

        Mail::to($email)->send(new Register($firstName,$lastName,$email, $phone, $password, $locale));

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('success', __('backend/Pages/admins.user_registered_success'));
    }
}


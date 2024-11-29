<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Mail\Newsletters;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        // Traduzir a mensagem de erro usando GoogleTranslate
        $emailUniqueMessage = __('mensages.newsletter_error');
        $emailSuccessMessage = __('mensages.newsletter_success');

        // Validação do e-mail com mensagem personalizada
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,email',
        ], [
            'email.unique' => $emailUniqueMessage,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Armazenar o e-mail na base de dados
        Newsletter::create([
            'email' => $request->email,
        ]);

        // Preparando o email
        $email = $request->email;
        $email2 = "info@tidescape.pt";
        $locale = App::getLocale();

        Mail::to($email)->send(new Newsletters($email, $locale));
        Mail::to($email2)->send(new Newsletters($email, $locale));

        // Redirecionar com mensagem de sucesso
        return redirect()->back()->with('success', __($emailSuccessMessage));
    }
    public function destroy($id) {
        Newsletter::destroy($id);
        return redirect()->back()->with('success', __('backend/Pages/admins.email_delete'));
    }

    public function show() {
        $newsletters = Newsletter::all();
        return view('admin.Pages.newsletters', compact('newsletters'));
    }
}

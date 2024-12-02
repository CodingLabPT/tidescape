<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;

use App\Http\Controllers\Controller;

use App\Mail\ContactResponse;
use App\Mail\Contacts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Mail;


use App\Models\Contact;

class ContactController extends Controller
{
    public function store(ContactRequest $request) {

        // Criação do contato usando atribuição em massa
        $contact = Contact::create([
            'fn' => $request->fn,
            'ln' => $request->ln,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'resposta' => "",
            'status' => "Pendent",
        ]);

        // Preparação dos dados para o envio do e-mail
        $locale = App::getLocale();
        $name = "{$request->fn} {$request->ln}";
        $status = "Pendent";
        $msg_criada_em = $contact->created_at;

        // Envio dos e-mails
        Mail::to($request->email)->send(new Contacts($locale, $name, $request->email, $status, $request->phone, "", $request->message, $msg_criada_em));
        Mail::to("info@tidescape.pt")->send(new Contacts($locale, $name, $request->email, $status, $request->phone, "", $request->message, $msg_criada_em));

        return redirect()->back()->with('success', __('backend/Pages/messages.send_success'));
    }

    public function allcontactsShow() {
        $contacts = Contact::all();
        return view('admin.Pages.contacts', compact('contacts'));
    }

    public function details($id) {
        $contact = Contact::findOrFail($id);
        return view('admin.Pages.contacts.{id}',compact('contact'));
    }

    public function destroy($id) {
        Contact::destroy($id);
        return redirect()->route('allcontacts.show')->with('success', __('backend/Pages/admins.contact_delete'));
    }

    public function edit(Request $request, $id) {
        $contact = Contact::findOrFail($id);

        $contact->resposta = $request->response;

        $message = $request->message;

        $email = $contact->email;

        $contact->status   = "Solved";

        $contact->save();

        $status = $contact->status;

        $msg = $message;
        $resp = $request->response;

        $resp_obtida_em = $contact->updated_at;
        $msg_enviada_em = $contact->created_at;

        $locale = App::getLocale();

        Mail::to($email)->send(new ContactResponse($locale, $status, $msg, $resp, $resp_obtida_em, $msg_enviada_em));

        return redirect()->route('allcontacts.show')->with('success', __('backend/Pages/admins.response_success'));
    }


}

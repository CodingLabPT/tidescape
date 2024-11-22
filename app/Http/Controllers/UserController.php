<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\Models\Tour;
use App\Models\Reserve;
use App\Models\Newsletter;

use App\Models\Contact;

class UserController extends Controller
{
    public function UserDashboard() {
        $user = Auth::user();

        $email = $user->email;

        $contactQuery    = Contact::where('email', $email)->get();
        $reserveQuery    = Reserve::where('email', $email)->get();
        $newsletterQuery = Newsletter::where('email', $email)->get();

        return view('admin.user_dashboard')->with(['contactQuery' => $contactQuery, 'reserveQuery' => $reserveQuery, 'newsletterQuery' => $newsletterQuery]);
    }

    public function UserReservations() {

        $user = Auth::user();
        $email = $user->email;

        $reserveQuery = Reserve::where('email', $email)->get();



        return view('admin.Pages.myreservations')->with(['reserveQuery' => $reserveQuery]);
    }

    public function UserDashboardListOfReservationsDetails($id) {
        $reserve = Reserve::findOrFail($id);

        $idtour = $reserve->id_tour;

        /*  TOUR QUERYS
        */
        $tourQuery = Tour::where('id', $idtour)->get();

        $tourName = $tourQuery[0]->name;
        $tourLocal = $tourQuery[0]->local;
        $tourDuration = $tourQuery[0]->duration;
        $tourEP = $tourQuery[0]->ep;
        $tourEG = $tourQuery[0]->eg;
        $tourEMG = $tourQuery[0]->emg;

        return view('admin.Pages.myreservations.{id}',['reserve' => $reserve, 'tourName' => $tourName, 'tourEP' => $tourEP, 'tourEG' => $tourEG, 'tourEMG' => $tourEMG, 'tourLocal' => $tourLocal, 'tourDuration' => $tourDuration]);
    }

    public function deleteReserve($id) {


        Reserve::destroy($id);
        return redirect()->back()->with('success', __('backend/Pages/myReserves.delete'));
    }

    public function UserDashboardCalendary() {

        $user = Auth::user();
        $email = $user->email;

        $events = array();
        $reserves = Reserve::where('email', $email)->get();

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

        return view('admin.Pages.mycalendary',['events' => $events, 'reserves'=> $reserves]);
    }

    public function UserDashboardContacts() {
        $user = Auth::user();

        $email = $user->email;

        $contactQuery = Contact::where('email', $email)->get();



        return view('admin.Pages.mycontacts')->with(['contactQuery' => $contactQuery]);
    }

    public function UserDashboardListOfContactsDetails($id) {
        $contact = Contact::findOrFail($id);

        $idcontact = $contact->id;

        return view('admin.Pages.mycontacts.{id}',['contact' => $contact]);
    }

    public function deleteContact($id) {

        Contact::destroy($id);
        return redirect()->back()->with('success', __('backend/Pages/myMessages.delete'));
        ;
    }
}

<?php

namespace App\Http\Controllers;
use App\Mail\ConfirmReserves;
use App\Mail\Reserves;
use App\Mail\AdminRegister;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Models\Tour;
use App\Models\User;
use App\Models\Boat;
use Str;

class ReserveController extends Controller
{

    public function show() {
        $reserves = Reserve::orderByDesc('created_at')->get();
        return view('admin.Pages.reservations',compact('reserves'));
    }

    public function store(Request $request) {

        $user = Auth::user();

        // Validação do tipo de embarcação
        $request->validate([
            'tipo' => 'required',
        ]);

        // Criação da reserva usando atribuição em massa
        $reserve = Reserve::create([
            'id_tour' => $request->tour_id,
            'tipo_embarcacao' => $request->tipo,
            'checkin' => $request->checkin,
            'horas' => $request->horas,
            'fn' => $user->fn,
            'ln' => $user->ln,
            'email' => $user->email,
            'tel' => $user->phone,
            'status' => 'Pendent',
        ]);

        // Preparação dos dados para a view
        return view('auth.checkout', [
            'reserve' => $reserve,
            'user' => $user,
            'tourName' => $request->tour_name,
            'tourLocal' => $request->tour_local,
            'tourDuration' => $request->tour_duration,
            'tourEP' => $request->tour_ep,
            'tourEG' => $request->tour_eg,
            'tourEMG' => $request->tour_emg,
        ]);
    }

    public function create() {
        $boats = Boat::all();
        $tours = Tour::all();
        return view("admin.Pages.addReservationForm", compact('tours', 'boats'));
    }

    public function delete($id) {
        Reserve::destroy($id);
        return redirect()->back()->with('success', __('backend/Pages/admins.reserve_delete'));
    }

    public function adminReserveStore(Request $request) {

        $dataForm = $request->all();

        $tour = $dataForm['tour'];
        $email = $dataForm['email'];

        $queryTour = "Select name from tours where id = '$tour'";
        $result = DB::select($queryTour);

        $queryEmail = "Select email from users where email = '$email'";
        $resultEmail = DB::select($queryEmail);

        $sql = "Select ep, eg, emg from tours where id='$tour'";
        $precos = DB::select($sql);

        //dd($boat, $precos[0]->ep, $precos[0]->eg, $precos[0]->emg);

        if($request->boat == 1) {
            if($precos[0]->ep == 0) {
                return redirect()->route('admin.dashboard.reservations')->with('error', __('backend/Pages/reserves.error_creating'));
            }

        } else if($request->boat == 2) {
            if($precos[0]->eg == 0) {
                return redirect()->route('admin.dashboard.reservations')->with('error', __('backend/Pages/reserves.error_creating'));
            }
        } else {
            if($precos[0]->emg == 0) {
                return redirect()->route('admin.dashboard.reservations')->with('error', __('backend/Pages/reserves.error_creating'));
            }
        }

        if($request->boat == 1) {
            $request->boat = "small";
        } else if ($request->boat == 2) {
            $request->boat = "big";
        } else {
            $request->boat = "large";
        }

        if($resultEmail) {

        } else {
            $user = new User;
            $user->fn       = $request->fn;
            $user->ln       = $request->ln;
            $user->nif      = '000000000';
            $user->email    = $request->email;
            $user->phone    = $request->phone;
            $password       = Str::password(length: 16, letters: true, numbers: true, symbols: false, spaces: false);
            $user->password = Hash::make($password);
            $user->save();

            $email = $request->email;
            $fn = $request->fn;
            $ln = $request->ln;
            $userpassword = $password;
            $phone = $request->phone;

            // email confirmar novo utilizador registado pois o email cadastrada na reserva ainda nao constava no site
            Mail::to($email)->send(new AdminRegister($email, $fn, $ln, $phone, $userpassword));
        }

        $reserve = new Reserve;

        $reserve->fn                = $request->fn;
        $reserve->ln                = $request->ln;
        $reserve->email             = $request->email;
        $reserve->tel               = $request->phone;
        $reserve->id_tour           = $request->tour;
        $reserve->tipo_embarcacao   = $request->boat;
        $reserve->checkin           = $request->checkin;
        $reserve->horas             = $request->horas;

        $reserve->status            = "Active";

        /* preparação do email */
        $email = $request->email;
        $email2 = "bookings@tidescape.pt";
        $dia = $request->checkin;
        $hora = $request->horas;
        $tour = $result[0]->name;
        $boat = $request->boat;
        $fn = $request->fn;
        $ln = $request->ln;
        $phone = $request->phone;

        $locale = App::getLocale();

        Mail::to($email)->send(new ConfirmReserves($email, $phone, $tour, $dia, $hora, $boat, $locale));
        Mail::to($email2)->send(new ConfirmReserves($email, $phone, $tour, $dia, $hora, $boat, $locale));

        $reserve->save();

        return redirect()->route('admin.dashboard.reservations')->with('success', __('backend/Pages/reserves.turn_active'));

    }

    public function successReserve($id, Request $request) {
        $user = Auth::user();

        $reserve = Reserve::findOrFail($id);

        $idTour = $reserve->id_tour;

        $tourName = Tour::where('id', $idTour)->first()->name;

        $reserve->status = 'Waiting';

        $reserve->save();

        $email = $user->email;
        $email2 = "bookings@tidescape.pt";
        $phone = $user->phone;
        $day = $reserve->checkin;
        $time = $reserve->horas;
        $boat = $reserve->tipo_embarcacao;

        $locale = App::getLocale();

        Mail::to($email)->send(new Reserves($email, $phone, $tourName, $day, $time, $boat, $locale));
        Mail::to($email2)->send(new Reserves($email, $phone, $tourName, $day, $time, $boat, $locale));

        return view('auth.success', compact('user','reserve'));
    }

    public function validateReserve($id, Request $request) {

        $request->validate([
            'validate'  => 'required',
        ]);

        $user = Auth::user();

        $reserve = Reserve::findOrFail($id);

        $idTour = $reserve->id_tour;

        $tourName = Tour::where('id', $idTour)->first()->name;


        $reserve->status = 'Active';

        $reserve->save();

        $email = $reserve->email;
        $email2 = "bookings@tidescape.pt";
        $phone = $user->phone;
        $day = $reserve->checkin;
        $time = $reserve->horas;
        $boat = $reserve->tipo_embarcacao;

        $locale = App::getLocale();

        Mail::to($email)->send(new ConfirmReserves($locale, $email, $phone, $tourName, $day, $time, $boat));
        Mail::to($email2)->send(new ConfirmReserves($locale, $email, $phone, $tourName, $day, $time, $boat));

        return redirect()->route('admin.dashboard.reservations')->with('success', __('backend/Pages/reserves.turn_active'));
    }

    public function details($id) {
        $reserve = Reserve::findOrFail($id); // 4377

        $idtour = $reserve->id_tour; // 2

        /*  TOUR QUERYS
        */
        $tourQuery = Tour::where('id', $idtour)->get();

        $tourName = $tourQuery[0]->name;
        $tourLocal = $tourQuery[0]->local;
        $tourDuration = $tourQuery[0]->duration;
        $tourEP = $tourQuery[0]->ep;
        $tourEG = $tourQuery[0]->eg;
        $tourEMG = $tourQuery[0]->emg;

        return view('admin.Pages.reservations.{id}',compact('reserve','tourName','tourEP','tourEG','tourEMG','tourLocal','tourDuration','tourDuration'));
    }


}



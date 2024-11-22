<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Brand;
use App\Models\Tour;

use App\Models\Local;
use App\Models\Duration;
use App\Models\Boat;
use App\Models\Reserve;

class FrontEndController extends Controller
{

    public function home() {

        $data['tour'] = Tour::where('destaque', 'sim')->get();
        $data['locals'] = Local::all();
        $data['brands'] = Brand::all();
        $data['user'] = Auth::user();

        return view('frontend.home.home', $data);
    }

    public function category(Request $request) {

        $user      = Auth::user();
        $locals    = Local::all();
        $durations = Duration::all();
        $boats     = Boat::all();

        $query = Tour::query();

        $tours = $query->paginate(4); // 4 é o número de itens por página

        $tourWith1h = Tour::where('duration','=','1h')->count();
        $tourWith2h = Tour::where('duration','=','2h')->count();
        $tourWith3h = Tour::where('duration','=','3h')->count();
        $tourWith4h = Tour::where('duration','=','4h')->count();
        $tourWith5h = Tour::where('duration','=','5h')->count();
        $tourWith6h = Tour::where('duration','=','6h')->count();
        $tourWith7h = Tour::where('duration','=','7h')->count();
        $tourWith8h = Tour::where('duration','=','8h')->count();
        $tourWith9h = Tour::where('duration','=','9h')->count();
        $tourWith10h = Tour::where('duration','=','10h')->count();
        $tourWith11h = Tour::where('duration','=','11h')->count();
        $tourWith12h = Tour::where('duration','=','12h')->count();

        // Conta o número total de tours onde "eg" é diferente de zero
        $totalToursWithEgNotZero = Tour::where('eg', '!=', 0)->count();

        return view('frontend.category', compact('tours','user','locals','durations','boats','tourWith1h','tourWith2h','tourWith3h','tourWith4h','tourWith5h','tourWith6h','tourWith7h','tourWith8h','tourWith9h','tourWith10h','tourWith11h','tourWith12h','totalToursWithEgNotZero'));
    }

    public function categoryfilter(Request $request) {

        $user      = Auth::user();
        $locals    = Local::all();
        $durations = Duration::all();
        $boats     = Boat::all();

        // Inicia a consulta para buscar os tours
        $tours = Tour::query();

        // Filtro de local
        $requestLocal = $request->input('local');
        if ($requestLocal && $requestLocal !== 'Select a location') {
            $tours->where('local', 'LIKE', '%' . $requestLocal . '%');
        }

        // Filtros de preço
        if ($request->has('min_price') && $request->input('min_price') !== '') {
            $minPrice = $request->input('min_price');
            if (is_numeric($minPrice)) {
                $tours->where('price', '>=', $minPrice);
            }
        }

        if ($request->has('max_price') && $request->input('max_price') !== '') {
            $maxPrice = $request->input('max_price');
            if (is_numeric($maxPrice)) {
                $tours->where('price', '<=', $maxPrice);
            }
        }

        // Verifica se o checkbox "vessel" foi marcado
        if ($request->has('vessel')) {
            // Filtra os tours onde a coluna "eg" é diferente de zero
            $tours->where('eg', '!=', 0);
        }

        // Verifica se o filtro de duração foi aplicado
        if ($request->has('duration')) {
            // Filtra os tours onde a duração está entre as opções selecionadas
            $durationsAll = $request->input('duration'); // Obtém as durações selecionadas

            // Adiciona a condição para filtrar por duração
            $tours->whereIn('duration',$durationsAll);
        }

        // Executa a consulta e obtém os resultados
        $tours = $tours->paginate(4); // 4 é o número de itens por página

        $tourWith1h = Tour::where('duration','=','1h')->count();
        $tourWith2h = Tour::where('duration','=','2h')->count();
        $tourWith3h = Tour::where('duration','=','3h')->count();
        $tourWith4h = Tour::where('duration','=','4h')->count();
        $tourWith5h = Tour::where('duration','=','5h')->count();
        $tourWith6h = Tour::where('duration','=','6h')->count();
        $tourWith7h = Tour::where('duration','=','7h')->count();
        $tourWith8h = Tour::where('duration','=','8h')->count();
        $tourWith9h = Tour::where('duration','=','9h')->count();
        $tourWith10h = Tour::where('duration','=','10h')->count();
        $tourWith11h = Tour::where('duration','=','11h')->count();
        $tourWith12h = Tour::where('duration','=','12h')->count();

        // Conta o número total de tours onde "eg" é diferente de zero
        $totalToursWithEgNotZero = Tour::where('eg', '!=', 0)->count();

        return view('frontend.category', compact('tours','user','locals','durations','boats','tourWith1h','tourWith2h','tourWith3h','tourWith4h','tourWith5h','tourWith6h','tourWith7h','tourWith8h','tourWith9h','tourWith10h','tourWith11h','tourWith12h','totalToursWithEgNotZero'));
    }


    public function offers(Request $request) {

        $user      = Auth::user();
        $locals    = Local::all();
        $durations = Duration::all();
        $boats     = Boat::all();

        $query = Tour::query();

        $tours = $query->paginate(4); // 4 é o número de itens por página

        $tourWith1h = Tour::where('duration','=','1h')->count();
        $tourWith2h = Tour::where('duration','=','2h')->count();
        $tourWith3h = Tour::where('duration','=','3h')->count();
        $tourWith4h = Tour::where('duration','=','4h')->count();
        $tourWith5h = Tour::where('duration','=','5h')->count();
        $tourWith6h = Tour::where('duration','=','6h')->count();
        $tourWith7h = Tour::where('duration','=','7h')->count();
        $tourWith8h = Tour::where('duration','=','8h')->count();
        $tourWith9h = Tour::where('duration','=','9h')->count();
        $tourWith10h = Tour::where('duration','=','10h')->count();
        $tourWith11h = Tour::where('duration','=','11h')->count();
        $tourWith12h = Tour::where('duration','=','12h')->count();

        // Conta o número total de tours onde "eg" é diferente de zero
        $totalToursWithEgNotZero = Tour::where('eg', '!=', 0)->count();

        return view('frontend.offers', compact('tours','user','locals','durations','boats','tourWith1h','tourWith2h','tourWith3h','tourWith4h','tourWith5h','tourWith6h','tourWith7h','tourWith8h','tourWith9h','tourWith10h','tourWith11h','tourWith12h','totalToursWithEgNotZero'));
    }

    public function offersfilter(Request $request) {

        $user      = Auth::user();
        $locals    = Local::all();
        $durations = Duration::all();
        $boats     = Boat::all();

        // Inicia a consulta para buscar os tours
        $tours = Tour::query();

        // Filtro de local
        $requestLocal = $request->input('local');
        if ($requestLocal && $requestLocal !== 'Select a location') {
            $tours->where('local', 'LIKE', '%' . $requestLocal . '%');
        }

        // Filtros de preço
        if ($request->has('min_price') && $request->input('min_price') !== '') {
            $minPrice = $request->input('min_price');
            if (is_numeric($minPrice)) {
                $tours->where('price', '>=', $minPrice);
            }
        }

        if ($request->has('max_price') && $request->input('max_price') !== '') {
            $maxPrice = $request->input('max_price');
            if (is_numeric($maxPrice)) {
                $tours->where('price', '<=', $maxPrice);
            }
        }

        // Verifica se o checkbox "vessel" foi marcado
        if ($request->has('vessel')) {
            // Filtra os tours onde a coluna "eg" é diferente de zero
            $tours->where('eg', '!=', 0);
        }

        // Verifica se o filtro de duração foi aplicado
        if ($request->has('duration')) {
            // Filtra os tours onde a duração está entre as opções selecionadas
            $durationsAll = $request->input('duration'); // Obtém as durações selecionadas

            // Adiciona a condição para filtrar por duração
            $tours->whereIn('duration',$durationsAll);
        }

        // Executa a consulta e obtém os resultados
        $tours = $tours->paginate(4); // 4 é o número de itens por página

        $tourWith1h = Tour::where('duration','=','1h')->count();
        $tourWith2h = Tour::where('duration','=','2h')->count();
        $tourWith3h = Tour::where('duration','=','3h')->count();
        $tourWith4h = Tour::where('duration','=','4h')->count();
        $tourWith5h = Tour::where('duration','=','5h')->count();
        $tourWith6h = Tour::where('duration','=','6h')->count();
        $tourWith7h = Tour::where('duration','=','7h')->count();
        $tourWith8h = Tour::where('duration','=','8h')->count();
        $tourWith9h = Tour::where('duration','=','9h')->count();
        $tourWith10h = Tour::where('duration','=','10h')->count();
        $tourWith11h = Tour::where('duration','=','11h')->count();
        $tourWith12h = Tour::where('duration','=','12h')->count();

        // Conta o número total de tours onde "eg" é diferente de zero
        $totalToursWithEgNotZero = Tour::where('eg', '!=', 0)->count();

        return view('frontend.offers', compact('tours','user','locals','durations','boats','tourWith1h','tourWith2h','tourWith3h','tourWith4h','tourWith5h','tourWith6h','tourWith7h','tourWith8h','tourWith9h','tourWith10h','tourWith11h','tourWith12h','totalToursWithEgNotZero'));
    }


    /*  PROPERTYS /tour
    */
    public function show($id, $name) {
        $user = Auth::user();

        $smallBoat = Boat::where('id', 1)->get();
        $bigBoat = Boat::where('id', 2)->get();
        $largeBoat = Boat::where('id', 3)->get();
        $tour = Tour::findOrFail($id);
        $reserve = Reserve::latest('id')->first(); // the most recent record

        return view('frontend.tour',compact('smallBoat','bigBoat','largeBoat','tour','user','reserve'));

    }

    public function info() {
        $user = Auth::user();
        return view('frontend.info', compact('user'));
    }

    public function policy() {
        $user = Auth::user();
        return view('frontend.policy', compact('user'));
    }

    public function contacts() {
        $user = Auth::user();
        return view('frontend.contacts',compact('user'));
    }
}

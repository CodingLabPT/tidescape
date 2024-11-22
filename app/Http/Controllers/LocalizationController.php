<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function __invoke($locale)
    {
        if(!in_array($locale, config('localization.locales'))) {
            abort(400);
        }

        session(['localization' => $locale]);

        return redirect()->back();
    }
}

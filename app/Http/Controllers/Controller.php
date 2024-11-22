<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Excel;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function excel() {
        return view("excel_update");
    }

    public function excel_worker(Request $request) {
        Excel::import(new ExcelRader(), $request->file);
    }


}

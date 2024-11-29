<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Reserve;
use App\Models\Newsletter;
use App\Models\User;

class CalendaryController extends Controller
{
    public function show() {

        $events = array();
        $reserves = Reserve::all();

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

        return view('admin.Pages.calendary',compact('events','reserves','reserves'));
    }
}

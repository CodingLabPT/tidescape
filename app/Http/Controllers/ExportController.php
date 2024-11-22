<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Exports\NewslettersExport;
use App\Exports\ContactsExport;
use App\Exports\ReservationsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller 
{
    public function exportUsers() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportNewsletters() 
    {
        return Excel::download(new NewslettersExport, 'newsletters.xlsx');
    }

    public function exportContacts() 
    {
        return Excel::download(new ContactsExport, 'contacts.xlsx');
    }

    public function exportReservations() 
    {
        return Excel::download(new ReservationsExport, 'reservations.xlsx');
    }
}
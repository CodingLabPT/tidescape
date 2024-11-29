<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CalendaryController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DurationController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\VesselController;
use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ExportController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;

use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\UserController;

Route::get('/localization/{locale}', LocalizationController::class)->name('localization');

Route::middleware(Localization::class)->group(function(){

    Route::get('/', [FrontEndController::class, 'home'])->name('home');
    Route::post('/cadastrarContact', [ContactController::class, 'store'])->name('store.contact');
    Route::post('/cadastrarNewsletter', [NewsletterController::class, 'store'])->name('store.newsletter');

    /**
     * Property
     */
    Route::get('/tour/{id}/{name}', [FrontEndController::class, 'show'])->name('property');


    /**
     * Category
     */
    Route::get('/category', [FrontEndController::class, 'category'])->name('category');

    /* filters */
    Route::get('/categoryfilter', [FrontEndController::class, 'categoryfilter'])->name('category.filter');
    Route::get('/offersfilter', [FrontEndController::class, 'offersfilter'])->name('offers.filter');


    Route::get('/offers', [FrontEndController::class, 'offers'])->name('offers');
    Route::get('/accomodations', [FrontEndController::class, 'accomodations'])->name('accomodations');


    /**
     * Info
     */
    Route::get('/info', [FrontEndController::class, 'info'])->name('info');
    Route::get('/policy', [FrontEndController::class, 'policy'])->name('policy');

    /**
     * Contacts
     */
    Route::get('/contacts', [FrontEndController::class, 'contacts'])->name('contacts');


    /* Login2
    */
    Route::get('/login2/{id}', [LoginController::class, 'login'])->name('login.index');
    Route::post('/loginStore', [LoginController::class, 'store'])->name('login.store');

    /* Register2
    */
    Route::get('/register2/{id}', [RegisterController::class, 'register'])->name('register.index');
    Route::post('/registerStore', [RegisterController::class, 'store'])->name('register.store');


    /**
     * Dashboard
     */
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::post('/checkout', [ReserveController::class, 'store'])->name('reserve.store');
        Route::post('reserve/store', [ReserveController::class, 'reserveStore'])->name('admin.reserve.store');
        Route::any('/success/{id}', [ReserveController::class, 'successReserve'])->name('reserve.success');
        Route::any('/validate/{id}', [ReserveController::class, 'validateReserve'])->name('validate.reserve');
    });

    require __DIR__.'/auth.php';

    Route::middleware(['auth','role:user'])->group(function(){
        Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');
        Route::get('/dashboard/myreservations', [UserController::class, 'UserReservations'])->name('user.reservations');
        Route::get('/dashboard/reservations/details/{id}', [UserController::class, 'UserDashboardListOfReservationsDetails'])->name('user.dashboard.reservations.details');
        Route::get('/dashboard/reservations/delete/{id}', [UserController::class, 'deleteReserve'])->name('user.dashboard.reserveDelete');
        Route::get('/dashboard/mycalendary', [UserController::class, 'UserDashboardCalendary'])->name('user.dashboard.calendary');
        Route::get('/dashboard/mycontacts', [UserController::class, 'UserDashboardContacts'])->name('user.dashboard.contacts');
        Route::get('/dashboard/mycontacts/details/{id}', [UserController::class, 'UserDashboardListOfContactsDetails']);
        Route::get('/dashboard/mycontacts/delete/{id}', [UserController::class, 'deleteContact']);

    }); // END GROUP USER MIDDLEWARE

        Route::middleware(['auth','role:admin'])->group(function(){
        Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
        Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

        /* ADMIN DASH PAGES
        */
        Route::get('/reservations', [ReserveController::class, 'show'])->name('reservations.show');
        Route::get('reservations/create', [ReserveController::class, 'create'])->name('reservations.create');
        Route::get('reservations/details/{reserve}', [ReserveController::class, 'details'])->name('reservations.details');
        Route::get('reservations/delete/{reserve}', [ReserveController::class, 'delete'])->name('reservations.destroy');

        Route::get('/calendary', [CalendaryController::class, 'show'])->name('calendarys.show');

        Route::get('/admins', [AdminController::class, 'show'])->name('admins.show');
        Route::get('/clients', [ClientsController::class, 'show'])->name('clients.show');
        Route::get('/newsletters', [NewsletterController::class, 'show'])->name('newsletters.show');

        Route::get('/contacts', [ContactController::class, 'show'])->name('contacts.show');
        Route::get('contacts/details/{contact}', [ContactController::class, 'details'])->name('contacts.details');

        /* TOURS
        */
        Route::get('/tours', [TourController::class, 'show'])->name('tours.show');
        Route::get('tours/create', [TourController::class, 'create'])->name('tours.create');
        Route::post('tours/store', [TourController::class, 'store'])->name('tours.store');
        Route::get('tours/delete/{tour}', [TourController::class, 'delete'])->name('tours.destroy');
        Route::get('tours/details/{tour}', [TourController::class, 'details'])->name('tours.details');
        Route::put('/tours/update/{tour}', [TourController::class, 'edit'])->name('tours.update');

        /* CONTACTS
        */
        Route::put('/updateContact/{id}', [ContactController::class, 'edit'])->name('update.contact');


        /* LOCALS
        */
        Route::get('/locals', [LocalController::class, 'show'])->name('locals.show');
        Route::get('locals/create', [LocalController::class, 'create'])->name('locals.create');
        Route::post('locals/store', [LocalController::class, 'store'])->name('locals.store');
        Route::get('locals/delete/{local}', [LocalController::class, 'delete'])->name('locals.destroy');
        Route::get('locals/details/{local}', [LocalController::class, 'details'])->name('locals.details');
        Route::put('/locals/update/{locals}', [LocalController::class, 'edit'])->name('locals.update');

        /* DURATIONS
        */
        Route::get('/durations', [DurationController::class, 'show'])->name('durations.show');
        Route::get('durations/create', [DurationController::class, 'create'])->name('durations.create');
        Route::post('durations/store', [DurationController::class, 'store'])->name('durations.store');
        Route::get('durations/delete/{duration}', [DurationController::class, 'delete'])->name('durations.destroy');
        Route::get('durations/details/{duration}', [DurationController::class, 'details'])->name('durations.details');
        Route::put('/duration/update/{duration}', [DurationController::class, 'edit'])->name('durations.update');

        /* MANAGEMENT BOATS
        */
        Route::get('/boats', [VesselController::class, 'show'])->name('boats.show');
        Route::get('boats/create', [VesselController::class, 'create'])->name('boats.create');
        Route::post('boats/store', [VesselController::class, 'store'])->name('boats.store');
        Route::get('boats/delete/{boat}', [VesselController::class, 'delete'])->name('boats.destroy');
        Route::get('boats/details/{boat}', [VesselController::class, 'details'])->name('boats.details');
        Route::put('boats/update/{boat}', [VesselController::class, 'edit'])->name('boats.update');


        /* BRANDS
        */
        Route::get('/brands', [BrandController::class, 'show'])->name('brands.show');

        // Rota para deletar uma marca
        Route::get('brands/delete/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');

        // Rota para aceder ao formulario de criar uma marca
        Route::get('brands/create', [BrandController::class, 'create'])->name('brands.create');

        Route::post('brands/store', [BrandController::class, 'store'])->name('brands.store');



        /* DELETE ROUTES
        */
        Route::get('clients/delete/{client}', [ClientsController::class, 'destroy'])->name('clients.destroy');
        Route::get('admins/delete/{admin}', [AdminController::class, 'destroy'])->name('admins.destroy');
        Route::get('newsletters/delete/{newsletter}', [NewsletterController::class, 'destroy'])->name('admin.dashboard.newslettersDelete');
        Route::get('ontacts/delete/{ontacts}', [ContactController::class, 'destroy'])->name('admin.dashboard.contactsDelete');


        /* EXPORT EXCEL ROUTES
        */
        Route::get('/export/users', [ExportController::class, 'exportUsers'])->name('export.users');
        Route::get('/export/newsletters', [ExportController::class, 'exportNewsletters'])->name('export.newsletters');
        Route::get('/export/contacts', [ExportController::class, 'exportContacts'])->name('export.contacts');
        Route::get('/export/reservations', [ExportController::class, 'exportReservations'])->name('export.reservations');


    }); // END GROUP ADMIN MIDDLEWARE

    Route::middleware(['auth','role:agent'])->group(function() {
        Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
        Route::get('/agent/logout', [AgentController::class, 'AgentLogout'])->name('agent.logout');
    }); // END GROUP AGENT MIDDLEWARE

    /*
    Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
    Route::get('/agent/login', [AgentController::class, 'AgentLogin'])->name('agent.login');
    */

});




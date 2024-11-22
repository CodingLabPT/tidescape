<?php

use App\Http\Controllers\BrandController;
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
        Route::post('/admin/reserve/store', [ReserveController::class, 'adminReserveStore'])->name('admin.reserve.store');
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
        Route::get('/admin/dashboard/reservations', [ReserveController::class, 'show'])->name('admin.dashboard.reservations');
        Route::get('/admin/dashboard/reservations/add', [ReserveController::class, 'create'])->name('admin.dashboard.reservations.add');
        Route::get('/admin/dashboard/reservations/details/{id}', [ReserveController::class, 'details'])->name('admin.dashboard.reservations.details');
        Route::get('/admin/dashboard/reservations/delete/{id}', [ReserveController::class, 'delete'])->name('admin.dashboard.reserveDelete');

        Route::get('/admin/dashboard/calendary', [AdminController::class, 'AdminDashboardCalendary'])->name('admin.dashboard.calendary');
        Route::get('/admin/dashboard/admins', [AdminController::class, 'AdminDashboardAdmins'])->name('admin.dashboard.admins');
        Route::get('/admin/dashboard/clients', [AdminController::class, 'AdminDashboardClients'])->name('admin.dashboard.clients');
        Route::get('/admin/dashboard/newsletters', [NewsletterController::class, 'show'])->name('admin.dashboard.newsletters');

        Route::get('/admin/dashboard/contacts', [ContactController::class, 'show'])->name('admin.dashboard.contacts');
        Route::get('/admin/dashboard/contacts/details/{id}', [ContactController::class, 'details'])->name('admin.dashboard.contacts.details');

        /* TOURS
        */
        Route::post('/cadastrarTour', [TourController::class, 'store'])->name('tour.store');
        Route::get('/admin/dashboard/tours', [TourController::class, 'show'])->name('admin.dashboard.tours');
        Route::get('/admin/dashboard/tours/add', [TourController::class, 'create'])->name('admin.dashboard.addTour');
        Route::get('/admin/dashboard/tours/delete/{id}', [TourController::class, 'delete'])->name('admin.dashboard.tourDelete');
        Route::get('/admin/dashboard/tours/edit/{id}', [TourController::class, 'details'])->name('admin.dashboard.tourShow');
        Route::put('/updateTour/{id}', [TourController::class, 'edit'])->name('update.tour');

        /* CONTACTS
        */
        Route::put('/updateContact/{id}', [ContactController::class, 'edit'])->name('update.contact');


        /* LOCALS
        */
        Route::post('/cadastrarLocal', [LocalController::class, 'store']);
        Route::get('/admin/dashboard/locals', [LocalController::class, 'show'])->name('admin.dashboard.locals');
        Route::get('/admin/dashboard/locals/add', [LocalController::class, 'create'])->name('admin.dashboard.addLocal');
        Route::get('/admin/dashboard/locals/delete/{id}', [LocalController::class, 'delete'])->name('admin.dashboard.localDelete');
        Route::get('/admin/dashboard/locals/edit/{id}', [LocalController::class, 'details'])->name('admin.dashboard.localShow');
        Route::put('/updateLocal/{id}', [LocalController::class, 'edit']);

        /* DURATIONS
        */
        Route::post('/cadastrarDuration', [DurationController::class, 'store']);
        Route::get('/admin/dashboard/durations', [DurationController::class, 'show'])->name('admin.dashboard.durations');
        Route::get('/admin/dashboard/durations/add', [DurationController::class, 'create'])->name('admin.dashboard.addDuration');
        Route::get('/admin/dashboard/durations/delete/{id}', [DurationController::class, 'delete'])->name('admin.dashboard.durationDelete');
        Route::get('/admin/dashboard/durations/edit/{id}', [DurationController::class, 'details'])->name('admin.dashboard.durationShow');
        Route::put('/updateDuration/{id}', [DurationController::class, 'edit']);

        /* MANAGEMENT BOATS
        */
        Route::post('/cadastrarBoat', [VesselController::class, 'store'])->name('boat.store');
        Route::get('/admin/dashboard/configs', [VesselController::class, 'show'])->name('admin.dashboard.configs');
        Route::get('/admin/dashboard/configs/add', [VesselController::class, 'create'])->name('admin.dashboard.addBoat');
        Route::get('/admin/dashboard/configs/delete/{id}', [VesselController::class, 'delete'])->name('admin.dashboard.boatDelete');
        Route::get('/admin/dashboard/configs/edit/{id}', [VesselController::class, 'details'])->name('admin.dashboard.boatShow');
        Route::put('/updateBoat/{id}', [VesselController::class, 'edit']);


        /* BRANDS
        */
        Route::get('/admin/dashboard/configs/brands', [BrandController::class, 'show'])->name('brands.show');

        // Rota para deletar uma marca
        Route::get('brands/delete/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');

        // Rota para aceder ao formulario de criar uma marca
        Route::get('brands/create', [BrandController::class, 'create'])->name('brands.create');

        Route::post('brands/store', [BrandController::class, 'store'])->name('brands.store');



        /* DELETE ROUTES
        */
        Route::get('/admin/dashboard/clients/delete/{id}', [AdminController::class, 'deleteClients'])->name('admin.dashboard.clientsDelete');
        Route::get('/admin/dashboard/admins/delete/{id}', [AdminController::class, 'deleteAdmins'])->name('admin.dashboard.adminsDelete');

        Route::get('/admin/dashboard/newsletters/delete/{id}', [NewsletterController::class, 'delete'])->name('admin.dashboard.newslettersDelete');
        Route::get('/admin/dashboard/contacts/delete/{id}', [ContactController::class, 'delete'])->name('admin.dashboard.contactsDelete');


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




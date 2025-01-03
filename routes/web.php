<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CalendaryController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DurationController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\VesselController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\UserController;

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;

Route::get('/localization/{locale}', LocalizationController::class)->name('localization');

Route::middleware(Localization::class)->group(function(){

    /* FRONTEND*/
    Route::get('/', [FrontEndController::class, 'home'])->name('home');
    Route::get('/category', [FrontEndController::class, 'category'])->name('category');
    Route::get('/offers', [FrontEndController::class, 'offers'])->name('offers');

        /* FILTERS */
        Route::get('/categoryfilter', [FrontEndController::class, 'categoryfilter'])->name('category.filter');
        Route::get('/offersfilter', [FrontEndController::class, 'offersfilter'])->name('offers.filter');

    /* CONTACTS */
    Route::get('/contacts', [FrontEndController::class, 'contacts'])->name('contacts');

    /* INFO */
    Route::get('/info', [FrontEndController::class, 'info'])->name('info');

    /* POLICY */
    Route::get('/policy', [FrontEndController::class, 'policy'])->name('policy');

    /* TOUR - PROPERTY */
    Route::get('/tour/{id}/{name}', [FrontEndController::class, 'show'])->name('property');

    /* STORE FORM CONTACTS */
    Route::post('contacts/store', [ContactController::class, 'store'])->name('contacts.store');

    /* STORE EMAILS IN A NEWSLETTER */
    Route::post('newsletters/store', [NewsletterController::class, 'store'])->name('newsletters.store');

    /* LOGIN 2 */
    Route::get('/login2/{id}', [LoginController::class, 'login'])->name('login.index');
    Route::post('/loginStore', [LoginController::class, 'store'])->name('login.store');

    /* REGISTER 2 */
    Route::get('/register2/{id}', [RegisterController::class, 'register'])->name('register.index');
    Route::post('/registerStore', [RegisterController::class, 'store'])->name('register.store');

    Route::middleware('auth')->group(function () {

        /* PROFILE ROUTES */
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        /* RESERVE PROCESS (CHOOSE TOUR / DAY / TIME / BOAT) */
        Route::post('/success/{reserve}', [ReserveController::class, 'successReserve'])->name('reserves.success');

        /* CHECHOUT (FINAL STEP / CONFIRM INFORMATION) */
        Route::post('/checkout', [ReserveController::class, 'store'])->name('reserves.store');

        /* ADMIN RESERVE STORE */
        Route::post('reserve/store', [ReserveController::class, 'reserveStore'])->name('admin.reserves.store');

        /* ADMIN RESERVE VALIDATE */
        Route::any('/validate/{reserve}', [ReserveController::class, 'validateReserve'])->name('reserves.validate');
    });

    require __DIR__.'/auth.php';

    Route::middleware(['auth','role:user'])->group(function(){


        /* USER DASHBOARD PAGES*/
        Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');

        /* MY RESERVATIONS */
        Route::get('/dashboard/myreservations', [UserController::class, 'myreservesshow'])->name('myreservations.show');
        Route::get('/dashboard/myreservations/details/{reservation}', [UserController::class, 'myreservesdetails'])->name('myreserves.details');
        Route::get('/dashboard/myreservations/delete/{reservation}', [UserController::class, 'myreservedestroy'])->name('myreserves.destroy');

        /* MY CALENDARY */
        Route::get('/dashboard/mycalendary', [UserController::class, 'mycalendaryshow'])->name('mycalendarys.show');

        /* MY CONTACTS */
        Route::get('/dashboard/mycontacts', [UserController::class, 'mycontactsshow'])->name('mycontacts.show');
        Route::get('/dashboard/mycontacts/details/{contact}', [UserController::class, 'mycontactsdetails'])->name('mycontacts.details');
        Route::get('/dashboard/mycontacts/delete/{contact}', [UserController::class, 'mycontactdestroy'])->name('mycontacts.destroy');

    }); // END GROUP USER MIDDLEWARE


        /* ADMIN DASHBOARD PAGES */
        Route::middleware(['auth','role:admin'])->group(function(){
        Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
        Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

        /* RESERVATIONS */
        Route::get('/reservations', [ReserveController::class, 'show'])->name('reservations.show');
        Route::get('reservations/create', [ReserveController::class, 'create'])->name('reservations.create');
        Route::get('reservations/details/{reserve}', [ReserveController::class, 'details'])->name('reservations.details');
        Route::get('reservations/delete/{reserve}', [ReserveController::class, 'delete'])->name('reservations.destroy');

        /* CALENDARY */
        Route::get('/calendary', [CalendaryController::class, 'show'])->name('calendarys.show');

        /* ADMINS */
        Route::get('/admins', [AdminController::class, 'show'])->name('admins.show');
        Route::get('admins/delete/{admin}', [AdminController::class, 'destroy'])->name('admins.destroy');

        /* CLIENTS */
        Route::get('/clients', [ClientsController::class, 'show'])->name('clients.show');
        Route::get('clients/delete/{client}', [ClientsController::class, 'destroy'])->name('clients.destroy');

        /* NEWSLETTERS */
        Route::get('/newsletters', [NewsletterController::class, 'show'])->name('newsletters.show');
        Route::get('newsletters/delete/{newsletter}', [NewsletterController::class, 'destroy'])->name('newsletters.destroy');

        /* CONTACTS */
        Route::get('/allcontacts', [ContactController::class, 'allcontactsShow'])->name('allcontacts.show');
        Route::get('allcontacts/details/{contact}', [ContactController::class, 'details'])->name('allcontacts.details');
        Route::put('/allcontacts/update/{contact}', [ContactController::class, 'edit'])->name('allcontacts.update');
        Route::get('allcontacts/delete/{contacts}', [ContactController::class, 'destroy'])->name('allcontacts.destroy');

        /* TOURS */
        Route::get('/tours', [TourController::class, 'show'])->name('tours.show');
        Route::get('tours/create', [TourController::class, 'create'])->name('tours.create');
        Route::post('tours/store', [TourController::class, 'store'])->name('tours.store');
        Route::get('tours/delete/{tour}', [TourController::class, 'delete'])->name('tours.destroy');
        Route::get('tours/details/{tour}', [TourController::class, 'details'])->name('tours.details');
        Route::put('/tours/update/{tour}', [TourController::class, 'edit'])->name('tours.update');

        /* LOCALS */
        Route::get('/locals', [LocalController::class, 'show'])->name('locals.show');
        Route::get('locals/create', [LocalController::class, 'create'])->name('locals.create');
        Route::post('locals/store', [LocalController::class, 'store'])->name('locals.store');
        Route::get('locals/delete/{local}', [LocalController::class, 'delete'])->name('locals.destroy');
        Route::get('locals/details/{local}', [LocalController::class, 'details'])->name('locals.details');
        Route::put('/locals/update/{locals}', [LocalController::class, 'edit'])->name('locals.update');

        /* DURATIONS */
        Route::get('/durations', [DurationController::class, 'show'])->name('durations.show');
        Route::get('durations/create', [DurationController::class, 'create'])->name('durations.create');
        Route::post('durations/store', [DurationController::class, 'store'])->name('durations.store');
        Route::get('durations/delete/{duration}', [DurationController::class, 'delete'])->name('durations.destroy');
        Route::get('durations/details/{duration}', [DurationController::class, 'details'])->name('durations.details');
        Route::put('/duration/update/{duration}', [DurationController::class, 'edit'])->name('durations.update');

        /* MANAGEMENT BOATS */
        Route::get('/boats', [VesselController::class, 'show'])->name('boats.show');
        Route::get('boats/create', [VesselController::class, 'create'])->name('boats.create');
        Route::post('boats/store', [VesselController::class, 'store'])->name('boats.store');
        Route::get('boats/delete/{boat}', [VesselController::class, 'delete'])->name('boats.destroy');
        Route::get('boats/details/{boat}', [VesselController::class, 'details'])->name('boats.details');
        Route::put('boats/update/{boat}', [VesselController::class, 'edit'])->name('boats.update');

        /* BRANDS */
        Route::get('/brands', [BrandController::class, 'show'])->name('brands.show');
        Route::get('brands/delete/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
        Route::get('brands/create', [BrandController::class, 'create'])->name('brands.create');
        Route::post('brands/store', [BrandController::class, 'store'])->name('brands.store');

        /* EXPORT EXCEL ROUTES */
        Route::get('/export/users', [ExportController::class, 'exportUsers'])->name('export.users');
        Route::get('/export/newsletters', [ExportController::class, 'exportNewsletters'])->name('export.newsletters');
        Route::get('/export/contacts', [ExportController::class, 'exportContacts'])->name('export.contacts');
        Route::get('/export/reservations', [ExportController::class, 'exportReservations'])->name('export.reservations');

    }); // END GROUP ADMIN MIDDLEWARE

});




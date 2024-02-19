<?php

use App\Models\Channel;
use App\Models\Property;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TaxesController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\MyChannelController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TravelAgencyController;
use App\Http\Controllers\BusinessIntelligence\CSA;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\CreateReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::middleware('web')
//     ->group(base_path('routes/web.php'));

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/super-admin', [PagesController::class, 'super_admin'])->name('super-admin');
Route::post('/super-admin', [PagesController::class, 'create_super_admin'])->name('register-super-admin');


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('frontend.index');
    })->name('dashboard');

    Route::get('test', function () {
        return view('frontend.test');
    })->name('test');
    Route::get('test2', function () {
        return view('frontend.upload-property-image');
    })->name('test2');


    //reservations
    Route::get('reservation-list', [ReservationController::class, 'index'])->name('reservation-list');
    Route::get('make-reservations', [ReservationController::class, 'make_reservation'])->name('make-reservations');
    // Route::post('create-reservation', [ReservationController::class, 'create_reservations'])->name('create-reservations');


    Route::get('create-reservation', [CreateReservationController::class, 'index'])->name('add-reservations');
    Route::post('create-reservation', [CreateReservationController::class, 'store'])->name('c-reservations');


    //user management
    Route::get('manage-users', [UserManagementController::class, 'index'])->name('users');
    Route::post('add-users', [UserManagementController::class, 'index'])->name('add-user');
    Route::put('update-users/{id}', [UserManagementController::class, 'index'])->name('update-users');



    //properties
    Route::get('my-properties', [PropertyController::class, 'index'])->name('my-properties');
    Route::post('add-property', [PropertyController::class, 'store'])->name('add-property');
    Route::get('show-property/{id}/details', [PropertyController::class, 'show_property'])->name('show-update-property');
    Route::get('view-property/{id}/details', [PropertyController::class, 'view_property_info'])->name('view-property-info');
    Route::post('update-property/{property}', [PropertyController::class, 'update'])->name('update-property');
    Route::post('search-property', [PropertyController::class, 'index'])->name('search-property');
    Route::post('add-property-image/{id}', [PropertyController::class, 'add_property_images'])->name('add-property-image');


    //taxes
    Route::get('taxes-setup', [TaxesController::class, 'index'])->name('taxes-setup');
    Route::post('taxes-setup', [TaxesController::class, 'store'])->name('add-tax');

    Route::get('travel-agency', [TravelAgencyController::class, 'index'])->name('travel-agency');
    Route::post('travel-agency', [TravelAgencyController::class, 'create_travel_agency'])->name('create-agency');

    Route::post('add-category', [CategoryController::class, 'store'])->name('add-category');
    Route::post('add-subcategory', [SubCategoryController::class, 'store'])->name('add-subcategory');

    Route::get('channel-list', [ChannelController::class, 'index'])->name('channel-list');
    Route::post('channel-list', [ChannelController::class, 'store'])->name('add-channel');
    Route::get('my-channel', [MyChannelController::class, 'index'])->name('my-channel');
    Route::post('my-channel', [MyChannelController::class, 'store'])->name('add-my-channel');


    Route::post('search-available-room', [ReservationController::class, 'search_reservation'])->name('room-search');
    Route::post('add-room-amenity', [RoomController::class, 'add_room_amenity'])->name('add-room-amenity');
    


    Route::get('room-setup', [RoomController::class, 'index'])->name('room-setup');
    Route::post('room-setup', [RoomController::class, 'store'])->name('store-room-setup');
    Route::get('show-room/{id}/details', [RoomController::class, 'show'])->name('show-room-setup');

    Route::prefix('business-intelligence')->group(function () {
        Route::get('csa/report', [CSA\ReportController::class, 'show'])->name('csa.report.show');
        Route::post('csa/report', [CSA\ReportController::class, 'store'])->name('csa.report.store');

        Route::post('csa/config/expedia-package', [CSA\ExpediaPackageController::class, 'store'])->name('csa.config.expedia-packages');
        Route::get('csa/config/expedia-package', [CSA\ExpediaPackageController::class, 'show'])->name('csa.config.expedia-packages');

        Route::get('csa/config/{platform}', [CSA\ConfigurationController::class, 'show'])->name('csa.config.show');
        Route::post('csa/config/{platform}', [CSA\ConfigurationController::class, 'store'])->name('csa.config.store');

        Route::get('csa/room-mapping/{platform}', [CSA\RoomMappingController::class, 'show'])->name('csa.room-mapping.show');
        Route::post('csa/room-mapping/{platform}', [CSA\RoomMappingController::class, 'store'])->name('csa.room-mapping.store');

        Route::get('csa/revenue-strategy/{platform}', [CSA\RevenueStrategyController::class, 'show'])->name('csa.revenue-strategy.show');
        Route::post('csa/revenue-strategy/{platform}', [CSA\RevenueStrategyController::class, 'store'])->name('csa.revenue-strategy.store');
    });

    Route::get('calendar', [PagesController::class, 'calendar'])->name('calendar');

    // language
    Route::get('lang/{locale}', [LanguageController::class, 'swap']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

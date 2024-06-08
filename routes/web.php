<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Guest\PostController as GuestPostController;
use App\Http\Controllers\LeadController;

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

Route::get('/', [PageController::class, 'index']); //http://localhost:8000/
Route::resource('posts', GuestPostController::class)->only(['index', 'show'])->parameters([
    'posts' => 'post:slug'
]);

Route::get('contacts', [LeadController::class, 'create'])->name('contacts');
Route::post('contacts', [LeadController::class, 'store'])->name('contacts.store');



Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); //http://localhost:8000/admin

        // Posts route here
        Route::resource('posts', PostController::class)->parameters([
            'posts' => 'post:slug'
        ]);

        Route::resource('categories', CategoryController::class);


        Route::get('/mailable', function () {
            $lead = App\Models\Lead::find(1);

            return new App\Mail\NewLeadMarkdown($lead);
        });
    });



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

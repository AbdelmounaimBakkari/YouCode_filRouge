<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\ConversationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::fallback(function() {
//     return view('404');
//  });
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{id}', [JobController::class, 'show'])->where('id', '[0-9]+')->name('jobs.show');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [JobController::class, 'indexDashboard'])->name('jobs.indexDashboard');
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs/store', [JobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/edit/{id}', [JobController::class, 'edit'])->where('id', '[0-9]+')->name('jobs.edit');
    Route::post('/jobs/update/{id}', [JobController::class, 'update'])->where('id', '[0-9]+')->name('jobs.update');
    Route::delete('/jobs/destroy/{id}', [JobController::class, 'destroy'])->where('id', '[0-9]+')->name('jobs.destroy');
    Route::get('/confirmProposal/{proposal}', [ProposalController::class, 'confirm'])->name('confirm.proposal');
    Route::get('conversations', [ConversationController::class, 'index'])->name('conversation.index');
    Route::get('conversations/{conversation}', [ConversationController::class, 'show'])->name('conversation.show');
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});

Route::group(['middleware' => ['auth', 'proposal']], function () {
    Route::post('/submit/{job}', [ProposalController::class, 'store'])->name('proposals.store');
});

<?php

use Illuminate\Support\Facades\Route;

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

$to = '/connections';

Route::redirect('/', $to);

Route::middleware(['auth:sanctum', 'verified'])->group(function () use ($to) {
    Route::redirect('/dashboard', $to)->name('dashboard');

    Route::get('test/generate-emails', [\App\Http\Controllers\TestController::class, 'generateEmails']);
    Route::resource('connections', \App\Http\Controllers\ConnectionController::class)->only(['index', 'create', 'show']);
    Route::resource('groups', \App\Http\Controllers\GroupsController::class)->only(['index', 'create', 'show','edit']);
    Route::resource('eventcalender', \App\Http\Controllers\EventCalender::class)->only(['index', 'create','edit']);
    Route::resource('listings', \App\Http\Controllers\ListingController::class)->only(['index', 'create', 'show']);
    Route::get('refresh-mautic', [\App\Http\Controllers\RuleController::class, 'mauticStages']);
    Route::resource('rules', \App\Http\Controllers\RuleController::class)->only(['index', 'create', 'show']);
    Route::get('emailSyncedList', [\App\Http\Controllers\RuleController::class, 'emailSyncedList']);
    Route::resource('invalidemail', \App\Http\Controllers\InvalidEmailController::class)->only(['index']);
    Route::resource('emaillogs', \App\Http\Controllers\EmailLogsController::class)->only(['index']);
    Route::post('emailfilter', [\App\Http\Livewire\EmailLogsList::class, 'getEmaillogsProperty']);
    Route::resource('templates', \App\Http\Controllers\TemplateController::class)->only(['index', 'create', 'show', 'edit']);
    Route::resource('pages', \App\Http\Controllers\PageController::class)->only(['index', 'create', 'edit']);
    Route::get('DeleteEmailLogs', [\App\Http\Controllers\EmailLogsController::class, 'DeleteEmailLogs']);
    Route::get('DeleteEmailLogs_invalid_email', [\App\Http\Controllers\EmailLogsController::class, 'DeleteEmailLogs_invalid_email']);
    Route::get('SetLogsDeleteCron', [\App\Http\Controllers\EmailLogsController::class, 'SetLogsDeleteCron']);
    Route::get('Delete-logs-manaully', [\App\Http\Controllers\EmailLogsController::class, 'DeletelogsManaully']);
    Route::resource('cron', \App\Http\Controllers\CronController::class)->only(['index']);
    Route::get('SetLogsResetCron',[\App\Http\Controllers\CronController::class, 'SetLogsResetCron']);
});

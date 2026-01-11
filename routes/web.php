<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

/*Route::get('/', function () {
    return view('welcome');
})->name('home'):*/

/*Route::view('/', 'web-page.pages.home')
->name('home');*/

/*Route::view('/business', 'web-page.pages.business')
->name('business');*/

/*Route::view('/commercial', 'web-page.pages.commercial')
->name('commercial');*/


Route::get('/', function () {
    return view('web-page.pages.home');
})->name('home');

Route::get('/business', function () {
    return view('web-page.pages.business');
})->name('business');

Route::get('/commercial', function () {
    return view('web-page.pages.commercial');
})->name('commercial');


Route::view('dashboard', 'banking.pages.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])
    ->prefix('banking')
    ->name('banking.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard bancario
        |--------------------------------------------------------------------------
        | GET /banking
        */
        Route::view('/', 'banking.pages.dashboard')
            ->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | Cuentas
        |--------------------------------------------------------------------------
        | GET /banking/account
        */
        Route::view('/account', 'banking.pages.account.index')
            ->name('account');


        /*
        |--------------------------------------------------------------------------
        | Transacciones
        |--------------------------------------------------------------------------
        | GET /banking/transactions
        */
        Route::view('/transactions', 'banking.pages.transactions.index')
            ->name('transactions');


        /*
        |--------------------------------------------------------------------------
        | Retiro - seleccionar banco
        |--------------------------------------------------------------------------
        | GET /banking/withdraw
        */
        Route::get('/withdraw', function () {
            return view('banking.pages.withdraw.index', [
                'banks' => config('banking.withdraw_banks'),
            ]);
        })->name('withdraw');


        /*
        |--------------------------------------------------------------------------
        | Retiro - ingresar monto
        |--------------------------------------------------------------------------
        | GET /banking/withdraw/{bank}
        */
        Route::get('/withdraw/{bank}', function ($bank) {
            $banks = config('banking.withdraw_banks');

            $selected = collect($banks)->firstWhere('id', $bank);
            abort_unless($selected, 404);

            return view('banking.pages.withdraw.amount', [
                'bank' => $selected,
            ]);
        })->name('withdraw.amount');


        /*
        |--------------------------------------------------------------------------
        | Retiro - confirmación
        |--------------------------------------------------------------------------
        | GET /banking/withdraw/{bank}/confirm
        */
        Route::get('/withdraw/{bank}/confirm', function ($bank) {
            return view('banking.pages.withdraw.confirm', [
                'bankId' => $bank,
                'amount' => request('amount', 0),
            ]);
        })->name('withdraw.confirm');


        /*
        |--------------------------------------------------------------------------
        | Retiro - Alerta de comisión
        |--------------------------------------------------------------------------
        | GET /banking/withdraw/commission-alert
        */
        
        Route::get('/withdraw/{bank}/commission-alert', function ($bank) {
            return view('banking.pages.withdraw.commission-alert', [
                'bankId' => $bank,
                'amount' => request('amount', 0),
            ]);
        })->name('withdraw.commission-alert');



        /*
        |--------------------------------------------------------------------------
        | Retiro - éxito
        |--------------------------------------------------------------------------
        | GET /banking/withdraw/{bank}/success
        */
        Route::get('/withdraw/{bank}/success', function ($bank) {
            return view('banking.pages.withdraw.success', [
                'bankId' => $bank,
                'amount' => request('amount', 0),
            ]);
        })->name('withdraw.success');

    });




Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

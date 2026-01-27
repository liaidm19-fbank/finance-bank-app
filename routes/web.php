<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMessage;
use App\Models\Transaction;



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
        
        /*Route::get('/withdraw/{bank}/commission-alert', function ($bank) {
            return view('banking.pages.withdraw.commission-alert', [
                'bankId' => $bank,
                'amount' => request('amount', 0),
            ]);
        })->name('withdraw.commission-alert');*/

        Route::get('/withdraw/{bank}/commission-alert', function ($bank) {

            $message = auth()->user()
                ->messages()
                ->where('type', 'alert')
                ->where('active', true)
                ->first();

            return view('banking.pages.withdraw.commission-alert', [
                'bankId' => $bank,
                'amount' => request('amount', 0),
                'message' => $message,
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


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard admin
        /*Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard'); */

        // Dashboard admin - lista usuarios
        Route::get('/', function () {
            $users = User::all();
            return view('admin.dashboard', compact('users'));
        })->name('dashboard');

        // Ver detalle de un usuario
        /*Route::get('/users/{user}', function (\App\Models\User $user) {
            return view('admin.user-show', compact('user'));
        })->name('users.show');*/

        Route::get('/users/{user}', function (User $user) {

            $alert = $user->messages()
                ->where('type', 'alert')
                ->where('active', true)
                ->first();

            return view('admin.user-show', compact('user', 'alert'));

        })->name('users.show');


        // Actualizar balance
        Route::post('/users/{user}/balance', function (Request $request, User $user) {

            $request->validate([
                'balance' => 'required|numeric|min:0',
            ]);

            $user->update([
                'balance' => $request->balance,
            ]);

            return back()->with('success', 'Balance actualizado correctamente');
        })->name('users.balance');

        // Cambiar contraseña
        Route::post('/users/{user}/password', function (Request $request, User $user) {

            $request->validate([
                'password' => 'required|min:6|confirmed',
            ]);

            $user->update([
                'password' => bcrypt($request->password),
            ]);

            return back()->with('success', 'Contraseña actualizada');
        })->name('users.password');

        // Crear mensaje personalizado
        Route::post('/users/{user}/message', function (Request $request, User $user) {

            $request->validate([
                'title' => 'nullable|string',
                'message' => 'required|string',
                'amount' => 'nullable|numeric',
            ]);

            // Título por defecto si viene vacío
            $titleFinal = $request->title ?: 'Aviso importante';

            // Buscar si ya existe una alerta activa para este usuario
            $message = $user->messages()
                ->where('type', 'alert')
                ->first();

            if ($message) {
                // Si existe → actualizar
                $message->update([
                    'title' => $titleFinal,
                    'message' => $request->message,
                    'amount' => $request->amount,
                    'active' => true,
                ]);
                return back()->with('success', 'Alerta actualizada correctamente');
            } else {
                // Si no existe → crear una sola vez
                $user->messages()->create([
                    'type' => 'alert',
                    'title' => $titleFinal,
                    'message' => $request->message,
                    'amount' => $request->amount,
                    'active' => true,
                ]);
                return back()->with('success', 'Alerta actualizada correctamente');
            }

        })->name('users.message');

        Route::post('/admin/users/{user}/transactions', function (Request $request, User $user) {

            $data = $request->validate([
                'type' => 'required|string',
                'amount' => 'required|numeric',
                'description' => 'required|string',
            ]);

            $user->transactions()->create($data);

            // Ajustar balance automáticamente
            $user->increment('balance', $data['amount']);

            return back()->with('success', 'Transacción agregada correctamente.');

        })->name('users.transactions');

 
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

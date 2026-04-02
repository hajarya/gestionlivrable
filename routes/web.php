<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\LivrableController;

/*
|--------------------------------------------------------------------------
| Page d'accueil
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Redirection dashboard selon le role
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    if (Auth::user()->role == 'admin') {
        return redirect('/admin/dashboard');
    }

    if (Auth::user()->role == 'responsable') {
        return redirect('/responsable/dashboard');
    }

    if (Auth::user()->role == 'manager') {
        return redirect('/manager/dashboard');
    }

    if (Auth::user()->role == 'consultant') {
        return redirect('/consultant/dashboard');
    }

})->middleware(['auth'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Profile utilisateur
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| Dashboards
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/responsable/dashboard', [ResponsableController::class, 'dashboard'])->name('responsable.dashboard');

    Route::get('/manager/dashboard', [ManagerController::class, 'dashboard'])->name('manager.dashboard');

    Route::get('/consultant/dashboard', [ConsultantController::class, 'dashboard'])->name('consultant.dashboard');

});


/*
|--------------------------------------------------------------------------
| Responsable Livrables
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('responsable')->name('responsable.')->group(function () {

    Route::get('/dashboard',[ResponsableController::class,'dashboard'])->name('dashboard');

    Route::get('/livrables',[ResponsableController::class,'index'])->name('livrables');

    Route::get('/livrables/create',[ResponsableController::class,'create'])->name('livrables.create');

    Route::post('/livrables',[ResponsableController::class,'store'])->name('livrables.store');

    Route::get('/livrables/{id}',[ResponsableController::class,'show'])->name('livrables.show');

    Route::get('/livrables/{id}/edit',[ResponsableController::class,'edit'])->name('livrables.edit');

    Route::put('/livrables/{id}',[ResponsableController::class,'update'])->name('livrables.update');
    
    Route::delete('/livrables/{id}',[ResponsableController::class,'destroy'])->name('livrables.destroy');

    Route::get('/livrables/{id}/download',[ResponsableController::class,'download'])->name('livrables.download');

    Route::get('/statistiques',[ResponsableController::class,'statistiques'])->name('statistiques');

});


Route::middleware(['auth'])->prefix('consultant')->group(function () {

    Route::get('/dashboard',[ConsultantController::class,'dashboard'])->name('consultant.dashboard');

    Route::get('/livrables',[ConsultantController::class,'livrables'])->name('consultant.livrables');

    Route::post('/livrable/status/{id}',[ConsultantController::class,'updateStatus'])->name('consultant.status');

    Route::post('/livrable/comment/{id}',[ConsultantController::class,'comment'])->name('consultant.comment');

    Route::get('/stats',[ConsultantController::class,'stats'])->name('consultant.stats');

    Route::get('/taches',[ConsultantController::class,'taches'])->name('consultant.taches');
    

    Route::get('/livrables/create', [ConsultantController::class,'createLivrable'])->name('consultant.livrables.create');
    Route::post('/livrables/store', [ConsultantController::class,'storeLivrable'])
        ->name('consultant.livrables.store');

    Route::get('/equipe',[ConsultantController::class,'equipe'])
        ->name('consultant.equipe');

    Route::get('/calendrier',[ConsultantController::class,'calendrier'])
        ->name('consultant.calendrier');
     Route::get('/statistiques',[ConsultantController::class,'statistiques'])
        ->name('consultant.statistiques');
    Route::post('/consultant/livrables/{livrable}/comment', [ConsultantController::class, 'comment'])->name('consultant.comment');
    Route::post('/consultant/livrables/{livrable}/status', [ConsultantController::class, 'updateStatus'])
    ->name('consultant.status');
    Route::get('/livrable/file/{id}/download', [LivrableController::class, 'downloadFile'])
    ->name('livrable.file.download');
});


Route::put('/livrables/{id}/status',[LivrableController::class,'updateStatus'])->name('livrables.status');



Route::prefix('manager')->name('manager.')->middleware('auth')->group(function () {

    Route::get('/dashboard', [ManagerController::class, 'dashboard'])->name('dashboard');

    Route::get('/livrables', [ManagerController::class, 'livrables'])->name('livrables');

    Route::get('/statistiques', [ManagerController::class, 'statistiques'])->name('statistiques');

    // ✅ CORRIGÉ ICI
    Route::get('/consultant/{id}/details', [ManagerController::class, 'details'])
    ->name('consultant.details');
    Route::get('/livrable/{id}/details', [ManagerController::class, 'livrableDetails'])
        ->name('livrable.details');
     Route::post('/livrable/{id}/comment', [ManagerController::class, 'addComment'])
        ->name('comment');

});



Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Route pour gérer les utilisateurs
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
     // Liste des utilisateurs
    
   // CRUD utilisateurs
    Route::post('/users', [AdminController::class, 'storeUser']);
    Route::get('/users/{id}/edit', [AdminController::class, 'editUser']);
    Route::put('/users/{id}', [AdminController::class, 'updateUser']);
    Route::delete('/users/{id}', [AdminController::class, 'destroyUser']);

    // Route pour les livrables
    Route::get('/livrables', [AdminController::class, 'livrables'])->name('admin.livrables');

    // Route pour les statistiques
    Route::get('/statistiques', [AdminController::class, 'statistiques'])->name('admin.statistiques');
    // ⚡ Nouvelle route pour les paramètres
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/settings/general', [AdminController::class, 'updateGeneralSettings'])->name('admin.settings.general');
    Route::get('/users/{id}', [AdminController::class, 'showUser']);
    Route::delete('/livrables/{id}', [AdminController::class, 'destroyLivrable']);
    // Formulaire gestion des statuts
    Route::post('/settings/statuses', [AdminController::class, 'updateStatuses'])->name('admin.settings.statuses');
    Route::post('/settings/types', [AdminController::class, 'updateTypes'])->name('admin.settings.types');
    Route::post('/settings/security', [AdminController::class, 'updateSecurity'])->name('admin.settings.security');
    });
require __DIR__.'/auth.php';
<?php


use App\Models\HomeSlider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Helpers\LanguageController;


Route::get('/', function () {
    $locale = 'id';
    return redirect()->route('home.index', ['locale' => $locale]);
})->name('home.root');

// Language switch route (untuk AJAX/button toggle)
Route::get('/lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');


Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => 'id|en'],
    'middleware' => ['setLocale'],
], function () {

    Route::get('/', [HomeController::class, 'index'])
        ->name('home.index');

});
// API route untuk get current language
Route::get('/current-lang', [LanguageController::class, 'getCurrentLanguage']);
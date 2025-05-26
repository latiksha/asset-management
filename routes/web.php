<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => '', 'middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    //route for"location"
    Route::get('/location/list', [LocationController::class, 'index'])->name('location.list');
    Route::get('/location/create', [LocationController::class, 'create'])->name('location.create');
    Route::post('/storeData', [LocationController::class, 'store'])->name('storeData');
    Route::get('/location/{id}/edit', [LocationController::class, 'edit'])->name('location.edit');
    Route::put('/location/{id}', [LocationController::class, 'update'])->name('location.update');
    Route::delete('/location/{id}', [LocationController::class, 'destroy'])->name('location.delete');

    // route for "Assets"
    Route::get('/assets/create', [AssetController::class, 'show'])->name('assets.create');
    Route::post('/storeAsset', [AssetController::class, 'store'])->name('storeAsset');
    Route::get('/assets/createAttribute/{asset_id}', [AssetController::class, 'createAttribute'])->name('assets.attribute');
    Route::post('/storeAttribute', [AssetController::class, 'storeAttribute'])->name('storeAttribute');
    Route::get('/assets/list', [AssetController::class, 'index'])->name('assets.list');
    Route::get('/assets/{id}/edit', [AssetController::class, 'edit'])->name('assets.edit');
    Route::put('/assets/{id}', [AssetController::class, 'update'])->name('assets.update');
    Route::delete('/assets/{id}', [AssetController::class, 'destroy'])->name('assets.delete');

    //route for "issue"
    Route::get('/issues/create', [IssueController::class, 'show'])->name('issues.create');
    Route::post('/storeIssue', [IssueController::class, 'create'])->name('storeIssue');

    Route::get('/issues/list', [IssueController::class, 'index'])->name('issues.list');
    Route::get('/issues/{id}/edit', [IssueController::class, 'edit'])->name('issues.edit');
    Route::put('/issues/{id}', [IssueController::class, 'update'])->name('issues.update');
    Route::post('/issues/images/delete/{id}', [IssueController::class, 'deleteImage'])->name('image.delete.post');

    //Route::delete('/issues/images/{id}/delete', [IssueController::class, 'deleteImage'])->name('image.delete.post');
    Route::delete('/issues/{id}', [IssueController::class, 'destroy'])->name('issues.delete');

    //route for "user"
    Route::get('/user/list', [UserController::class, 'index'])->name('user.list');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');

    // Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    // Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    //Route::get('/get-next-asset-number/{locationCode}', [AssetController::class, 'getNextAssetNumber']);

    // asset-search
    //Route::get('/assets/search', [AssetController::class, 'search'])->name('assets.search');
    //Route::get('/location/search', [LocationController::class, 'search'])->name('location.search');

    //Route::get('/assets', [AssetController::class, 'index'])->name('assets.index');

});

<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FasilitasBidangController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\SchoolProfileController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login-admin', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login-admin', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/logout-admin', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admins.index');
    });

    Route::resource('category-articles', CategoryArticleController::class);
    Route::get('/admin/articles', [ArticleController::class, 'adminIndex'])->name('admin.articles');


    Route::get('/jurusans', [JurusanController::class, 'index'])->name('jurusans.index');
    Route::post('/bidangs', [JurusanController::class, 'storeBidang']);
    Route::post('/jurusans', [JurusanController::class, 'storeJurusan']);
    Route::put('/bidangs/{bidang}', [JurusanController::class, 'updateBidang']);
    Route::put('/jurusans/{jurusan}', [JurusanController::class, 'updateJurusan']);
    Route::delete('/bidangs/{bidang}', [JurusanController::class, 'destroyBidang']);
    Route::delete('/jurusans/{jurusan}', [JurusanController::class, 'destroyJurusan']);
    // Route untuk mendapatkan jurusan berdasarkan bidang di `JurusanController`
    Route::get('/bidangs/{bidang}/jurusan-data', [JurusanController::class, 'getJurusans'])->name('bidang.jurusans');

    // Route untuk mendapatkan jurusan berdasarkan bidang di `GlobalController`
    Route::get('/bidangs/{bidang}/global-jurusan', [GlobalController::class, 'getJurusanByBidang'])->name('global.jurusans');

    // Route untuk mendapatkan fasilitas berdasarkan bidang
    Route::get('/fasilitas-bidangs/{fasilitasBidang}/sideFacilities', [GlobalController::class, 'getListFacilitiesByBidang']);



    // Routes for Bidang
    Route::get('/bidangs/{bidang}/edit', [JurusanController::class, 'editBidang']);

    // Routes for Jurusan
    Route::get('/jurusans/{jurusan}/edit', [JurusanController::class, 'editJurusan']);


    // Bidang
    // Route to get all Bidang and related facilities
    Route::get('/fasilitas-bidangs', [FasilitasBidangController::class, 'index'])->name('fasilitas-bidangs.index');

    // Route to store a new Bidang
    Route::post('/fasilitas-bidangs', [FasilitasBidangController::class, 'storeBidang'])->name('fasilitas-bidangs.store');

    // Route for editing a Bidang
    Route::get('/fasilitas-bidangs/{bidang}/edit', [FasilitasBidangController::class, 'editBidang']);



    // Route to update a specific Bidang
    Route::put('/fasilitas-bidangs/{bidang}', [FasilitasBidangController::class, 'updateBidang'])->name('fasilitas-bidangs.update');

    // Route to delete a specific Bidang
    Route::delete('/fasilitas-bidangs/{bidang}', [FasilitasBidangController::class, 'destroyBidang'])->name('fasilitas-bidangs.destroy');

    // Route to get facilities related to a specific Bidang
    Route::get('/fasilitas-bidangs/{bidang}/facilities', [FasilitasBidangController::class, 'getFacilities'])->name('fasilitas-bidangs.facilities');

    // Route to store a new Facility
    Route::post('/facilities', [FasilitasBidangController::class, 'storeFacility'])->name('facilities.store');

    // Route for editing a Facility
    Route::get('/facilities/{facility}/edit', [FasilitasBidangController::class, 'editFacility']);

    // Route to update a specific Facility
    Route::put('/facilities/{facility}', [FasilitasBidangController::class, 'updateFacility'])->name('facilities.update');

    // Route to delete a specific Facility
    Route::delete('/facilities/{facility}', [FasilitasBidangController::class, 'destroyFacility'])->name('facilities.destroy');


    Route::post('/tags/check', [TagsController::class, 'check']);
    Route::get('/tags/search', [TagsController::class, 'search']);

    Route::get('/admin/visi-misi', [SchoolProfileController::class, 'visiMisiForm'])->name('school_profile.visi_misi_form');
    Route::post('/admin/visi-misi', [SchoolProfileController::class, 'storeOrUpdateVisiMisi'])->name('school_profile.store_or_update_visi_misi');

    Route::get('/admin/sejarah', [SchoolProfileController::class, 'sejarahForm'])->name('school_profile.sejarah_form');
    Route::post('/admin/sejarah', [SchoolProfileController::class, 'storeOrUpdateSejarah'])->name('school_profile.store_or_update_sejarah');

    Route::resource('guru', GuruController::class);

    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');
    Route::patch('/articles/{id}/favorite', [ArticleController::class, 'toggleFavorite'])->name('articles.favorite');

});

Route::middleware(['auth', 'role:Penulis'])->prefix('penulis')->as('penulis.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    
    Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');
    
    Route::resource('articles', ArticleController::class);
    Route::post('/article/upload', [ArticleController::class, 'uploadImage'])->name('article.upload');
    Route::patch('/articles/{id}/update-status', [ArticleController::class, 'updateStatus'])->name('articles.updateStatus');
});


Route::get('/', [IndexController::class, 'index']);
Route::get('/detail-article/{slug}', [IndexController::class, 'show'])->name('detail-article');
Route::get('/articles/category/{categoryId}', [IndexController::class, 'filterByCategory'])->name('articles.filter');

Route::post('/article/{id}/comment', [CommentController::class, 'store'])->name('article.comment');

Route::get('/guru-smk', [IndexController::class, 'listGuru'])->name('guru.list');

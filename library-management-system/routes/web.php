<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserSideController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BorrowerController;
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

// register page
Route::get('/register', function () {
    return view('auth.register');
});

// ---------------------------------------------------------------------------------------------------------------------------------------------------
// USER SIDE PAGE

//home page
Route::get('/', [UserSideController::class, 'allBookInfo'])->name('/');

// SELECT BOOK TYPE
//genre
Route::get('/genreSelect/{id}', [UserSideController::class, 'allBookGenre'])->name('genreSelect');

//availability
Route::get('/selectBook/{value}', [UserSideController::class, 'selectBook'])->name('selectBook');

//each book page
Route::get('/book/{id}', [UserSideController::class, 'bookInfo'])->name('book');

// BOOK HISTORY
Route::get('/bookHistory', [UserSideController::class, 'bookHistory'])->middleware(['auth', 'verified'])->name('bookHistory');

// ---------------------------------------------------------------------------------------------------------------------------------------------------
//REVIEWS

Route::post('/reviews/{reviewed_area}/{val_id?}', [ReviewController::class, 'store'])
->middleware(['auth', 'verified'])
->name('reviews.store');

Route::get('/reviews/{id}', [ReviewController::class, 'review'])
    ->name('reviews');

Route::get('/authorReview/{id}', [ReviewController::class, 'authorReview'])
    ->name('authorReview');

// ---------------------------------------------------------------------------------------------------------------------------------------------------
// BORROW
Route::get('/borrow/{book_id}', [BorrowerController::class, 'store'])
->middleware(['auth', 'verified'])
->name('borrow');

Route::get('/return/{book_id}', [BorrowerController::class, 'return'])
->middleware(['auth', 'verified'])
->name('return');

// ---------------------------------------------------------------------------------------------------------------------------------------------------
// Search bar
Route::post('/selectBook', [UserSideController::class, 'searchBar'])->middleware(['auth', 'verified'])->name('selectBook.search');

// ---------------------------------------------------------------------------------------------------------------------------------------------------
// ADMIN BOOKS

//manage books page
Route::get('/manage_books', [BookController::class, 'allBookInfo'])->middleware(['auth','is_admin','verified'])->name('manage_books');

//add book page
Route::get('/addBook', [BookController::class, 'bookInfo'])->middleware(['auth','is_admin','verified'])->name('addBook');

//add book
Route::post('/addbook', [BookController::class, 'store'])->middleware(['auth','is_admin','verified'])->name('addbook.store');

//edit book page
Route::get('/editBook/{id}', [BookController::class, 'singleBook'])->middleware(['auth','is_admin','verified'])->name('editBook');

//add book
Route::put('/editbook/{id}', [BookController::class, 'updateBook'])->middleware(['auth','is_admin','verified'])->name('editbook.update');

//delete conformation page
Route::post('/deleteBook/{id}', function (int $id) {
    return view('admin.books.delete', compact('id'));
})->middleware(['auth','is_admin','verified'])->name('deleteBook');

//delete
Route::post('/manage_books/{id}/delete', [BookController::class, 'deleteBook'])->middleware(['auth','is_admin','verified'])->name('books.delete');

// ---------------------------------------------------------------------------------------------------------------------------------------------------
// AUTHORS

//main authors page
Route::get('/authors', [AuthorController::class, 'authorInfo'])->middleware(['auth','is_admin','verified'])->name('authors');

//add author page
Route::get('/addAuthor', function () {
    return view('admin.authors.addAuthor');
})->middleware(['auth','is_admin','verified'])->name('addAuthor');

//add author
Route::post('/addAuthor', [AuthorController::class, 'store'])->middleware(['auth','is_admin','verified'])->name('addAuthor.store');

//delete conformation page
Route::post('/deleteAuthor/{id}', function (int $id) {
    return view('admin.authors.delete', compact('id'));
})->middleware(['auth','is_admin','verified'])->name('deleteAuthor');

//delete
Route::post('/authors/{id}/delete', [AuthorController::class, 'deleteAuthor'])->middleware(['auth','is_admin','verified'])->name('authors.delete');

//edit author page
Route::get('/editAuthor/{id}', [AuthorController::class, 'selectAuthor'])->middleware(['auth','is_admin','verified'])->name('authors.edit');

// update the info of authors
Route::put('/authors/{id}', [AuthorController::class, 'updateAuthor'])->middleware(['auth','is_admin','verified'])->name('authors.editIt');

// ---------------------------------------------------------------------------------------------------------------------------------------------------

// GENRES Routes

// manage genre page
Route::get('/genre', [GenreController::class, 'genreInfo'])->middleware(['auth','is_admin','verified'])->name('genre');

//add genre page
Route::get('/addGenre', function () {
    return view('admin.genre.addGenre');
})->middleware(['auth','is_admin','verified'])->name('addGenre');

//add genre
Route::post('/addGenre', [GenreController::class, 'store'])->middleware(['auth','is_admin','verified'])->name('addGenre.store');

//delete conformation page
Route::post('/deleteGenre/{id}', function (int $id) {
    return view('admin.genre.delete', compact('id'));
})->middleware(['auth','is_admin','verified'])->name('deleteGenre');

//deleteIt
Route::post('/genre/{id}/delete', [GenreController::class, 'deleteGenre'])->middleware(['auth','is_admin','verified'])->name('genre.delete');

//edit genre page
Route::get('/editGenre/{id}', [GenreController::class, 'selectGenre'])->middleware(['auth','is_admin','verified'])->name('genre.edit');

// update the info of authors
Route::put('/genre/{id}', [GenreController::class, 'updateGenre'])->middleware(['auth','is_admin','verified'])->name('genre.editIt');

// ---------------------------------------------------------------------------------------------------------------------------------------------------

// PUBLISHER ROUTES
//main publisher page
Route::get('/publishers', [PublisherController::class, 'publisherInfo'])->middleware(['auth','is_admin','verified'])->name('publishers');

//delete conformation page
Route::post('/deletePublisher/{id}', function (int $id) {
    return view('admin.publishers.delete', compact('id'));
})->middleware(['auth','is_admin','verified'])->name('deletePublisher');

//delete
Route::post('/publishers/{id}/delete', [PublisherController::class, 'deletePublisher'])->middleware(['auth','is_admin','verified'])->name('publishers.delete');

//add Publisher page
Route::get('/addPublisher', function () {
    return view('admin.publishers.addPublisher');
})->middleware(['auth','is_admin','verified'])->name('addPublisher');

//add publisher
Route::post('/addPublisher', [PublisherController::class, 'store'])->middleware(['auth','is_admin','verified'])->name('addPublisher.store');

//edit publisher page
Route::get('/editPublisher/{id}', [PublisherController::class, 'selectPublisher'])->middleware(['auth','is_admin','verified'])->name('publishers.edit');

//update the info publisher
Route::put('/publishers/{id}', [PublisherController::class, 'updatePublisher'])->middleware(['auth','is_admin','verified'])->name('publishers.editIt');

// ---------------------------------------------------------------------------------------------------------------------------------------------------

// BORROWER ROUTES

Route::get('/borrowers', [BorrowerController::class, 'borrowerInfo'])->middleware(['auth','is_admin','verified'])->name('borrowers');

Route::get('/userInfo/{id}', [BorrowerController::class, 'userInfo'])->middleware(['auth','is_admin','verified'])->name('userInfo');

// PROFILE
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

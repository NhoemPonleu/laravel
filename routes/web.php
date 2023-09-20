<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
require __DIR__.'/../vendor/autoload.php';


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
// Route::get('/student', [StudentController::class, 'index']);
// Route::get('/student_search', [StudentController::class, 'search_student']);
// Route::get('/student/{id}', 
//     [StudentController::class, 'find_student']
// )->where('id', '[0-9]+');

// Route::delete('/student_delete/{id}', [StudentController::class, 'delete_student'])->name('student_delete');
// Route::get('/chay', function () {
//     return view('chay');
// });
Route::controller(StudentController::class)->group(function () {
    Route::get('/student', 'index');
    Route::get('/studentsearch', 'search_student');
    Route::get('/student/{id}/{name}/', 'find_student')->where('id', '[0-9]+')->name('find_student');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('person', [PersonController::class, 'create'])
->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

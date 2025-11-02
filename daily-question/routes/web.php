<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/history', [HomeController::class,'history'])->name('history');

Route::middleware('auth')->group(function(){
    Route::post('/answers', [AnswerController::class,'store'])->name('answers.store');
    Route::get('/answers/{answer}/edit', [AnswerController::class,'edit'])->name('answers.edit');
    Route::put('/answers/{answer}', [AnswerController::class,'update'])->name('answers.update');
    Route::delete('/answers/{answer}', [AnswerController::class,'destroy'])->name('answers.destroy');
});

Route::middleware(['auth','is_admin'])->prefix('admin')->name('admin.')->group(function(){
    Route::resource('questions', QuestionController::class);
});
require __DIR__.'/auth.php';

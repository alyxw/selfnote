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



Auth::routes();

Route::view('/', 'index');
Route::view('/notes', 'notes')->middleware('auth')->name('notes');

Route::group(['prefix' => 'note', 'middleware' => ['auth']], function() {
    Route::get('edit/{note}','NoteController@ViewNoteEditor')->name('note.edit.get');
    Route::post('edit/{note}','NoteController@UpdateNote');
    Route::get('new','NoteController@NewNote');
});



Route::group(['prefix' => 'note', 'middleware' => ['auth']], function() {

});
Route::group(['prefix' => 'api', 'middleware' => ['auth']], function() {
    Route::get('getallnotes','NoteController@GetAllNotes');
    Route::get('getnote/{note}','NoteController@GetNote');
});

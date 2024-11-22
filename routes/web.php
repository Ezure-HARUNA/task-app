<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;


Route::get('/', function () {
  return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
  return view('index', [
    //MEMO: latest()->get()はcreated_atやupdated_atの降順(最新のものから順に)取得するall()メソッドみたいなもの
    'tasks' => Task::latest()->get(),
  ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
  ->name('tasks.create');

Route::post('/tasks', function (Request $request) {
  // dd($request->all());
  $data = $request->validate([
    'title' => 'required|max:255',
    'description' => 'required',
    'long_description' => 'required'
  ]);
  $task = new Task;
  $task->title = $data['title'];
  $task->description = $data['description'];
  $task->long_description = $data['long_description'];
  $task->save();
  return redirect()->route('tasks.show', ['id' => $task->id]);
})->name('tasks.store');

Route::get('/tasks/{id}', function ($id) {

  return view('show', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');





// Route::get('/hello', function () {
//   return 'Hello';
// })->name('hello');

// Route::get('/greet/{name}', function ($name) {
//   return "Hello, {$name}!";
// });

// Route::get('/hallo', function () {
//   return redirect('/hello')->route('hello');
// });

Route::fallback(function () {
  return 'Still got somewhere!';
});


//GET
//POST
//PUT
//DELETE

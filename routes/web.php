<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;


Route::get('/', function () {
  return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
  return view('index', [
    //MEMO: latest()->get()はcreated_atやupdated_atの降順(最新のものから順に)取得するall()メソッドみたいなもの
    'tasks' => Task::latest()->paginate(10),
  ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
  ->name('tasks.create');

Route::post('/tasks', function (TaskRequest $request) {
  $data = $request->validated();
  $task = Task::create($request->validated());
  return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('success', 'タスクを登録しました');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
  $task->update($request->validated());
  return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('success', 'タスクを更新しました');
})->name('tasks.update');

Route::get('/tasks/{task}/edit', function (Task $task) {
  return view('edit', [
    'task' => $task
  ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {

  return view('show', ['task' => $task]);
})->name('tasks.show');

Route::delete('/tasks/{task}', function (Task $task) {
  $task->delete();
  return redirect()->route('tasks.index')
    ->with('success', 'タスクを削除しました');
})->name('tasks.destroy');

Route::fallback(function () {
  return 'Still got somewhere!';
});

<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class Task
{
  public function __construct(
    public int $id,
    public string $title,
    public string $description,
    public ?string $long_description,
    public bool $completed,
    public string $created_at,
    public string $updated_at
  ) {}
}

$tasks = [
  new Task(
    1,
    '週末の食材を買う',
    '八百屋とドラスト、スーパーでそれぞれ買い物する',
    '八百屋: トマト、ニンジン、大根、玉ねぎ、しょうが、ドラスト: 食器用洗剤、入浴剤、目薬、スーパー：厚揚げ、コンソメ、卵、納豆、豆乳、豆板醤',
    false,
    '2023-03-01 12:00:00',
    '2023-03-01 12:00:00'
  ),
  new Task(
    2,
    '天使にラブソングを見る',
    'またあのシスタージョークを浴びるため映画見る',
    null,
    false,
    '2023-03-02 12:00:00',
    '2023-03-02 12:00:00'
  ),
  new Task(
    3,
    'Laravelアプリを作成する',
    '求人ポータルを作成してみる',
    '多機能でかっこいいUIの求人ポータルを作成する',
    true,
    '2023-03-03 12:00:00',
    '2023-03-03 12:00:00'
  ),
  new Task(
    4,
    '犬のさんぽ',
    '散歩しないとジョンが悲しむ',
    null,
    false,
    '2023-03-04 12:00:00',
    '2023-03-04 12:00:00'
  ),
];

Route::get('/', function () {
  return redirect()->route('tasks.index');
});

Route::get('/tasks', function () use ($tasks) {
  return view('index', [
    'tasks' => $tasks
  ]);
})->name('tasks.index');

Route::get('tasks/{id}', function ($id) use ($tasks) {
  // return view('');
  $task = collect($tasks)->firstWhere('id', $id);
  if (!$task) {
    abort(Response::HTTP_NOT_FOUND);
  }
  return view('show', ['task' => $task]);
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

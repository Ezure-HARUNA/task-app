@extends('layouts.app')
@section('title', 'タスク一覧')

@section('content')
  {{-- @if (count($tasks)) --}}
  <div>
    <a href="{{ route('tasks.create') }}">タスクを追加する</a>
  </div>
  <br>
  @forelse ($tasks as $task)
    <div>
      <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
    </div>
  @empty
    <div>タスクがありません</div>
  @endforelse
  @if ($tasks->count())
    <nav>{{ $tasks->links() }}</nav>
  @endif
  {{-- @endif --}}
@endsection

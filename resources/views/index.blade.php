@extends('layouts.app')
@section('title', 'タスク一覧')

@section('content')
  {{-- @if (count($tasks)) --}}
  <nav class="mb-4">
    <a class="font-medium text-gray-700 underline decoration-pink-500" href="{{ route('tasks.create') }}">タスクを追加する</a>
  </nav>
  @forelse ($tasks as $task)
    <div>
      <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['font-bold', 'line-through' => $task->completed])>{{ $task->title }}</a>
    </div>
  @empty
    <div>タスクがありません</div>
  @endforelse
  @if ($tasks->count())
    <nav class="mt-4">{{ $tasks->links() }}</nav>
  @endif
  {{-- @endif --}}
@endsection

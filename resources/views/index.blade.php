@extends('layouts.app')
@section('title', 'タスク一覧')

@section('content')
  {{-- @if (count($tasks)) --}}
  @forelse ($tasks as $task)
    <div>
      <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
    </div>
  @empty
    <div>タスクがありません</div>
  @endforelse
  {{-- @endif --}}
@endsection

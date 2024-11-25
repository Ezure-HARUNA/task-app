@extends('layouts.app')

@section('title', $task->title)

@section('content')
  {{-- <h1>{{ $task->title }}</h1> --}}
  <p>{{ $task->description }}</p>

  @if ($task->long_description)
    <p>{{ $task->long_description }}</p>
  @endif

  <p>{{ $task->created_at }}</p>
  <p>{{ $task->updated_at }}</p>
  <div>
    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST"
      onsubmit="return confirm('本当に削除しますか？');">
      @csrf
      @method('DELETE')
      <button type="submit">削除</button>
    </form>
  </div>
@endsection

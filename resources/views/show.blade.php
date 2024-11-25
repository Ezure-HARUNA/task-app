@extends('layouts.app')

@section('title', $task->title)

@section('content')
  <p>{{ $task->description }}</p>

  @if ($task->long_description)
    <p>{{ $task->long_description }}</p>
  @endif

  <p>{{ $task->created_at }}</p>
  <p>{{ $task->updated_at }}</p>

  <p>
    @if ($task->completed)
      完了
    @else
      未完
    @endif
  </p>

  <div>
    <a href="{{ route('tasks.edit', ['task' => $task]) }}">更新する</a>
  </div>

  <div>
    <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
      @csrf
      @method('PUT')
      <button type="submit">
        {{ $task->completed ? '未完' : '完了' }}に切り替える
      </button>
    </form>
  </div>

  <div>
    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST"
      onsubmit="return confirm('本当に削除しますか？');">
      @csrf
      @method('DELETE')
      <button type="submit">削除</button>
    </form>
  </div>
@endsection

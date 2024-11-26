@extends('layouts.app')

@section('title', $task->title)

@section('content')
  <div class="mb-4">
    <a class="font-medium text-gray-700 underline decoration-pink-500" href="{{ route('tasks.index') }}">← タスク一覧に戻る</a>
  </div>
  <p class="mb-4 text-slate-700">{{ $task->description }}</p>

  @if ($task->long_description)
    <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
  @endif

  <p class="mb-4 text-sm text-slate-500">
    {{ $task->created_at->diffForHumans() }}に作成・{{ $task->updated_at->diffForHumans() }}に更新
  </p>

  <div class="flex items-center mb-8">
    <p>
      @if ($task->completed)
        <span class="font-medium text-green-500">完了</span>
      @else
        <span class="font-medium text-red-500">未完</span>
      @endif
    </p>
    <div class="ml-4">
      <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
        @csrf
        @method('PUT')
        <button type="submit" class="btn">
          {{ $task->completed ? '未完' : '完了' }}に切り替える
        </button>
      </form>
    </div>
  </div>
  <div class="flex items-center">
    <div class="mb-4">
      <a href="{{ route('tasks.edit', ['task' => $task]) }}"
        class="rounded-md px-4 py-2 font-medium ring-1 ring-slate-700 shadow-sm bg-blue-400 hover:bg-slate-50 text-navy"><i
          class="fas fa-pen">更新する</i></a>
    </div>
    <div class="mb-4 ml-4">
      <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST"
        onsubmit="return confirm('本当に削除しますか？');">
        @csrf
        @method('DELETE')
        <button type="submit"
          class="rounded-md px-4 py-2 font-medium ring-1 ring-black shadow-sm bg-red-400 hover:bg-red-600 text-navy"> <i
            class="fas fa-trash-alt mr-2"></i>削除する </button>
      </form>
    </div>
  </div>


@endsection

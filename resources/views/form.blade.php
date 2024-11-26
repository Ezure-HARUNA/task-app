@extends('layouts.app')

@section('title', isset($task) ? 'タスクの編集' : 'タスクの追加')


@section('content')
  <form method="POST" action="{{ isset($task) ? Route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
    @csrf
    @isset($task)
      @method('PUT')
    @endisset
    <div class="mb-4">
      <label for="title">タイトル</label>
      <input type="text" name="title" id="title" @class(['border-red-500' => $errors->has('title')])
        value="{{ $task->title ?? old('title') }}">
      @error('title')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-4">
      <label for="description">概要</label>
      <textarea name="description" rows="5" @class(['border-red-500' => $errors->has('title')])>{{ $task->description ?? old('description') }}</textarea>
      @error('description')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-4">
      <label for="long_description">詳細</label>
      <textarea name="long_description" rows="5" @class(['border-red-500' => $errors->has('title')])>{{ $task->long_description ?? old('long_description') }}</textarea>
      @error('long_description')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>
    <div class="flex gap-2 items-center">
      <button type="submit" class="btn">
        @isset($task)
          タスクの更新
        @else
          タスクの追加
        @endisset
      </button>
      <a href="{{ route('tasks.index') }}" class="link">キャンセル</a>
    </div>
  </form>
@endsection

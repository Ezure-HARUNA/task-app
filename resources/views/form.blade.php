@extends('layouts.app')

@section('title', isset($task) ? 'タスクの編集' : 'タスクの追加')

@section('styles')
  <style>
    .error-message {
      color: red;
      font-size: 0.8rem;
    }
  </style>
@endsection

@section('content')
  <form method="POST" action="{{ isset($task) ? Route('tasks.update', ['task => $task->id']) : route('tasks.store') }}">
    @csrf
    @isset($task)
      @method('PUT')
    @endisset
    <div>
      <label for="title">タイトル</label>
      <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}">
      @error('title')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <label for="description">概要</label>
      <textarea name="description" rows="5">{{ $task->description ?? old('description') }}</textarea>
      @error('description')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <label for="long_description">詳細</label>
      <textarea name="long_description" rows="5">{{ $task->long_description ?? old('long_description') }}</textarea>
      @error('long_description')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <button type="submit">
        @isset($task)
          タスクの更新
        @else
          タスクの追加
        @endisset
      </button>
    </div>
  </form>
@endsection

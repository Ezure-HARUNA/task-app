@extends('layouts.app')

@section('title', 'タスクの編集')

@section('styles')
  <style>
    .error-message {
      color: red;
      font-size: 0.8rem;
    }
  </style>
@endsection

@section('content')
  <form method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}">
    @csrf
    @method('PUT')
    <div>
      <label for="title">タイトル</label>
      <input type="text" name="title" id="title" value="{{ $task->title }}">
      @error('title')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <label for="description">概要</label>
      <textarea name="description" rows="5">{{ $task->description }}</textarea>
      @error('description')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <label for="long_description">詳細</label>
      <textarea name="long_description" rows="5">{{ $task->long_description }}</textarea>
      @error('long_description')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <button type="submit">編集</button>
    </div>
  </form>
@endsection

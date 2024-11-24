@extends('layouts.app')

@section('title', 'タスクの追加')

@section('styles')
  <style>
    .error-message {
      color: red;
      font-size: 0, 8rem;
    }
  </style>
@endsection

@section('content')
  <form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <div>
      <label for="title">タイトル</label>
      <input type="text" name="title" id="title">
      @error('title')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <label for="description">概要</label>
      <textarea name="description" rows="5"></textarea>
      @error('description')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <label for="long_description">詳細</label>
      <textarea name="long_description" rows="5"></textarea>
      @error('long_description')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <button type="submit">追加</button>
    </div>
  </form>
@endsection

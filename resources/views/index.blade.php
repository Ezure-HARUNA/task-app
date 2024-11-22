<h2>
  タスクの一覧
</h2>

<div>
  {{-- @if (count($tasks)) --}}
  @forelse ($tasks as $task)
    <div>
      <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
    </div>
  @empty
    <div>タスクがありません</div>
  @endforelse
  {{-- @endif --}}
</div>

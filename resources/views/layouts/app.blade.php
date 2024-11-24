<!DOCTYPE html>
<html>

<head>
  <title>Laravel11のタスク管理アプリ</title>
  @yield('styles')
</head>

<body>
  <h1>@yield('title')</h1>
  @if (session()->has('success'))
    <div>{{ session('success') }}</div>
  @endif
  <div>
    @yield('content')
  </div>

</body>

</html>

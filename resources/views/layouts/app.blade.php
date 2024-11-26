<!DOCTYPE html>
<html>

<head>
  <title>Laravel11のタスク管理アプリ</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @yield('styles')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
  <h1 class="text-2xl mb-4">@yield('title')</h1>
  @if (session()->has('success'))
    <div>{{ session('success') }}</div>
  @endif
  <div>
    @yield('content')
  </div>

</body>

</html>

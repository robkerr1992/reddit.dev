<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reddit</title>
</head>
<body>
    @if (session()->has('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @yield('content')
</body>
</html>
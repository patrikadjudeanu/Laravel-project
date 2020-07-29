<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body style="overflow-x: hidden;">
    @include('includes.header')
    <div class="container">
        <div id = "content">
            @yield('content')
        </div>
    </div>
</body>
</html>
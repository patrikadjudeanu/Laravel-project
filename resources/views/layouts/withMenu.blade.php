<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body style="background-color:#ffe6e6;overflow-x: hidden;">
<div class="container-fluid">
    <div class = "row">
        <div class = "col-1">
            @include('includes.sidebar')
        </div>
        <div class = "col-11">
            <div class = "d-flex justify-content-center">
                <div id = "content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
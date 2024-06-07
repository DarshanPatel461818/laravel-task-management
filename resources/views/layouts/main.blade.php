<!doctype html>
<html lang="en">
<head>
    @include('includes.header')
</head>
<body>

@include('partials.navbar')

<div class="container-fluid">
    @yield('content')
</div>

@include('includes.footer')

</body>
</html>

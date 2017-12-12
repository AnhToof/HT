<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('layouts.header')

    @include('layouts.sidebar')
    @yield('content')
    @include('layouts.footer')
</div>
@include('layouts.script')

</body>

</html>
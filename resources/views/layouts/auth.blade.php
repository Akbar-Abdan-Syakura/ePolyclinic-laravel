<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.auth.meta')
    <title>@yield('title') | ePolyclinic</title>

    @stack('before-style')
    @include('includes.auth.style')
    @stack('after-style')
</head>

<body>
    @yield('content')

    @stack('before-script')
    @stack('after-script')

    {{-- modals --}}

</body>

</html>
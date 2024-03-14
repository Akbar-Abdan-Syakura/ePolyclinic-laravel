<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.auth.meta')
    <title>@yield('title') | ePoliclinic</title>

    @stack('before-style')
    @include('includes.auth.style')
    @stack('after-style')
</head>

<body>
    @include('sweetalert::alert')

    @yield('content')

    @stack('before-script')
    @include('includes.frontsite.script')
    @stack('after-script')

    {{-- modals --}}

</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes/head')
</head>

<body>

    <div class="super_container">

        {{-- Header --}}

        <header class="header trans_300">
            @include('includes/header')
        </header>

        {{-- content --}}
        @yield('content')

        {{-- Footer --}}

        @include('includes/footer')

    </div>

    @include('includes/scripts')

</body>

</html>

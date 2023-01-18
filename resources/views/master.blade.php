<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">

    {{-- css --}}
    @vite('resources/css/app.css')

    {{-- livewire --}}
    @livewireStyles

    <title>@yield('title')</title>
</head>
<body class="scrollbar scrollbar-w-2 scrollbar-h-0.5 scrollbar-thumb-emerald-500 scrollbar-thumb-rounded-lg scrollbar-track-rounded-lg scrollbar-track-emerald-200">
    @include('components.navbar')
    <div class="lg:mx-32 mx-5 py-20">
        @yield('content')
    </div>
    @include('components.footer')

    @livewireScripts
</body>
</html>

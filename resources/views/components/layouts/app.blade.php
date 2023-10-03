<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme-mode="system">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    @livewireStyles
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/alpine.js'])
</head>
<body>
<div class="wrapper">
        <main class="content">
            {{ $slot }}
        </main>
    </div>
</div>

@stack('modals')
<livewire:scripts />
@stack('scripts')

</body>
</html>

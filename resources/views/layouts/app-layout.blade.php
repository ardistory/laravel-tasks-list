<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | ardiStory</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    {{ $style }}
</head>

<body class="bg-black text-white">
    <x-navbar></x-navbar>

    <div class="container mx-auto px-4 md:px-0">
        {{ $slot }}
    </div>
    <script src="{{ asset('build/assets/app-154cb3de.js') }}"></script>
</body>

</html>

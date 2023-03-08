<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/heroicons/0.4.2/heroicons.min.css">
    <title>FraudScan</title>
</head>
<body>
    <div class="min-h-full">
        @include('components.navbar')
        <main class="py-24">
            <div class="mx-auto max-w-7xl py-34 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Idea</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-background text-foreground">
    <x-layout.nav />
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
        {{ $slot }}
    </main>
</body>
</html>

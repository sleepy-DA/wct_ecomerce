<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Skincare Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-pink-50 font-sans text-gray-800">
    <nav class="bg-pink-500 p-4 text-white shadow">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="/" class="font-bold text-xl">Skincare Shop</a>
            <a href="/" class="hover:underline">Back to Home</a>
        </div>
    </nav>

    <main class="py-10">
        <div class="max-w-7xl mx-auto px-4">
            @yield('content')
        </div>
    </main>
</body>
</html>

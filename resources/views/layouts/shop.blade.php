<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Skincare</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-pink-50 font-sans text-gray-800">
    <header class="bg-pink-500 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Skincare Shop</h1>
            <a href="/" class="text-sm hover:underline">Back to Home</a>
        </div>
    </header>

    <main class="py-10 container mx-auto">
        @yield('content')
    </main>

    <footer class="bg-pink-200 text-center text-sm p-4 mt-10">
        &copy; {{ date('Y') }} Skincare. All rights reserved.
    </footer>
</body>
</html>

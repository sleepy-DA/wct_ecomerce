<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'Shop | Skincare Bliss')</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

  <style>
    :root {
      --pink: #ff69b4;
      --dark-pink: #ff1493;
      --white: #ffffff;
      --black: #111111;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--white);
      color: var(--black);
      margin: 0;
      padding: 0;
    }

    header {
      background-color: var(--pink);
      color: white;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    nav a {
      color: white;
      margin-left: 20px;
      text-decoration: none;
      font-weight: bold;
    }

    nav a:hover {
      text-decoration: underline;
    }

    .container {
      max-width: 1200px;
      margin: 30px auto;
      padding: 20px;
    }

    footer {
      background-color: var(--pink);
      color: white;
      text-align: center;
      padding: 20px;
    }
  </style>
</head>
<body>
  <header>
    <h2>Skincare Bliss</h2>
    <nav>
      <a href="{{ route('home') }}">Home</a>
      <a href="{{ route('shop.index') }}">Shop</a>
      <a href="{{ route('contact') }}">Contact</a>
    </nav>
  </header>

  <div class="container">
    @yield('content')
  </div>

  <footer>
    <p>&copy; 2025 Skincare Bliss. All rights reserved.</p>
  </footer>
</body>
</html>

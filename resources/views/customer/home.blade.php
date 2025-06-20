<!DOCTYPE html>
<html>
<head>
    <title>Skincare Bliss - Customer Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --pink: #ff69b4;
            --dark-pink: #ff1493;
            --soft-pink: #fff0f5;
            --baby-blue: #add8e6;
            --white: #ffffff;
            --black: #111111;
            --light-gray: #f8f8f8;
            --medium-gray: #e0e0e0;
            --dark-gray: #444444;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--white);
            color: var(--black);
            line-height: 1.6;
        }

        .customer-home {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
            background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 240, 245, 0.95)), 
                        url('https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?ixlib=rb-4.0.3') center/cover;
        }

        .welcome-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 50px 40px;
            box-shadow: var(--shadow);
            max-width: 700px;
            width: 100%;
        }

        .welcome-icon {
            font-size: 4rem;
            color: var(--pink);
            margin-bottom: 20px;
        }

        .welcome-title {
            font-size: 2.5rem;
            color: var(--dark-gray);
            margin-bottom: 20px;
        }

        .welcome-text {
            font-size: 1.2rem;
            color: var(--dark-gray);
            margin-bottom: 40px;
            line-height: 1.8;
        }

        .action-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            background: linear-gradient(135deg, var(--pink), var(--dark-pink));
            color: white;
            padding: 15px 35px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(255, 105, 180, 0.3);
        }

        .action-btn i {
            margin-right: 10px;
        }

        .action-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(255, 20, 147, 0.4);
        }

        .logout-btn {
            background: var(--soft-pink);
            color: var(--pink);
        }

        .logout-btn:hover {
            background: var(--pink);
            color: white;
        }
    </style>
</head>
<body>
    <div class="customer-home">
        <div class="welcome-container">
            <div class="welcome-icon">
                <i class="fas fa-spa"></i>
            </div>
            <h1 class="welcome-title">Welcome to Skincare Bliss</h1>
            <p class="welcome-text">
                You're logged in as a valued customer. Discover our premium skincare collection,
                manage your account, and enjoy a personalized shopping experience crafted just for you.
            </p>
            
            <div class="action-links">
                <a href="{{ route('shop.index') }}" class="action-btn">
                    <i class="fas fa-shopping-bag"></i> Shop Now
                </a>
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="action-btn logout-btn">
                   <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</body>
</html>
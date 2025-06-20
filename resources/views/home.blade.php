<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Skincare Bliss - Premium Natural Skincare</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

  <style>
    :root {
      --pink: #ff69b4;
      --dark-pink: #e94a96;
      --soft-pink: #fff5f9;
      --mint: #d7f0e1;
      --white: #ffffff;
      --off-white: #fafafa;
      --black: #111111;
      --light-gray: #f8f8f8;
      --medium-gray: #e0e0e0;
      --dark-gray: #444444;
      --text-gray: #666666;
      --shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      --shadow-hover: 0 8px 30px rgba(0, 0, 0, 0.1);
      --radius: 16px;
      --transition: all 0.3s ease;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--off-white);
      color: var(--dark-gray);
      line-height: 1.7;
      overflow-x: hidden;
    }

    .container {
      width: 100%;
      max-width: 1280px;
      margin: 0 auto;
      padding: 0 30px;
    }

    section {
      padding: 100px 0;
    }

    h2.section-title {
      font-size: 2.8rem;
      text-align: center;
      margin-bottom: 60px;
      position: relative;
      color: var(--dark-gray);
      font-weight: 700;
    }

    h2.section-title::after {
      content: '';
      display: block;
      width: 100px;
      height: 5px;
      background: linear-gradient(90deg, var(--pink), var(--mint));
      margin: 20px auto 0;
      border-radius: 10px;
    }

    /* Header Styles */
    header {
      background-color: var(--white);
      padding: 20px 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
      transition: var(--transition);
    }

    header.scrolled {
      padding: 12px 0;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .header-inner {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
    }

    .logo-container {
      display: flex;
      align-items: center;
    }

    .logo {
      font-size: 2rem;
      font-weight: 700;
      color: var(--pink);
      text-decoration: none;
      display: flex;
      align-items: center;
      transition: var(--transition);
    }

    .logo i {
      margin-right: 10px;
      font-size: 1.8rem;
    }

    .logo:hover {
      transform: scale(1.02);
    }

    .tagline {
      font-size: 0.95rem;
      color: var(--text-gray);
      margin-left: 20px;
      font-style: italic;
      position: relative;
      padding-left: 20px;
    }

    .tagline::before {
      content: "";
      position: absolute;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      height: 60%;
      width: 2px;
      background: var(--medium-gray);
    }

    nav {
      display: flex;
      align-items: center;
      gap: 25px;
    }

    .nav-links {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .nav-links li {
      margin: 0 15px;
    }

    .nav-links a {
      color: var(--black);
      text-decoration: none;
      font-weight: 500;
      font-size: 1.05rem;
      transition: var(--transition);
      position: relative;
      padding: 8px 0;
    }

    .nav-links a:hover {
      color: var(--pink);
    }

    .nav-links a::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 3px;
      background: var(--pink);
      transition: var(--transition);
      border-radius: 3px;
    }

    .nav-links a:hover::after {
      width: 100%;
    }

    .nav-actions {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .btn-cart, .btn-search {
      background: var(--soft-pink);
      color: var(--pink);
      border-radius: 50%;
      width: 46px;
      height: 46px;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      transition: var(--transition);
      cursor: pointer;
    }

    .btn-cart:hover, .btn-search:hover {
      background: var(--pink);
      color: white;
      transform: translateY(-3px);
      box-shadow: var(--shadow-hover);
    }

    .cart-count {
      position: absolute;
      top: -6px;
      right: -6px;
      background: var(--dark-pink);
      color: white;
      font-size: 0.75rem;
      width: 22px;
      height: 22px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 600;
    }

    .user-actions {
      display: flex;
      gap: 15px;
    }

    .user-action {
      color: var(--dark-gray);
      transition: var(--transition);
      font-size: 1.1rem;
    }

    .user-action:hover {
      color: var(--pink);
      transform: translateY(-2px);
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(105deg, rgba(255,255,255,0.9) 55%, rgba(255,240,245,0.7) 100%), 
                  url('https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?ixlib=rb-4.0.3') center/cover;
      min-height: 100vh;
      display: flex;
      align-items: center;
      padding-top: 100px;
      position: relative;
    }

    .hero-content {
      max-width: 700px;
      padding: 40px;
      background: rgba(255, 255, 255, 0.88);
      border-radius: var(--radius);
      backdrop-filter: blur(8px);
      box-shadow: var(--shadow);
      transform: translateY(20px);
      animation: fadeUp 1s ease forwards;
    }

    @keyframes fadeUp {
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .hero h1 {
      font-size: 3.5rem;
      font-weight: 800;
      margin-bottom: 25px;
      color: var(--dark-gray);
      line-height: 1.15;
    }

    .hero p {
      font-size: 1.35rem;
      margin-bottom: 35px;
      color: var(--text-gray);
      max-width: 90%;
    }

    /* Features Section */
    .features {
      background-color: var(--white);
    }

    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 35px;
    }

    .feature-card {
      background: var(--off-white);
      padding: 40px 30px;
      border-radius: var(--radius);
      text-align: center;
      box-shadow: var(--shadow);
      transition: var(--transition);
      border: 1px solid var(--soft-pink);
    }

    .feature-card:hover {
      transform: translateY(-12px);
      box-shadow: var(--shadow-hover);
      border-color: rgba(255, 105, 180, 0.2);
    }

    .feature-icon {
      font-size: 2.8rem;
      background: linear-gradient(135deg, var(--pink), var(--dark-pink));
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      margin-bottom: 25px;
      display: inline-block;
    }

    .feature-card h3 {
      font-size: 1.5rem;
      margin-bottom: 18px;
      color: var(--dark-gray);
    }

    .feature-card p {
      color: var(--text-gray);
      font-size: 1.05rem;
    }

    /* Skincare Essentials Section - No Images */
    .essentials {
      background: var(--soft-pink);
    }

    .essentials-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 30px;
    }

    .essentials-card {
      background: var(--white);
      border-radius: var(--radius);
      padding: 40px 30px;
      text-align: center;
      box-shadow: var(--shadow);
      transition: var(--transition);
      position: relative;
      overflow: hidden;
      border: 1px solid rgba(255, 105, 180, 0.1);
    }

    .essentials-card:hover {
      transform: translateY(-10px);
      box-shadow: var(--shadow-hover);
    }

    .essentials-icon {
      font-size: 3rem;
      margin-bottom: 25px;
      color: var(--pink);
      position: relative;
      display: inline-block;
    }

    .essentials-icon::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 60px;
      height: 3px;
      background: var(--pink);
      border-radius: 2px;
    }

    .essentials-card h3 {
      font-size: 1.6rem;
      margin-bottom: 20px;
      color: var(--dark-gray);
    }

    .essentials-card p {
      color: var(--text-gray);
      margin-bottom: 25px;
      font-size: 1.05rem;
    }

    .benefits-list {
      text-align: left;
      margin-bottom: 30px;
    }

    .benefits-list li {
      margin-bottom: 12px;
      padding-left: 25px;
      position: relative;
      list-style: none;
    }

    .benefits-list li::before {
      content: "\f00c";
      font-family: "Font Awesome 5 Free";
      font-weight: 900;
      position: absolute;
      left: 0;
      top: 2px;
      color: var(--pink);
    }

    /* About Section */
    .about {
      background: var(--off-white);
    }

    .about-content {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 60px;
      align-items: center;
    }

    .about-text h2.section-title {
      text-align: left;
    }

    .about-text h2.section-title::after {
      margin: 20px 0;
    }

    .about-text p {
      margin-bottom: 25px;
      color: var(--text-gray);
      font-size: 1.1rem;
    }

    .values-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin-top: 30px;
    }

    .value-item {
      display: flex;
      gap: 15px;
    }

    .value-icon {
      color: var(--pink);
      font-size: 1.3rem;
      margin-top: 5px;
    }

    .value-content h4 {
      font-size: 1.15rem;
      margin-bottom: 5px;
    }

    .value-content p {
      font-size: 0.95rem;
      margin-bottom: 0;
    }

    .about-image {
      border-radius: var(--radius);
      overflow: hidden;
      box-shadow: var(--shadow);
      position: relative;
      height: 550px;
    }

    .about-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .about-image::before {
      content: "";
      position: absolute;
      top: 20px;
      left: 20px;
      right: -20px;
      bottom: -20px;
      border: 2px solid var(--pink);
      border-radius: var(--radius);
      z-index: -1;
    }

    /* Testimonials Section */
    .testimonials {
      background: linear-gradient(to right, var(--soft-pink), rgba(255, 255, 255, 0.8));
      position: relative;
      overflow: hidden;
    }

    .testimonials::before {
      content: "";
      position: absolute;
      top: -100px;
      right: -100px;
      width: 300px;
      height: 300px;
      background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path fill="%23ff69b4" fill-opacity="0.08" d="M28.1,-36.4C34.8,-27.6,37.1,-16.3,38.2,-4.8C39.4,6.7,39.5,18.4,34.6,27.4C29.7,36.4,19.8,42.7,8.8,45.5C-2.2,48.2,-14.4,47.3,-23.9,41.8C-33.4,36.2,-40.1,26,-43.9,14.5C-47.6,3,-48.4,-9.8,-44.2,-20.1C-40.1,-30.5,-31.1,-38.4,-20.9,-46C-10.7,-53.6,0.7,-60.9,11.6,-59.5C22.5,-58.1,32.8,-48,28.1,-36.4Z" transform="translate(50 50)"/></svg>');
      background-size: contain;
      z-index: 0;
    }

    .testimonials-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 35px;
      position: relative;
      z-index: 1;
    }

    .testimonial-card {
      background: var(--white);
      padding: 35px;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      position: relative;
      transition: var(--transition);
    }

    .testimonial-card:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow-hover);
    }

    .testimonial-card::before {
      content: "“";
      font-family: Georgia, serif;
      font-size: 6rem;
      color: var(--pink);
      opacity: 0.15;
      position: absolute;
      top: -30px;
      left: 10px;
      line-height: 1;
    }

    .rating {
      color: #ffc107;
      margin-bottom: 20px;
    }

    .rating i {
      margin-right: 3px;
    }

    .testimonial-text {
      font-style: italic;
      margin-bottom: 25px;
      color: var(--text-gray);
      font-size: 1.05rem;
      position: relative;
      z-index: 1;
    }

    .testimonial-author {
      display: flex;
      align-items: center;
    }

    .author-avatar {
      width: 55px;
      height: 55px;
      border-radius: 50%;
      background: var(--medium-gray);
      margin-right: 18px;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, var(--soft-pink), var(--mint));
    }

    .author-avatar i {
      color: var(--pink);
      font-size: 1.5rem;
    }

    .author-info h4 {
      margin: 0;
      color: var(--dark-gray);
      font-weight: 600;
    }

    .author-info p {
      margin: 0;
      font-size: 0.95rem;
      color: var(--pink);
    }

    /* Newsletter Section */
    .newsletter {
      background: linear-gradient(135deg, var(--dark-pink), var(--pink));
      color: white;
      text-align: center;
      padding: 80px 0;
      border-radius: var(--radius);
      margin: 0 30px;
    }

    .newsletter h2 {
      color: white;
      margin-bottom: 20px;
      font-size: 2.5rem;
    }

    .newsletter p {
      max-width: 650px;
      margin: 0 auto 35px;
      font-size: 1.15rem;
      opacity: 0.9;
    }

    .newsletter-form {
      display: flex;
      max-width: 550px;
      margin: 0 auto;
      background: white;
      border-radius: 60px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .newsletter-form input {
      flex: 1;
      padding: 18px 25px;
      border: none;
      font-size: 1.05rem;
      outline: none;
    }

    .newsletter-form input::placeholder {
      color: var(--medium-gray);
    }

    .newsletter-form button {
      background: var(--black);
      color: white;
      border: none;
      padding: 0 40px;
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
      font-size: 1.05rem;
    }

    .newsletter-form button:hover {
      background: #000;
      letter-spacing: 0.5px;
    }

    /* Footer */
    footer {
      background: var(--dark-gray);
      color: white;
      padding: 80px 0 30px;
      position: relative;
    }

    .footer-content {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 45px;
      margin-bottom: 50px;
    }

    .footer-column h3 {
      font-size: 1.4rem;
      margin-bottom: 25px;
      position: relative;
      padding-bottom: 12px;
    }

    .footer-column h3::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 45px;
      height: 3px;
      background: var(--pink);
    }

    .footer-links {
      list-style: none;
      padding: 0;
    }

    .footer-links li {
      margin-bottom: 14px;
      display: flex;
      align-items: center;
    }

    .footer-links li::before {
      content: "•";
      color: var(--pink);
      margin-right: 10px;
    }

    .footer-links a {
      color: #ddd;
      text-decoration: none;
      transition: var(--transition);
      font-size: 1.05rem;
    }

    .footer-links a:hover {
      color: var(--pink);
      padding-left: 5px;
    }

    .footer-column p {
      color: #bbb;
      margin-bottom: 25px;
      font-size: 1.05rem;
    }

    .social-links {
      display: flex;
      gap: 18px;
      margin-top: 25px;
    }

    .social-links a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 45px;
      height: 45px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      color: white;
      transition: var(--transition);
      font-size: 1.2rem;
    }

    .social-links a:hover {
      background: var(--pink);
      transform: translateY(-5px);
    }

    .contact-info li {
      display: flex;
      align-items: flex-start;
      margin-bottom: 18px;
    }

    .contact-info i {
      color: var(--pink);
      margin-right: 15px;
      min-width: 20px;
      font-size: 1.1rem;
      margin-top: 4px;
    }

    .copyright {
      text-align: center;
      padding-top: 30px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      font-size: 1rem;
      color: #999;
    }

    .back-to-top {
      position: fixed;
      bottom: 30px;
      right: 30px;
      width: 50px;
      height: 50px;
      background: var(--pink);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      opacity: 0;
      visibility: hidden;
      transition: var(--transition);
      z-index: 99;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
    }

    .back-to-top.visible {
      opacity: 1;
      visibility: visible;
    }

    .back-to-top:hover {
      background: var(--dark-pink);
      transform: translateY(-5px);
    }

    /* Button Styles */
    .btn {
      display: inline-block;
      background: linear-gradient(135deg, var(--pink), var(--dark-pink));
      color: white;
      font-size: 1.15rem;
      font-weight: 600;
      padding: 18px 45px;
      border: none;
      border-radius: 60px;
      cursor: pointer;
      text-decoration: none;
      box-shadow: 0 8px 25px rgba(255, 105, 180, 0.3);
      transition: var(--transition);
      position: relative;
      overflow: hidden;
      z-index: 1;
    }

    .btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, var(--dark-pink), var(--pink));
      z-index: -1;
      opacity: 0;
      transition: var(--transition);
    }

    .btn:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 30px rgba(233, 74, 150, 0.4);
    }

    .btn:hover::before {
      opacity: 1;
    }

    .btn-outline {
      background: transparent;
      border: 2px solid var(--pink);
      color: var(--pink);
      box-shadow: none;
    }

    .btn-outline:hover {
      background: var(--pink);
      color: white;
    }

    /* Responsive Styles */
    @media (max-width: 1200px) {
      .hero h1 {
        font-size: 3.2rem;
      }
      
      .about-content {
        gap: 40px;
      }
    }

    @media (max-width: 992px) {
      .hero h1 {
        font-size: 2.8rem;
      }
      
      .about-content {
        grid-template-columns: 1fr;
      }
      
      .about-text h2.section-title {
        text-align: center;
      }
      
      .about-text h2.section-title::after {
        margin: 20px auto;
      }
      
      .about-image {
        max-width: 600px;
        margin: 0 auto;
      }
      
      section {
        padding: 80px 0;
      }
    }

    @media (max-width: 768px) {
      header {
        padding: 15px 0;
      }
      
      .header-inner {
        flex-direction: column;
      }
      
      .logo-container {
        margin-bottom: 15px;
      }
      
      .tagline {
        margin-left: 15px;
        padding-left: 15px;
      }
      
      nav {
        width: 100%;
        justify-content: center;
      }
      
      .nav-links {
        flex-wrap: wrap;
        justify-content: center;
        margin-bottom: 15px;
      }
      
      .nav-links li {
        margin: 8px 12px;
      }
      
      .hero-content {
        padding: 30px;
      }
      
      .hero h1 {
        font-size: 2.5rem;
      }
      
      .hero p {
        font-size: 1.15rem;
      }
      
      .btn {
        padding: 16px 35px;
        font-size: 1.05rem;
      }
      
      .newsletter {
        margin: 0 15px;
      }
      
      .newsletter-form {
        flex-direction: column;
        border-radius: var(--radius);
      }
      
      .newsletter-form input,
      .newsletter-form button {
        border-radius: 0;
        width: 100%;
        text-align: center;
      }
      
      .newsletter-form button {
        padding: 18px;
      }
    }

    @media (max-width: 576px) {
      .hero-content {
        padding: 25px;
      }
      
      .hero h1 {
        font-size: 2.2rem;
      }
      
      .section-title {
        font-size: 2.3rem;
      }
      
      .feature-card, .testimonial-card {
        padding: 30px 20px;
      }
      
      .footer-content {
        gap: 35px;
      }
    }
  </style>
</head>
<body>
  <header id="header">
    <div class="container">
      <div class="header-inner">
        <div class="logo-container">
          <a href="/" class="logo">
            <i class="fas fa-spa"></i> Skincare Bliss
          </a>
          <span class="tagline">Glow Up Starts Here ✨</span>
        </div>
        
        <nav>
          <ul class="nav-links">
    <li><a href="{{ route('shop.index') }}">Shop</a></li>
    <li><a href="#about">About</a></li>
    <li><a href="#essentials">Essentials</a></li>
    <li><a href="#testimonials">Testimonials</a></li>
    <li><a href="{{ route('contact') }}">Contact</a></li>
</ul>
          
          <div class="nav-actions">
            <div class="btn-search">
              <i class="fas fa-search"></i>
            </div>
            <a href="{{ route('cart.index') }}" class="btn-cart">
              <i class="fas fa-shopping-cart"></i>
            </a>
          </div>
          
          <div class="user-actions">
            <a href="{{ route('login') }}" class="user-action" title="Login">
              <i class="fas fa-user"></i>
            </a>
          </div>
        </nav>
      </div>
    </div>
  </header>

  <section class="hero">
    <div class="container">
      <div class="hero-content">
        <h1>Nourish Your Skin Naturally</h1>
        <p>Premium skincare solutions crafted with clean, ethically sourced botanicals for your most radiant complexion.</p>
        <a href="{{ route('shop.index') }}" class="btn">Explore Collection</a>
      </div>
    </div>
  </section>

  <section class="features">
    <div class="container">
      <h2 class="section-title">Why Choose Us</h2>
      <div class="features-grid">
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-leaf"></i>
          </div>
          <h3>Natural Ingredients</h3>
          <p>Pure, ethically sourced botanicals in every formula. Free from parabens, sulfates, and synthetic fragrances.</p>
        </div>
        
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-heart"></i>
          </div>
          <h3>Skin-Loving Formulas</h3>
          <p>Dermatologist-developed solutions that deliver visible results without compromising skin health.</p>
        </div>
        
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-seedling"></i>
          </div>
          <h3>Sustainable Beauty</h3>
          <p>Eco-friendly packaging and responsible sourcing to care for your skin and our planet.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="essentials" class="essentials">
    <div class="container">
      <h2 class="section-title">Skincare Essentials</h2>
      <div class="essentials-grid">
        <div class="essentials-card">
          <div class="essentials-icon">
            <i class="fas fa-water"></i>
          </div>
          <h3>Gentle Cleansers</h3>
          <p>Remove impurities without stripping natural oils. Perfect for all skin types including sensitive skin.</p>
          
          <ul class="benefits-list">
            <li>Maintains skin's natural moisture barrier</li>
            <li>Non-drying formula with botanical extracts</li>
            <li>Effectively removes makeup and impurities</li>
          </ul>
          
          <a href="#" class="btn btn-outline">Shop Cleansers</a>
        </div>
        
        <div class="essentials-card">
          <div class="essentials-icon">
            <i class="fas fa-cloud-rain"></i>
          </div>
          <h3>Hydrating Moisturizers</h3>
          <p>Daily hydration solutions for plump, dewy skin. Lightweight to rich formulas for every need.</p>
          
          <ul class="benefits-list">
            <li>24-hour hydration with hyaluronic acid</li>
            <li>Strengthens skin barrier function</li>
            <li>Non-comedogenic and fast-absorbing</li>
          </ul>
          
          <a href="#" class="btn btn-outline">Shop Moisturizers</a>
        </div>
        
        <div class="essentials-card">
          <div class="essentials-icon">
            <i class="fas fa-flask"></i>
          </div>
          <h3>Targeted Serums</h3>
          <p>High-performance treatments for specific concerns: anti-aging, brightening, and acne control.</p>
          
          <ul class="benefits-list">
            <li>Concentrated active ingredients</li>
            <li>Visible results in 4-6 weeks</li>
            <li>Lightweight texture layers perfectly</li>
          </ul>
          
          <a href="#" class="btn btn-outline">Shop Serums</a>
        </div>
        
        <div class="essentials-card">
          <div class="essentials-icon">
            <i class="fas fa-sun"></i>
          </div>
          <h3>Sun Protection</h3>
          <p>Essential daily defense against UV damage. Lightweight, non-greasy formulas with SPF 30-50.</p>
          
          <ul class="benefits-list">
            <li>Broad spectrum UVA/UVB protection</li>
            <li>Antioxidant-rich formulas</li>
            <li>Non-comedogenic and reef-safe</li>
          </ul>
          
          <a href="#" class="btn btn-outline">Shop Sunscreen</a>
        </div>
      </div>
    </div>
  </section>

  <section id="about" class="about">
    <div class="container">
      <div class="about-content">
        <div class="about-text">
          <h2 class="section-title">Our Story</h2>
          <p>
            At Skincare Bliss, we believe healthy skin begins with pure, thoughtfully formulated products. Founded by skincare enthusiasts frustrated with complicated routines and questionable ingredients, we create solutions that respect your skin's natural balance.
          </p>
          <p>
            Our journey started in a small lab with clean beauty principles. Today, we offer a curated collection that delivers visible results while upholding transparency, sustainability, and skin wellness.
          </p>
          
          <div class="values-grid">
            <div class="value-item">
              <div class="value-icon">
                <i class="fas fa-check-circle"></i>
              </div>
              <div class="value-content">
                <h4>Cruelty-Free</h4>
                <p>Never tested on animals</p>
              </div>
            </div>
            
            <div class="value-item">
              <div class="value-icon">
                <i class="fas fa-check-circle"></i>
              </div>
              <div class="value-content">
                <h4>Vegan Formulas</h4>
                <p>No animal-derived ingredients</p>
              </div>
            </div>
            
            <div class="value-item">
              <div class="value-icon">
                <i class="fas fa-check-circle"></i>
              </div>
              <div class="value-content">
                <h4>Eco-Conscious</h4>
                <p>Sustainable packaging & practices</p>
              </div>
            </div>
            
            <div class="value-item">
              <div class="value-icon">
                <i class="fas fa-check-circle"></i>
              </div>
              <div class="value-content">
                <h4>Transparency</h4>
                <p>Full ingredient disclosure</p>
              </div>
            </div>
          </div>
          
          <a href="#about" class="btn" style="margin-top: 30px">Our Ingredients</a>
        </div>
        <div class="about-image">
          <img src="https://images.unsplash.com/photo-1596462502278-27bfdc403348?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Skincare ingredients">
        </div>
      </div>
    </div>
  </section>


  <!-- Remove the entire newsletter section and replace with: -->
<section id="shop-reviews" class="testimonials">
    <div class="container">
        <h2 class="section-title">Customer Experiences</h2>
        <p class="text-center" style="max-width: 700px; margin: 0 auto 40px; font-size: 1.15rem;">
            Hear what our customers say about their shopping experience
        </p>
    
    <div class="testimonials-grid">
      <div class="testimonial-card">
        <div class="rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p class="testimonial-text">"The shopping experience was seamless! From browsing products to checkout, everything was intuitive. My order arrived faster than expected."</p>
        <div class="testimonial-author">
          <div class="author-avatar">
            <i class="fas fa-user"></i>
          </div>
          <div class="author-info">
            <h4>Emma W.</h4>
            <p>First-time Customer</p>
          </div>
        </div>
      </div>
      
      <div class="testimonial-card">
        <div class="rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <p class="testimonial-text">"Customer service went above and beyond when I had questions about ingredients. They even helped me create a personalized routine!"</p>
        <div class="testimonial-author">
          <div class="author-avatar">
            <i class="fas fa-user"></i>
          </div>
          <div class="author-info">
            <h4>David K.</h4>
            <p>Skincare Enthusiast</p>
          </div>
        </div>
      </div>
      
      <div class="testimonial-card">
        <div class="rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p class="testimonial-text">"The packaging was beautiful and eco-friendly. Love that they include samples with every order! Makes me feel valued as a customer."</p>
        <div class="testimonial-author">
          <div class="author-avatar">
            <i class="fas fa-user"></i>
          </div>
          <div class="author-info">
            <h4>Sophia L.</h4>
            <p>Loyal Customer</p>
          </div>
        </div>
      </div>
    </div>
    
      
      <!-- resources/views/home.blade.php -->
@auth
<form id="experience-form" action="{{ route('share.experience') }}" method="POST" 
      style="max-width: 600px; margin: 30px auto 0; background: white; padding: 30px; border-radius: var(--radius); box-shadow: var(--shadow);">
    @csrf
    <textarea id="experience-text" name="comment" placeholder="Tell us about your shopping experience or our products..." 
              style="width: 100%; min-height: 150px; padding: 15px; border: 1px solid var(--medium-gray); 
                     border-radius: var(--radius); margin-bottom: 20px; 
                     font-family: 'Poppins', sans-serif; font-size: 1rem;"></textarea>
    <button type="submit" class="btn">Submit Feedback</button>
</form>
@else
<div style="text-align: center; margin-top: 30px;">
    <p>Please <a href="{{ route('login') }}" style="color: var(--pink); font-weight: 500;">login</a> to share your experience.</p>
</div>
@endauth
            
            <div id="thank-you-message" style="display: none; max-width: 600px; margin: 30px auto 0; background: var(--soft-pink); 
                 padding: 30px; border-radius: var(--radius); text-align: center;">
                <i class="fas fa-heart" style="font-size: 3rem; color: var(--pink); margin-bottom: 20px;"></i>
                <h3>Thank You!</h3>
                <p>We appreciate you sharing your experience with us.</p>
            </div>
        </div>
    </div>
</section>

  <footer>
    <div class="container">
      <div class="footer-content">
        <div class="footer-column">
          <h3>Skincare Bliss</h3>
          <p>Your journey to healthy, radiant skin begins with pure, effective formulations that respect your skin and our planet.</p>
          <div class="social-links">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-pinterest-p"></i></a>
            <a href="#"><i class="fab fa-tiktok"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
        
        <div class="footer-column">
          <h3>Shop</h3>
          <ul class="footer-links">
            <li><a href="{{ route('shop.index') }}">All Products</a></li>
            <li><a href="#">Best Sellers</a></li>
            <li><a href="#">New Arrivals</a></li>
            <li><a href="#">Skincare Sets</a></li>
            <li><a href="#">Gift Cards</a></li>
          </ul>
        </div>
        
        <div class="footer-column">
          <h3>Information</h3>
          <ul class="footer-links">
            <li><a href="#about">About Us</a></li>
            <li><a href="#">Shipping Policy</a></li>
            <li><a href="#">Returns & Exchanges</a></li>
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Store Locator</a></li>
          </ul>
        </div>
        
        <div class="footer-column">
          <h3>Contact Us</h3>
          <ul class="footer-links contact-info">
            <li>
              <i class="fas fa-envelope"></i>
              <span>hello@skincarebliss.com</span>
            </li>
            <li>
              <i class="fas fa-phone"></i>
              <span>(123) 456-7890</span>
            </li>
            <li>
              <i class="fas fa-map-marker-alt"></i>
              <span>123 Beauty St, Glow City, GL 12345</span>
            </li>
            <li>
              <i class="far fa-clock"></i>
              <span>Mon-Fri: 9AM-6PM EST</span>
            </li>
          </ul>
        </div>
      </div>
      
      <div class="copyright">
        <p>&copy; 2025 Skincare Bliss. All rights reserved. Cruelty-free and vegan formulations.</p>
      </div>
    </div>
  </footer>

  <div class="back-to-top" id="backToTop">
    <i class="fas fa-arrow-up"></i>
  </div>

  <script>
    // Header scroll effect
    window.addEventListener('scroll', function() {
      const header = document.getElementById('header');
      const backToTop = document.getElementById('backToTop');
      
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
      
      if (window.scrollY > 300) {
        backToTop.classList.add('visible');
      } else {
        backToTop.classList.remove('visible');
      }
    });

    // Back to top functionality
    document.getElementById('backToTop').addEventListener('click', function() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });

    // Search functionality
    document.querySelector('.btn-search').addEventListener('click', function() {
      alert('Search functionality would open a search modal in a real implementation');
      // This would typically open a search overlay in a real implementation
    });

    // Animation on scroll
    function animateOnScroll() {
      const elements = document.querySelectorAll('.feature-card, .essentials-card, .testimonial-card');
      
      elements.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.3;
        
        if (elementPosition < screenPosition) {
          element.style.opacity = "1";
          element.style.transform = "translateY(0)";
        }
      });
    }

    // Set initial state for animated elements
    document.querySelectorAll('.feature-card, .essentials-card, .testimonial-card').forEach(card => {
      card.style.opacity = "0";
      card.style.transform = "translateY(30px)";
      card.style.transition = "opacity 0.6s ease, transform 0.6s ease";
    });

    // Run on load and scroll
    window.addEventListener('load', animateOnScroll);
    window.addEventListener('scroll', animateOnScroll);

    // Newsletter form submission
    document.querySelector('.newsletter-form').addEventListener('submit', function(e) {
      e.preventDefault();
      const email = this.querySelector('input[type="email"]').value;
      alert(`Thank you for subscribing with ${email}! You'll receive 15% off your first order.`);
      this.reset();
    });

    // Share experience functionality
document.getElementById('experience-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    const experienceText = document.getElementById('experience-text').value.trim();
    
    if (experienceText) {
        const form = this;
        
        fetch(form.action, {
            method: form.method,
            body: new FormData(form),
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Thank you for your feedback!');
                document.getElementById('thank-you-message').style.display = 'block';
                form.style.display = 'none';
                
                setTimeout(() => {
                    document.getElementById('experience-text').value = '';
                    document.getElementById('thank-you-message').style.display = 'none';
                    form.style.display = 'block';
                }, 3000);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('There was an error. Please try again.');
        });
    } else {
        alert('Please share your experience before submitting.');
    }
});
</script>

</body>
</html>
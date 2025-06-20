<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - Skincare Bliss</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;
      color: #333;
      line-height: 1.6;
    }

    .contact-container {
      max-width: 700px;
      margin: 60px auto;
      padding: 0 20px;
    }

    .contact-header {
      text-align: center;
      margin-bottom: 40px;
    }

    .contact-header h1 {
      color: #ff7eb9;
      margin-bottom: 10px;
      font-size: 2.2rem;
    }

    .contact-details {
      background: white;
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      margin-bottom: 30px;
    }

    .contact-details p {
      margin: 15px 0;
      font-size: 1.05rem;
    }

    .contact-form {
      background: white;
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      margin-bottom: 30px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
    }

    .contact-form input,
    .contact-form textarea {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #e1e5eb;
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.2s;
    }

    .contact-form input:focus,
    .contact-form textarea:focus {
      border-color: #ff7eb9;
      outline: none;
    }

    .btn-submit {
      background-color: #ff7eb9;
      color: white;
      padding: 12px 25px;
      font-size: 1rem;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s;
      font-weight: 500;
      display: block;
      width: 100%;
    }

    .btn-submit:hover {
      background-color: #ff5a9a;
    }

    .map-container {
      background: white;
      border-radius: 12px;
      padding: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      margin-top: 30px;
    }

    iframe {
      width: 100%;
      height: 300px;
      border: none;
      border-radius: 8px;
    }

    .home-link {
      display: inline-block;
      margin-bottom: 30px;
      color: #ff7eb9;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s;
    }

    .home-link:hover {
      color: #ff5a9a;
    }

    .home-link i {
      margin-right: 8px;
    }

    footer {
      background-color: #f8f9fa;
      color: #6c757d;
      text-align: center;
      padding: 25px 20px;
      margin-top: 60px;
      font-size: 0.95rem;
    }
  </style>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="contact-container">
  <a href="{{ url('/') }}" class="home-link">
    <i class="fas fa-arrow-left"></i> Back to Home
  </a>

  <div class="contact-header">
    <h1>Get In Touch</h1>
    <p>We'd love to hear from you. Reach out with any questions or feedback.</p>
  </div>

  <div class="contact-details">
    <p><i class="fas fa-envelope"></i> <strong>Email:</strong> support@skincarebliss.com</p>
    <p><i class="fas fa-phone"></i> <strong>Phone:</strong> +1 (234) 567-8900</p>
    <p><i class="fas fa-map-marker-alt"></i> <strong>Address:</strong> 123 Glow Street, Beauty City, Skinland</p>
    <p><i class="fas fa-clock"></i> <strong>Business Hours:</strong> Mon-Fri, 9:00 AM – 6:00 PM</p>
  </div>

  <div class="contact-form">
    <h2>Send us a message</h2>
    <form method="POST" action="#">
      @csrf
      <div class="form-group">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name" required>
      </div>
      
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required>
      </div>
      
      <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" required>
      </div>
      
      <div class="form-group">
        <label for="message">Your Message</label>
        <textarea id="message" name="message" rows="5" required></textarea>
      </div>
      
      <button type="submit" class="btn-submit">Send Message</button>
    </form>
  </div>

  <div class="map-container">
    <h2>Visit Our Store</h2>
    <iframe 
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.019634887291!2d-122.4194152846811!3d37.7749292797591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809c6d6ff1b3%3A0x37e2f180e25ff9d6!2sSkincare%20Bliss!5e0!3m2!1sen!2sus!4v1620000000000" 
      allowfullscreen 
      loading="lazy">
    </iframe>
  </div>
</div>

<footer>
  <p>&copy; 2025 Skincare Bliss | All Rights Reserved</p>
</footer>

</body>
</html>
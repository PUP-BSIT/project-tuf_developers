<?php
    session_start();
    require_once 'user.php';

    if(!isUserLoggedIn()) {
        header('Location:login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"/>
    <title>Add Journal</title>
</head>
<body>
 <header>
   <div class="logo-container">
     <img src="../Iraya/assets/images/logo.png" 
          alt="Iraya Logo" 
          class="logo" />
      <div class="logo-text">
        <h1>Iraya</h1>
           <p>Simplify Your Journaling Experience</p>
      </div>
   </div>
    <nav>
       <ul>
        <li><a href="./index.php">Home</a></li>
        <li><a href="./login.php">Login</a></li>
        <li><a href="./register.php">Register</a></li>
        <li><a href="./about.php">About</a></li>
       </ul>
    </nav>
</header>
 <h2>Add Your Journey</h2>
       <button class="add-button"> <i class="ri-file-add-fill"></i>></i></i>
            Add Notes</button>
   <div class="journal-container">
      <div class="journal">
       <button class="edit"><i class="ri-edit-fill"></i></button>
       <button class="delete"><i class="ri-chat-delete-fill"></i>
      </i></button>
    </div>
   <div class="hidden"> 
    <textarea></textarea>
   </div> 
   </div>
<footer>
    <div class="footer-container">
      <div class="footer-logo">
        <img src="../Iraya/assets/images/logo.png" 
             alt="Iraya Logo" 
             class="logo" />
        <div class="logo-text">
          <h1>Iraya</h1>
          <p>Simplify Your Journaling Experience</p>
        </div>
      </div>
      <div class="footer-columns">
        <div class="footer-column">
          <h3>Contact</h3>
          <p>Polytechnic University of the Philippines, Taguig, 1632</p>
          <p>Support: support@iraya.com</p>
          <p>General Inquiries: info@iraya.com</p>
        </div>
        <div class="footer-column">
          <h3>Terms & Conditions</h3>
          <p><a href="#">Privacy Policy</a></p>
          <p><a href="#">Follow</a></p>
        </div>
        <div class="footer-column">
          <h3>Follow</h3>
          <p>Stay updated with the latest news and updates from Iraya.</p>
          <form>
            <input type="email" placeholder="Email *" required />
            <button type="submit">Subscribe</button>
          </form>
          <p><a href="#">LinkedIn</a></p>
          <p><a href="#">Instagram</a></p>
          <p><a href="#">Facebook</a></p>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2024 by Iraya. All rights reserved.</p>
    </div>
 </footer>
    <script src="add_journal.js"></script>
</body>
</html>
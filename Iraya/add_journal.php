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
  <div class="add-container">
   <div>
    <button type="button">Back</button>
   </div>
    <form class="journal-form">
      <div>
        <label for="journal_title">Title</label>
          <input type="text" name="journal_title" id="journal_title"
                required>
      </div>
      <div>
          <label for="journal_content">Content</label>
          <textarea name="journal_content"
                id="journal_content" required></textarea>
      </div>
      <button type="button" onclick="insertJournal()">
            Add Journal</button>
    </form>
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
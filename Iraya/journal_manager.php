<?php
session_start();
require_once 'user.php';

if (!isUserLoggedIn()) {
    header('Location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/stylesheets/journal_manager.css">
  <title>Journals</title>
</head>
<body>
  <header>
		<div class="logo-container">
      <img src="./assets/images/logo.png" alt="Iraya Logo" class="logo" />
      <div class="logo-text">
        <h1>Iraya</h1>
        <p>Simplify Your Journaling Experience</p>
      </div>
    </div>
		<nav>
			<ul>
				<li><a href="./index.php">Home</a></li>
				<li><a href="#">Manager</a></li>
				<li><a href="./register.php">Preferences</a></li>
				<li><a href="./about.php">Logout</a></li>
				<li>
						<a href="#" class="get-started-btn">Get Started</a>
				</li>
			</ul>
		</nav>
	</header>
  <div class="main-content">
    <a href="./add_journal.php" class="add-journal">Add Journal</a>
    <table id="journals">
      <tr>
          <th>Title</th>
          <th>Content</th>
          <th>View</th>
          <th>Edit</th>
          <th>Delete</th>
      </tr>
    </table>
  </div>
  <footer>
    <div class="footer-container">
      <div class="footer-logo">
        <img src="./assets/images/logo.png" alt="Iraya Logo" class="logo" />
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
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2024 by Iraya. All rights reserved.</p>
    </div>
  </footer>
  <script src="./scripts/journal_manager.js"></script>
</body>
</html>
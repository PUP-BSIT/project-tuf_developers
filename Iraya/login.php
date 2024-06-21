<?php
    require_once 'user.php';
    session_start();

    if(isUserLoggedIn()){
        header('Location:journal_manager.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        loginUser($username, $password);
    }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<link rel="stylesheet" href="./assets/stylesheets/login.css" />
		<title>Login</title>
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
          <li><a href="#">Home</a></li>
          <li><a href="#">Login</a></li>
          <li><a href="#">Register</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#" class="get-started-btn">Get Started</a></li>
        </ul>
      </nav>
		</header>
        <div>
            <form method="POST">
                <div class="title">
                    <h1>Login</h1>
                </div>
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="username" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
		<footer>
			<div class="footer-container">
				<div class="footer-logo">
					<img
						src="./assets/images/iraya_logo.png"
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
						<p>123 Journal Street, City, Zip Code</p>
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
						<p>
							Stay updated with the latest news and updates
							from Iraya.
						</p>
						<form>
							<input
								type="email"
								placeholder="Email *"
								required
							/>
							<button type="submit">Subscribe</button>
						</form>
						<p><a href="#">LinkedIn</a></p>
						<p><a href="#">Instagram</a></p>
						<p><a href="#">Facebook</a></p>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<p>© 2023 by Iraya. All rights reserved.</p>
			</div>
		</footer>
	</body>
</html>
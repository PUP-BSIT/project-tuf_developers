<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/stylesheets/main.css">
  <link id="theme" rel="stylesheet" href="./assets/stylesheets/light.css">
  <title>About Us</title>
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
        <li><a href="./login.php">Login</a></li>
        <li><a href="./register.php">Register</a></li>
        <li><a href="./about.php">About</a></li>
      </ul>
    </nav>
  </header>
  <main class="pad-3">
    <div class="heading text-center down-5">
      <h1 class="header-about f-3">About Iraya</h1>
      <p>Iraya is an e-journal tool where you can list, organize,
        and manage your digital journals, making it easy to track and
        analyze your entries over time.
      </p>
    </div>
    <div class="about-container">
      <section class="about flex">
        <div class="about-image">
          <img src="./assets/images/about.png" alt="Picture">
        </div>
        <div class="about-content">
          <h2>Capture moments with Iraya</h2>
          <p> Iraya, your modern solution to journaling
            that blends innovation with inspiration. At Iraya, we believe in
            the power of capturing life moments, reflections, and aspirations
            in a way that is both secure and creatively fulfilling.
            Our mission is to simplify and enhance your journaling experience,
            making it a delightful journey through nostalgia.
          </p>
          <h2>Our Vision</h2>
          <p> In today's fast-paced world, we understand the importance
            of preserving memories while adapting to ever-evolving digital
            landscapes. Iraya aims to bridge the gap between traditional
            journaling and modern technology, offering a user-centric platform
            that caters to your personal and creative needs.</p>
          </div>
        </section>
        <section class="team">
          <div class="center">
            <h1>TUF Developers</h1>
          </div>
          <div class="team-container flex text-center">
            <div class="box">
              <img src="./assets/images/Añonuevo_DIT.jpg" 
                alt="Jheferson's Picture" class="width-75 about-image">
                <h3>Jheferson Añonuevo</h3>
                <h5>Project Manager</h5>
            <div class="icons">
            </div>
          </div>
          <div>
            <img src="./assets/images/Roche_DIT.jpg" alt="Maui's Picture" 
              class="width-75 about-image">
              <h3>Maui Jane Roche</h3>
              <h5>UI/UX Designer</h5>
              <div class="icons">
          </div>
          </div>
          <div>
            <img src="./assets/images/Nogadas_DIT.jpg" alt="Von's Picture" 
              class="width-75 about-image">
            <h3>Von Ryan Nogadas</h3>
            <h5>Lead Developer</h5>
            <div class="icons">
          </div>
          </div>
          <div>
            <img src="./assets/images/Donatos_DIT.jpg" alt="Andrea's Picture" 
              class="width-75 about-image">
            <h3>Andrea Donatos</h3>
            <h5>UI/UX Designer</h5>
            <div class="icons">
            </div>
          </div>
          <div>
            <img src="./assets/images/Cahigan_DIT.jpg" alt="Mark's Picture" 
              class="width-75 about-image">
            <h3>Mark Cahigan</h3>
            <h5>Tester</h5>
            <div class="icons">
            </div>
          </div>
        </div>
      </section>
      <div class="text-center">
        <p>"Thank you for choosing Iraya. Embrace change, preserve
          memories, and let your digital story unfold with us."
        </p>
      </div>
    </div>
  </section>
  </main>
  <section class="footer">
    <div class="text-center">
      <p> © 2024 by Iraya. All rights reserved. </p>
    </div>
  </section>
  <button onclick="changeTheme('./assets/stylesheets')" 
    class="theme-button">Change Theme</button>
  <script src="./scripts/theme.js" 
      onload="loadTheme('./assets/stylesheets')"></script>
</body>
</html>
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
      <p>Iraya is an e-journal tool where you can list and track your mood, 
        manage your to-do list, and easily track and analyze your entries
         over time
      </p>
    </div>
    <div class="about-container">
      <section class="about flex">
        <div class="about-image">
          <img src="./assets/images/vision_img.png" alt="Picture">
        </div>
        <div class="about-content">
          <h2>Our Vision</h2>
          <p> Our vision was to create a digital sanctuary where users
              could document and preserve their thoughts and memories.
          </p>
          <h2>Our Mission</h2>
          <p>  Our mission is to simplify and enhance your journaling
              experience, making it a delightful journey through nostalgia.
          </p>
        </div>
      </section>
      <section class="about flex">
            <div class="choose-content">
              <h2>Story Behind Iraya.</h2>
              <p>
              A song by Just Hush called "Iraya." The song beautifully 
              captures the essence of nostalgia, the passage of time, 
              and the enduring beauty or resilience of a person or place. 
              We decided to name our project "Iraya" to pay  deference to the
              song that moved us so deeply. We envisioned an e-journal tool 
              that would allow people to document their thoughts, dreams, 
              and memories, creating a personal space where they could
              revisit and reflect on their journey.  We wanted to create a 
              digital space where users could write, store, and organize 
              their memories seamlessly. The journey of developing Iraya was
              filled with dedication and creativity. We focused on creating a 
              user-friendly interface that captures the essence of our 
              inspiration.  We wanted users to feel a connection to their
              past, present, and future through the entries they create in 
              Iraya.
              </p>
            </div>
            <div class="choose-image">
              <img src="./assets/images/choose_img.png" alt="Picture" />
            </div>
          </section>
        </div>
      <section class="team">
        <div class="center">
          <h1>Developers of Iraya</h1>
        </div>
        <div class="team-container flex text-center">
          <div class="box">
            <img src="./assets/images/Añonuevo_DIT.jpg"
               alt="Jheferson's Picture" class="about-image">
            <h3>Jheferson Añonuevo</h3>
            <h5>Project Manager</h5>
            <div class="icons"></div>
          </div>
          <div class="box">
            <img src="./assets/images/Roche_DIT.jpg"
               alt="Maui's Picture" class="about-image">
            <h3>Maui Jane Roche</h3>
            <h5>UI/UX Designer</h5>
            <div class="icons"></div>
          </div>
          <div class="box">
            <img src="./assets/images/Nogadas_DIT.jpg"
               alt="Von's Picture" class="about-image">
            <h3>Von Ryan Nogadas</h3>
            <h5>Lead Developer</h5>
            <div class="icons"></div>
          </div>
          <div class="box">
            <img src="./assets/images/Donatos_DIT.jpg"
               alt="Andrea's Picture" class="about-image">
            <h3>Andrea Donatos</h3>
            <h5>UI/UX Designer</h5>
            <div class="icons"></div>
          </div>
          <div class="box">
            <img src="./assets/images/Cahigan_DIT.jpg"
               alt="Mark's Picture" class="about-image">
            <h3>Mark Cahigan</h3>
            <h5>Tester</h5>
            <div class="icons"></div>
          </div>
        </div>
      </section>
      <div class="text-center">
        <p>"Thank you for choosing Iraya. Embrace change, preserve
          memories, and let your digital story unfold with us."
        </p>
      </div>
    </div>
  </main>
  <section class="footer">
    <div class="text-center">
      <p>© 2024 by Iraya. All rights reserved.</p>
    </div>
  </section>
  <button onclick="changeTheme('./assets/stylesheets')" 
    class="theme-button">Change Theme</button>
  <script src="./scripts/theme.js" 
    onload="loadTheme('./assets/stylesheets')"></script>
</body>
</html>

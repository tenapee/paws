<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: http://ec2-54-172-219-112.compute-1.amazonaws.com/project/sign_in.html");
} else if (!isset($_SERVER['HTTPS'])) {
  header("Location: https://ec2-54-172-219-112.compute-1.amazonaws.com/project/success.php");
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>PAWS -- Members</title>
    <meta charset="utf-8">
    <meta name="description" content="This is a mock pet-adoption site!">
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="stylesheets/foundation/normalize.css">
    <link rel="stylesheet" href="stylesheets/foundation/foundation.css">
    <script src="javascripts/vendor/jquery.js"></script>
    <script src="javascripts/vendor/modernizr.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Armata|Gochi+Hand|Oxygen|Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <header>
    <div class="row" id="nav">
      <div class="large-3 columns">
        <a href="index.html"><img src="images/PAWS.png" id="paws_logo" /></a>
      </div>
      <div class="large-9 columns" >
        <ul class="inline-list right" id="upper_nav_items">
          <li><a href="index.html">Home</a></li>
          <li><a href="adoptable.php">Adoptable Pets</a></li>
          <li><a href="resources.html">Resources</a></li>
          <li><a href="faq.html">FAQ</a></li>
          <li><a href="sign_in.php">Members</a></li>
          <li><a href="php/logout.php">Logout</a></li>
        </ul>
      </div>
      <h3 id="title">Pet Adoption & Wellness Services</h3>
    </div>
    </header>
    <div class="row" id="mid_body">
      <div class="large-9 push-3 columns">
        <h1 id="welcome">Welcome to PAWS!</h1>
        <p>Thanks for signing in, <?php echo $_SESSION['firstname'] ?>! Please check out all of our <a href="adoptable.php">available</a> pets!</p>
      </div>

      <div class="large-3 pull-9 columns">
        <ul class="side-nav">
          <li><a href="adoptable.php">Adoptable Pets</a></li>
          <li><a href="resources.html">Resources</a></li>
          <li><a href="faq.html">FAQ</a></li>
          <li><a href="sign_in.php">Members</a></li>
        </ul>
        <p><a href="adoptable.php"><img src="images/pickme.jpeg"/></a></p>
      </div>
    </div>

    <footer class="row">
      <div class="large-12 columns">
        <hr />
        <div class="row">
          <div class="large-6 columns">
            <p> &copy; Tena Percy | Belmont University | Spring 2015</p>
          </div>
          <div class="large-6 columns">
            <ul class="inline-list right">
              <li><a href="adoptable.php">Adoptable Pets</a></li>
              <li><a href="resources.html">Resources</a></li>
              <li><a href="faq.html">FAQ</a></li>
              <li><a href="sign_in.php">Members</a></li>

            </ul>
          </div>
        </div>
      </div>
    </footer>
    <script src="javascripts/vendor/zepto.js"></script>
    <script src="javascripts/vendor/fastclick.js"></script>
    <script src="javascripts/foundation.min.js"></script>
    <script>
      $(document).foundation();
      $(document).foundation('reflow');
    </script>
  </body>
</html>
<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: http://ec2-54-172-219-112.compute-1.amazonaws.com/project/success.php");
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
    <script src="javascripts/jquery.validate.min.js"></script>
    <script src="javascripts/vendor/modernizr.js"></script>
    <link href="stylesheets/sign_up.css" rel="stylesheet">
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
          <li><a href="sign_in.html">Members</a></li>
          <li><a href="php/logout.php">Logout</a></li>
        </ul>
      </div>
      <h3 id="title">Pet Adoption & Wellness Services</h3>
    </div>
  </header>

  <div class="center row">

    <ul class="tabs" data-tab>
      <li class="tab-title active"><a href="#panel1">Sign Up</a></li>
      <li class="tab-title"><a href="#panel2">Sign In</a></li>
    </ul>
    <div class="tabs-content">
    <div class="content" data-section-content id="panel1">
      <p>
       <div class="row">
        <div class="large-12 columns">
          <div class="signup-panel">
            <p class="welcome">Hello, new user!</p>
            <form action="php/addUser.php" method="POST" id="signUp">
              <div class="row collapse">
                <div class="small-2  columns">
                  <span class="prefix"><i class="fi-torso"></i></span>
                </div>
                <div class="small-10  columns">
                  <input type="text" placeholder="First Name" name="firstname" id="firstname">
                </div>
              </div>
              <div class="row collapse">
                <div class="small-2 columns">
                  <span class="prefix"><i class="fi-mail"></i></span>
                </div>
                <div class="small-10  columns">
                  <input type="text" placeholder="Last Name" name="lastname" id="lastname">
                </div>
              </div>
              <div class="row collapse">
                <div class="small-2 columns">
                  <span class="prefix"><i class="fi-mail"></i></span>
                </div>
                <div class="small-10  columns">
                  <input type="text" placeholder="Username" name="username" id="username">
                </div>
              </div>
              <div class="row collapse">
                <div class="small-2 columns ">
                  <span class="prefix"><i class="fi-lock"></i></span>
                </div>
                <div class="small-10 columns ">
                  <input type="password" placeholder="Password" name="password" id="password">
                </div>
              </div>
              <input type="submit" name="signup" id="signup" value="Sign Up!" class="button">
            </form>
           <!-- <a href="#" class="button ">Sign Up! </a> -->
          </div>
        </div>
        </div>
    </div>
    <div class="content active" data-section-content id="panel2">
      <p>
      <div class="row">
        <div class="large-12 columns">
          <div class="signup-panel">
            <p class="welcome">Welcome back!</p>
            <form action="php/authenticate.php" method="POST" id="signIn">
              <div class="row collapse">
                <div class="small-2 columns">
                  <span class="prefix"><i class="fi-mail"></i></span>
                </div>
                <div class="small-10  columns">
                  <input type="text" name="username" placeholder="Username" id="username">
                </div>
              </div>
              <div class="row collapse">
                <div class="small-2 columns ">
                  <span class="prefix"><i class="fi-lock"></i></span>
                </div>
                <div class="small-10 columns ">
                  <input type="password" name="password" placeholder="Password" id="password">
                </div>
              </div>
              <input type="submit" name="signin" id="signin" value="Sign In!" class="button">
            </form>
          </div>
        </div>
      </div>
    </div>

</div>
  </div>

  <footer class="row" id="footer">
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
            <li><a href="sign_in.html">Members</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
    <script src="javascripts/vendor/fastclick.js"></script>
    <script src="javascripts/vendor/zepto.js"></script>
    <script src="javascripts/foundation.min.js"></script>
    <script src="javascripts/foundation/foundation.tab.js"></script>
    <script>
      $(document).foundation();
      $(document).foundation('reflow');
    </script>
    <script src="javascripts/validate.js"></script>
  </body>
</html>
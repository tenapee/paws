<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: http://ec2-54-172-219-112.compute-1.amazonaws.com/project/sign_in.html");
}
?>

<html>
  <head>
    <title>PAWS</title>
    <meta charset="utf-8">
    <meta name="description" content="This is a mock pet-adoption site!">
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="stylesheets/table.css">
    <link rel="stylesheet" href="stylesheets/foundation/normalize.css">
    <link rel="stylesheet" href="stylesheets/foundation/foundation.css">
    <script src="javascripts/vendor/jquery.js"></script>
    <script src="javascripts/vendor/modernizr.js"></script>
    <script src="javascripts/wrapper.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Armata|Gochi+Hand|Oxygen|Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <header>
    <div class="row" id="nav">
      <div class="large-3 columns">
        <a href="index.html"><img src="images/PAWS.png" id="paws_logo" /></a>
      </div>
      <div class="large-9 columns">
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
    <section class="search">
      <div class="row">
        <div class="small-12 large-12 columns small-centered" id="formHolder">
          <h2 id="welcome">Find Your Next Pet!</h2>
          <form class="custom" action="php/filter.php" method="POST">
            <div class="row" id="filters">
              <div class="large-2 small-12 columns">
                <label>
                  Species:
                </label>
                  <select id="species" name="species">
                    <option value="dog">Dog</option>

                  </select>
              </div>
              <div class="large-2 small-6 columns">
                <label>
                  Breed:
                </label>
                  <select id="breed" name="breed">
                    <option value="chihuahua">Chihuahua</option>
                    <option value="terrier">Terrier</option>
                    <option value="labrador">Labrador</option>
                    <option value="shepard">Shepard</option>
                    <option value="miniature pinscher">Miniature Pinscher</option>
                    <option value="beagle">Beagle</option>
                    <option value="bulldog">Bulldog</option>
                    <option value="cocker spaniel">Cocker Spaniel</option>
                    <option value="boxer">Boxer</option>
                    <option value="pit bull">Pit Bull</option>
                    <option value="pug">Pug</option>
                    <option value="pomeranian">Pomeranian</option>
                    <option value="mixed">Mixed</option>
                  </select>
              </div>
              <div class="large-2 small-6 columns">
                <label>
                 Sex:
                  </label>
                  <select id="sex" name="sex">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
              </div>
              <div class="large-2 small-6 columns">
                <label>
                  Size:
                    </label>
                    <select id="size" name="size">
                      <option value="small">Small</option>
                      <option value="medium">Medium</option>
                      <option value="large">Large</option>
                    </select>
              </div>

              <div class="large-2 small-12 columns expand">
                <button class="button expand" id="search">Search</button>
                <button class="button expand hide" id="toggleDes" >Toggle Description</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>

<div id="output">
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
              <li><a href="sign_in.html">Members</a></li>
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
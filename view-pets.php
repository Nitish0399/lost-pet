<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Lost Pet Application</title>
    <link rel="stylesheet" href="CSS/info-css.css">
    <link rel="stylesheet" href="CSS/view-pets-css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  </head>
  <body>
      <header>
        <img id="logo" src="Pet images/logo.png" alt="LOGO">
        <h1>Pet Care</h1>
        <nav class="main-nav">
          <a href="index.html">Home</a>
          <a href="ftk.html">Facts To Know</a>
          <a href="faq.html">FAQ</a>
          <a href="license.html">Licensing</a>
          <a href="view-pets.php">View Pets</a>
        </nav>
        <div id="dropdown-nav">
          <button type="button"><i class='fas fa-angle-double-down'></i></button>
          <div id="dropdown">
            <a href="index.html">Home</a>
            <a href="ftk.html">Facts To Know</a>
            <a href="faq.html">FAQ</a>
            <a href="license.html">Licensing</a>
            <a href="view-pets.php">View Pets</a>
          </div>
        </div>
      </header> 
      <main>
        <p>The information for this page is updated daily. If you do not see the animal you are looking for, check back tomorrow.
           If you recogize your pet on this website, please read <a href="">What is the cost to reedem my animal</a> on the Frequently Asked Questions page
            and call Pet Care at (xxxxxxxxxx) immediately.</p>
          <section class="pets-list">
            <?php
            require_once "config.php";

            $sql="SELECT * FROM pets WHERE status='ACTIVE'";
            if($stmt = mysqli_query($conn, $sql))
            {
              $x=1;
                while($img = mysqli_fetch_assoc($stmt))
                {
                    echo  "<div><img id='pi" . $x . "' src='uploads/" . $img["pet_img"] . "' alt='pet image'>" .
                            "<div id='info'><span>Breed : </span>". $img["breed"] . "<br><span>Pet Type : </span>" . $img["pet_type"] .
                            "<br><span>Sex : </span>" . $img["sex"] . "<br><span>Color : </span>" . $img["color"] .
                            "<br><span>Address : </span>" . $img["address"] . "<br><span>City : </span>" . $img["city"] .
                            "<br><span>State : </span>" . $img["state"] . "<br></div>" . "</div>";
                    $x++;
                }
            }
            mysqli_close($conn);
            ?>
          </section>
      </main>
      <footer>
        <p>&copy;  Created by Nitish</p>
        <button type="button" onclick="window.location.href='internal/login.php'" title="Internal">&Delta;</button>
      </footer>
      <script src="JavaScript/view-pets.js"></script>
  </body>
</html>

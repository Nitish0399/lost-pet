<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Lost Pet Application</title>
    <link rel="stylesheet" href="CSS/info-css.css">
    <link rel="stylesheet" href="CSS/view-pets-css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>
      <header>
        <img id="logo" src="Pet images/logo.png" alt="LOGO">
        <h1>Pet Care</h1>
        <nav class="main-nav">
          <a href="home.html">Home</a>
          <a href="ftk.html">Facts To Know</a>
          <a href="faq.html">FAQ</a>
          <a href="license.html">Licensing</a>
          <a href="view-pets.php" style="border:none;">View Pets</a>
        </nav>
      </header>
      <main>
        <p>The information for this page is updated daily. If you do not see the animal you are looking for, check back tomorrow.
           If you recogize your pet on this website, please read <a href="">What is the cost to reedem my animal</a> on the Frequently Asked Questions page
            and call Animal Care at (xxxxxxxxxx) immediately.</p>
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
            <!-- <div id="d2"><img src="Pet images\1280px-IMG_6547.CR2.jpg" alt="pet image"></div>
            <div id="d3"><img src="Pet images\1280px-Long_Coat_Chihuahua_-_Ch_Dazzles_Touch_Of_Midas_1_(16602373985).jpg" alt="pet image"></div>
            <div id="d4"><img src="Pet images\1920px-Finnish_Spitz_-_GCH_Dv9k9's_Red_Hot_Star_aka_Rocket_3_(16415385600).jpg" alt="pet image"></div>
            <div id="d6"><img src="Pet images\Bullterrier_Bull_Terrier_Mirta_4.jpg" alt="pet image"></div> -->
          </section>
      </main>
      <footer>
        <p>&copy;  Created by Nitish</p>
        <button type="button" onclick="window.location.href='internal/login.php'" title="Internal">&Delta;</button>
      </footer>
      <script src="JavaScript/view-pets.js"></script>
  </body>
</html>

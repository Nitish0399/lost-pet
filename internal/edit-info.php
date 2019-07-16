<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!doctype html>
<html>
  <head>
    <title>Logged In</title>
    <link rel="stylesheet" href="../CSS/edit-info.css">
  </head>
  <body>
    <section class="vertical-nav">
      <img id="logo" src="../Pet images/logo.png" alt="LOGO">
      <h1>Pet Care</h1>
      <p>Search Menu</p>
      <nav>
        <a href="search-pet.php">New Search</a>
        <a href="edit-info.php">Edit Pet Details</a>
        <a href="change-status.php">Change Pet Status</a>
        <a href="add-pet.php">Add Pet</a>
      </nav>
    </section>
    <main id="wrapper">
      <div id="header">

      </div>
        <form action="" method="post">
            <ul>
              <li>Type of Pet</li>
              <select name="pet-type">
                <option value="Dog">Dog</option>
                <option value="Cat">Cat</option>
              </select>
              <br>
              <li>Date Picked Up</li>
              <input type="date" name="date_of_pickup" id="d-p-u">
              <br>
              <li>Address</li>
              <input type="text" id="Address" name="Address">
              <br>
              <li>City</li>
              <input type="text" id="City" name="City">
              <br>
              <li>State</li>
              <input type="text" id="State" name="State">
              <br>
              <li>Breed</li>
              <input type="text" id="Breed" name="Breed">
              <br>
              <li>Sex</li>
              <select name="sex">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              <br>
              <li>Colour</li>
              <input type="text" id="text" name="Colour">
              <br>
            </ul>
          <button type="submit" onclick="submitted()">Submit</button>
        </form>
      <button type="button">Back</button>
    </main>
    <div class="user_profile">
      <h3>Welcome, </h3>
      <?php echo htmlspecialchars(strtoupper($_SESSION["username"]));?>
      <a href="logout.php">Log Out</a>
    </div>
    <script src="../JavaScript/edit-script.js"></script>
    <footer>
    </footer>
  </body>
</html>

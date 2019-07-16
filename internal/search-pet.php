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
    <link rel="stylesheet" href="../CSS/search-pet.css">
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
      <div id="keys">
        <ul>
          <li>Type of Pet</li>
          <li>Date Picked Up</li>
          <li>Address</li>
          <li>City</li>
          <li>State</li>
          <li>Breed</li>
          <li>Sex</li>
          <li>Colour</li>
        </ul>
      </div>
      <div id="values">

      </div>
      <button type="button">Back</button>
    </main>
    <div class="user_profile">
      <h3>Welcome, </h3>
      <?php echo htmlspecialchars(strtoupper($_SESSION["username"]));?>
      <a href="logout.php">Log Out</a>
    </div>
    <script src="../JavaScript/search-script.js"></script>
    <footer>
    </footer>
  </body>
</html>

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
    <link rel="stylesheet" href="../CSS/change-status-css.css">
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
          <p class="status">Change Status : <span>ACTIVE</span></p>
          <p> Click on the status value to change </p>
          <button type="submit" onclick="submitted()" id="submit">Save</button>
        </form>
      <button type="button" id="back">Back</button>
    </main>
    <div class="user_profile">
      <h3>Welcome, </h3>
      <?php echo htmlspecialchars(strtoupper($_SESSION["username"]));?>
      <a href="logout.php">Log Out</a>
    </div>
    <script src="../JavaScript/change-status.js"></script>
    <footer>
    </footer>
  </body>
</html>

<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "../config.php";

$pet_type=$date_of_pickup=$address=$city=$state=$breed=$sex=$color=$pet_image="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $pet_type=trim($_POST["pet_type"]);
  $date_of_pickup=trim($_POST["date_of_pickup"]);
  $address=trim($_POST["address"]);
  $city=trim($_POST["city"]);
  $state=trim($_POST["state"]);
  $breed=trim($_POST["breed"]);
  $sex=trim($_POST["sex"]);
  $color=trim($_POST["color"]);
  $pet_image=trim($_POST["pet_image"]);
  if(!empty($pet_type) && !empty($date_of_pickup) && !empty($address) && !empty($city) && !empty($state) &&
      !empty($breed) && !empty($sex) && !empty($color) && !empty($pet_image))
  {

      $sql = "INSERT INTO pets ( pet_type, date_of_pickup, address, city, state, breed, sex, color, pet_img) VALUES (?,?,?,?,?,?,?,?,?)";

      if($stmt = mysqli_prepare($conn, $sql))
      {
          mysqli_stmt_bind_param($stmt, "sssssssss", $param_pet_type, $param_date_of_pickup, $param_address
                                                , $param_city, $param_state, $param_breed, $param_sex
                                              , $param_color, $param_pet_image);
          $param_pet_type=$pet_type;
          $param_date_of_pickup=$date_of_pickup;
          $param_address=$address;
          $param_city=$city;
          $param_state=$state;
          $param_breed=$breed;
          $param_sex=$sex;
          $param_color=$color;
          $param_pet_image=$pet_image;

          if(mysqli_stmt_execute($stmt))
          {
              echo "<br>Successful";
          }
          else
          {
            echo "Error submitting data1";
          }
          mysqli_stmt_close($stmt);
      }
      else
      {
        echo "Error submitting data2";
      }
  }
  else
  {
    echo "Error submitting data3";
  }
}
mysqli_close($conn);
?>
<!doctype html>
<html>
  <head>
    <title>Logged In</title>
    <link rel="stylesheet" href="../CSS/add-pet-css.css">
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
      <h2>Add Pet</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <ul>
            <li>Type of Pet:</li>
            <select name="pet_type" value="<?php echo $pet_type; ?>">
              <option value="Dog">Dog</option>
              <option value="Cat">Cat</option>
            </select>
            <br>
            <li>Date Picked Up:</li>
            <input type="date" id="d-p-u" name="date_of_pickup" value="<?php echo $date_of_pickup; ?>">
            <br>
            <li>Address:</li>
            <input type="text" id="Address" name="address" value="<?php echo $address; ?>">
            <br>
            <li>City:</li>
            <input type="text" id="City" name="city" value="<?php echo $city; ?>">
            <br>
            <li>State:</li>
            <input type="text" id="State" name="state" value="<?php echo $state; ?>">
            <br>
            <li>Breed:</li>
            <input type="text" id="Breed" name="breed" value="<?php echo $breed; ?>">
            <br>
            <li>Sex:</li>
            <select name="sex" value="<?php echo $sex; ?>">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
            <br>
            <li>Colour:</li>
            <input type="text" id="text" name="color" value="<?php echo $color; ?>">
            <br>
            <li>Upload pet image:</li>
            <input type="file" name="pet_image" value="">
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
    <footer>
    </footer>
  </body>
</html>

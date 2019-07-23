<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "../config.php";

$pet_type=$date_of_pickup=$address=$city=$state=$breed=$sex=$color=$pet_image="";
$result="";
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
  if(!empty($pet_type) && !empty($date_of_pickup) && !empty($address) && !empty($city) && !empty($state) &&
      !empty($breed) && !empty($sex) && !empty($color))
  {
      // file upload
      $targetDir = "../uploads/";
      $fileName = basename($_FILES["pet_image"]["name"]);
      $targetFilePath = $targetDir . $fileName;
      $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
      $allowTypes = array('jpg','png','jpeg','gif','pdf');
      if(in_array($fileType, $allowTypes))
      {
          if(!move_uploaded_file($_FILES["pet_image"]["tmp_name"], $targetFilePath))
          {
              echo "Error uploading image";
          }
      }
      else
      {
          $result= 'Only JPG, JPEG, PNG, GIF, & PDF files are allowed';
      }
      $sql = "INSERT INTO pets ( pet_type, date_of_pickup, address, city, state, breed, sex, color, pet_img, status) VALUES (?,?,?,?,?,?,?,?,?,?)";

      if($stmt = mysqli_prepare($conn, $sql))
      {
          mysqli_stmt_bind_param($stmt, "ssssssssss", $param_pet_type, $param_date_of_pickup, $param_address
                                                , $param_city, $param_state, $param_breed, $param_sex
                                              , $param_color, $param_pet_image, $param_status);
          $param_pet_type=ucfirst($pet_type);
          $param_date_of_pickup=ucfirst($date_of_pickup);
          $param_address=ucfirst($address);
          $param_city=ucfirst($city);
          $param_state=ucfirst($state);
          $param_breed=ucfirst($breed);
          $param_sex=ucfirst($sex);
          $param_color=ucfirst($color);
          $param_pet_image=$fileName;
          $param_status="ACTIVE";

          if(mysqli_stmt_execute($stmt))
          {
              $result= "SUCCESS";
          }
          else
          {
            $result= "Error submitting data";
          }
          mysqli_stmt_close($stmt);
      }
      else
      {
        $result= "Error submitting data";
      }
  }
  else
  {
    $result= "Fill In all the details";
  }
}
mysqli_close($conn);
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged In</title>
    <link rel="stylesheet" href="../CSS/add-pet-css.css">
  </head>
  <body>
    <div id="wrapper">
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
      <main>
        <div id="result" style="background: <?php if($result=='SUCCESS') echo '#64d264'; ?>; display: <?php if($result!='') echo 'block'; ?>; ">
          <?php echo $result;?>
        </div>
        <h2>Add Pet</h2>

          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
            <ul>
              <li>Type of Pet:</li>
              <input type="text" name="pet_type" value="<?php echo $pet_type; ?>">
              <br>
              <li>Date Picked Up:</li>
              <input type="date" name="date_of_pickup" value="<?php echo $date_of_pickup; ?>">
              <br>
              <li>Address:</li>
              <input type="text" name="address" value="<?php echo $address; ?>">
              <br>
              <li>City:</li>
              <input type="text" name="city" value="<?php echo $city; ?>">
              <br>
              <li>State:</li>
              <input type="text" name="state" value="<?php echo $state; ?>">
              <br>
              <li>Breed:</li>
              <input type="text" name="breed" value="<?php echo $breed; ?>">
              <br>
              <li>Sex:</li>
              <select name="sex">
                <option value="<?php echo $sex; ?>"hidden selected><?php echo $sex; ?></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              <br>
              <li>Colour:</li>
              <input type="text" id="text" name="color" value="<?php echo $color; ?>">
              <br>
              <li>Upload pet image:</li>
              <input type="file" name="pet_image" value="<?php echo $pet_image; ?>">
            </ul>
            <button type="submit">Submit</button>
          </form>
        <button type="button">Back</button>
      </main>
      <div class="user_profile">
        <h3>Welcome, </h3>
        <span id="username"><?php echo htmlspecialchars(strtoupper($_SESSION["username"]));?></span>
        <a href="logout.php">Log Out</a>
      </div>
    </div>
    <footer>
    </footer>
  </body>
</html>

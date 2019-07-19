<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
require_once "../config.php";

$pet_type=$date_of_pickup=$address=$city=$state=$breed=$sex=$color=$pet_image="";
$pet_breed="";
$result="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $pet_breed=trim($_POST["pet_breed"]);
    if(!empty($pet_breed))
    {
        $sql = "SELECT pet_type, date_of_pickup, address, city, state, breed, sex, color, pet_img FROM pets WHERE breed = ?";

        if($stmt = mysqli_prepare($conn, $sql))
        {
            mysqli_stmt_bind_param($stmt, "s", $param_breed);
            $param_breed = $pet_breed;

            if(mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt,$pet_type,$date_of_pickup,$address,$city,$state,$breed,$sex,$color,$pet_image);
                    mysqli_stmt_fetch($stmt);
                }
                else
                {
                  $result="Pet breed not found.";
                }
            }
            else
            {
                echo "Breed does not exist";
            }
        }
        else
        {
            echo "Oops! Something went wrong. Please try again later";
        }
        mysqli_stmt_close($stmt);
    }
    else
    {
        echo "error";
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
    <link rel="stylesheet" href="../CSS/edit-info.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
        <div id="searchbox">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <input type="text" placeholder="Search" name="pet_breed" autocomplete="off" value="<?php echo $pet_breed; ?>">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
        <div id="error">
          <?php echo $result;?>
        </div>
        <div id="pet_info" style="display:none;">
          <img src="../uploads/<?php echo $pet_image; ?>">
          <h2>Details of breed - <span><?php echo $breed; ?></span></h2>
          <form action="" method="post">
              <ul>
                <li>Type of Pet</li>
                <input type="text" name="pet_type" value="<?php echo $pet_type; ?>">
                <br>
                <li>Date Picked Up</li>
                <input type="date" name="date_of_pickup" value="<?php echo $date_of_pickup; ?>">
                <br>
                <li>Address</li>
                <input type="text" name="Address" value="<?php echo $address; ?>">
                <br>
                <li>City</li>
                <input type="text" name="City" value="<?php echo $city; ?>">
                <br>
                <li>State</li>
                <input type="text" name="State" value="<?php echo $state; ?>">
                <br>
                <li>Breed</li>
                <input type="text" name="Breed" value="<?php echo $breed; ?>">
                <br>
                <li>Sex</li>
                <select name="sex">
                  <option value="<?php echo $sex; ?>" disabled hidden selected><?php echo $sex; ?></option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                <br>
                <li>Colour</li>
                <input type="text" name="Colour" value="<?php echo $color; ?>">
                <br>
              </ul>
            <button type="submit">Submit</button>
          </form>
        <button type="button">Back</button>
      </div>
      </main>
      <div class="user_profile">
        <h3>Welcome, </h3>
        <?php echo htmlspecialchars(strtoupper($_SESSION["username"]));?>
        <a href="logout.php">Log Out</a>
      </div>
    </div>
    <script src="../JavaScript/edit-script.js"></script>
    <footer>
    </footer>
  </body>
</html>

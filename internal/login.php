<?php
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
  header("location: search-pet.html");
  exit;
}

require_once "../config.php";

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username=trim($_POST["username"]);
    if(empty($username))
        $username_err = "Please enter username";

    $password=trim($_POST["password"]);
    if(empty($password))
        $password_err = "Please enter your password";

    if(empty($username_err) && empty($password_err)){

        $sql = "SELECT id, user_name, user_password FROM users WHERE user_name = ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            header("location: search-pet.html");
                        } else{
                            $password_err = "Wrong/invalid password";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Username does not exist";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later";
            }
        }

        mysqli_stmt_close($stmt);
    }
  }
    mysqli_close($conn);
 ?>
<!doctype html>
<html>
  <head>
    <title>Login | Pet Care</title>
    <link rel="stylesheet" href="../CSS/login-css.css">
  </head>
  <body>
  <div class="wrapper">
    <header>
      <img id="logo" src="../Pet images/logo.png" alt="LOGO">
      <h1>Pet Care</h1>
    </header>
    <div class="wrap">
      <div id="slider">
        <img src="../Pet images/1.jpg">
      </div>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <h2>Sign In</h2>
        <div class="form-container">
          <div class="form_elements">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>"><span class="err_msg"><?php echo $username_err;?></span>
          </div>
          <div class="form_elements">
            <label for="password">Password</label>
            <input type="password" id="password" name="password"><span class="err_msg"><?php echo $password_err;?></span>
          </div>
        </div>
        <p id="caution"></p>
        <div class="buttons">
          <button type="submit" class="btn login">LogIn</button>
          <button type="button" class="btn signup" onclick="window.location.href='signup.php'">Sign Up</button>
        </div>
      </form>
      <script src="../JavaScript/login.js"></script>
     </div>
   </div>
    <footer>
      <p>&copy; Created by Nitish</p>
      <button type="button" onclick="window.location.href='../home.html'" title="External">&Delta;</button>
    </footer>
  </body>
</html>

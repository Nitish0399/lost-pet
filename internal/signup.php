<?php

require_once "../config.php";

$username=$email=$password=$c_password="";
$username_err=$email_err=$password_err=$c_password_err="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $username=furnish_input($_POST["username"]);
  if(empty($username) || !preg_match("/^[a-zA-Z ]*$/",$username))
    $username_err="Enter Valid Name";
  $email=furnish_input($_POST["email"]);
  if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
    $email_err="Enter Valid Email ID";
  $password=furnish_input($_POST["password"]);
  if(empty($password))
    $password_err="Enter Valid Password";
  else if(strlen($password)<=6)
    $password_err="Password must contain more than 6 characters";
  $c_password=furnish_input($_POST["c_password"]);
  if(empty($c_password) || $c_password!=$password)
    $c_password_err="Passwords do not match!";


  if(empty($username_err) && empty($email_err) && empty($password_err) && empty($c_password_err) )
  {
    $sql = "INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)";

    if($stmt = mysqli_prepare($conn, $sql))
    {
      mysqli_stmt_bind_param( $stmt ,"sss", $user_name, $user_email, $user_password);

      $user_name=$username;
      $user_email=$email;
      $user_password=password_hash($password,PASSWORD_DEFAULT);

      if(mysqli_stmt_execute($stmt))
      {
          echo "<br>Successful";
      }
      else
      {
        echo "Error submitting data";
      }

      mysqli_stmt_close($stmt);
    }
  }
}
function furnish_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
mysqli_close($conn);
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Pet Care</title>
    <link rel="stylesheet" href="../CSS/signup-css.css">
  </head>
  <body>
    <div class="wrapper">
      <header>
        <img id="logo" src="../Pet images/logo.png" alt="LOGO">
        <h1>Pet Care</h1>
      </header>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <h2>SIGN UP</h2>
        <div class="form_elements">
          <input type="text" name="username" placeholder="Enter Name" value="<?php echo $username; ?>" ><span class="err_msg"><?php echo $username_err;?></span>
        </div>
        <div class="form_elements">
          <input type="text" name="email" placeholder="Enter Email ID" value="<?php echo $email; ?>" ><span class="err_msg"><?php echo $email_err;?></span>
        </div>
        <div class="form_elements">
          <input type="password" name="password" placeholder="Enter Password" ><span class="err_msg"><?php echo $password_err;?></span>
        </div>
        <div class="form_elements">
          <input type="password" name="c_password" placeholder="Confirm Password" ><span class="err_msg"><?php echo $c_password_err;?></span>
        </div>
        <button type="submit" class="btn submit">Sign Up</button>
        <a href="login.php" id="back">Back</a>
      </form>

    </div>
    <footer>
      <p>&copy; Created by Nitish</p>
      <button type="button" onclick="window.location.href='../home.html'" title="External">&Delta;</button>
    </footer>
  </body>
</html>

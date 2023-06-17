<?php
  $showAlert = false;
  $showError = false;
  $exist = false;
  $signup = false;
  require_once('connection.php');
  if (isset($_POST['signup'])) 
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $existsql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = $conn->query($existsql);
    $numexist = mysqli_num_rows($result);
    if($numexist > 0)
    {
      $exist = true;
    }
    else{
      if ($password == $cpassword) 
      {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$hash')";
        $conn->query($sql);
        $showAlert = true;
        echo "<script>window.location.href='../index.php'</script>";
        $signup = true;
        if($signup){
          echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                    <strong>Success!</strong> You can now login
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>'; 
      }
        exit;
      }
      else 
      {
        $showError = true;
        header("Location: index.php?signupsuccess=false&error=wrong password");
      }
    } 
    header("Location: index.php?signupsuccess=false&error=email already in use");
  }
  
    if ($showAlert) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!!!</strong> You have Successfully Registered on iSecure
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if ($showError) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!!!</strong> Your Password must be same... So Please Try again and type same Password
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if ($exist) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!!!</strong> This Username is already exists... So Please Try again a different Username
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
?>
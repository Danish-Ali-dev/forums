<?php
  $showLogin = false;
  $showError = false;
  require_once('connection.php');
  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
      $sql = "SELECT * FROM users WHERE `username` = '$username'";
      $result = $conn->query($sql);
      $num = mysqli_num_rows($result);
      if ($num > 0) {
        while($row = $result->fetch_assoc()){
          if (password_verify($password, $row['password'])){ 
              $showLogin = true;
              session_start();
              $_SESSION['user_id'] = $row['user_id'];
              $_SESSION['username'] = $row['username'];
              $_SESSION['password'] = $row['password'];
              header("location: ../index.php");
          }
          else{
            $showError = true;
          } 
        }
      }
      else {
        $showError = true;
      }
  }
  
    if ($showLogin) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!!!</strong> You have Successfully Login on iDiscuss
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if ($showError) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!!!</strong> Your Username or Password in Invalid
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  ?>
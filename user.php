<?php
include 'connect.php';
$empmsg_firstname = '';
$empmsg_lastname = '';
$empmsg_email = '';
$empmsg_password = '';
$empmsg_password_again = '';

if(isset($_POST['submit'])){
    $user_first_name = $_POST['user_first_name'];
    $user_last_name = $_POST['user_last_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_password_again = $_POST['user_password_again'];

    $md5_user_password = md5($user_password);
    // echo $md5_user_password;
    
    if(empty($user_first_name)){
        $empmsg_firstname = 'Fill up the field';
    }
    if(empty($user_last_name)){
        $empmsg_lastname = 'Fill up the field';
    }
    if(empty($user_email)){
        $empmsg_email = 'Fill up the field';
    }
    if(empty($user_password)){
        $empmsg_password = 'Fill up the field';
    }
    if(empty($user_password_again)){
        $empmsg_password_again = 'Fill up the field';
    }

    if(!empty($user_first_name) && !empty($user_last_name) && !empty($user_email) && !empty($user_password) && !empty($user_password_again)){
        // echo "ok";
        if($user_password === $user_password_again){
            // echo "ok";
            $sql = "INSERT INTO admin_user_table (user_first_name,user_last_name,user_email,user_password) VALUES('$user_first_name','$user_last_name','$user_email','$md5_user_password ') ";
            if($conn->query($sql) == TRUE){
                // echo "user created";
                header ('location:login.php?usercreated');
            }

        }else{
            echo "passward not match";
        }

    }

}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <h4>Signup Page</h4>
    


    <div class="container">
    <form action ="user.php" method = "post">

  <div class="mb-3">
    <label class="form-label">First Name: </label>
    <input type="text" class="form-control" id="exampleInputEmail1" name = "user_first_name" value = "<?php if(isset($_POST['submit'])){echo $user_first_name;}?>">
    <?php if(isset($_POST['submit'])){echo "<span class = 'text-danger'>". $empmsg_firstname. "<span>";} ?>
  </div>

  <div class="mb-3">
    <label class="form-label">Last Name:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name = "user_last_name" value = "<?php if(isset($_POST['submit'])){echo $user_last_name;}?>">
    <?php if(isset($_POST['submit'])){echo "<span class = 'text-danger'>". $empmsg_lastname. "<span>";} ?>
  </div>

  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name = "user_email" value = "<?php if(isset($_POST['submit'])){echo $user_email;}?>">
    <?php if(isset($_POST['submit'])){echo "<span class = 'text-danger'>".$empmsg_email. "<span>";} ?>
  </div>

  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name = "user_password" value = "<?php if(isset($_POST['submit'])){echo $user_password;}?>">
    <?php if(isset($_POST['submit'])){echo "<span class = 'text-danger'>". $empmsg_password. "<span>";} ?>
  </div>

  <div class="mb-3">
    <label class="form-label">Password Again</label>
    <input type="password" class="form-control" name = "user_password_again" value = "<?php if(isset($_POST['submit'])){echo $user_password_again;}?>">
    <?php if(isset($_POST['submit'])){echo "<span class = 'text-danger'>". $empmsg_password_again. "<span>";} ?>
  </div>


  <button type="submit" class="btn btn-primary" name = "submit">Submit</button>
</form>
<h5>Have an account? <a href="login.php">Login</a></h5>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
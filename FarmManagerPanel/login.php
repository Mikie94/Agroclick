<?php
require("../AdminPanel/connection.php");

session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM user WHERE username='$username' && password='$password'";
    $res = mysqli_query($conn, $query);
    
    $count = mysqli_num_rows($res);
    
    if ($count == 1){    
        $_SESSION['username'] = $username;
        header('location:index.php');    
    }
    else{
        echo "Incorrect Password";
        header('location:login.php');
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="../AdminPanel/assets/css/login.css">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
   

            <div class="card">
                <div class="card-header">
                    <h3>Log In</h3>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="username" name="username" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="password" name="password" required>
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" name="login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
              
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Login as Admin <a href="../AdminPanel/index.php" style="text-decoration:none; color:black">Log In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
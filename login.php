<?php
session_start();
include('models/DbConn.php');
if(isset($_POST['login']))
{
    $instance= new DbConn();
    $dbh = $instance->connect();
    $email=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT * FROM users WHERE email=:email and password= :password";
    $query= $dbh-> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $loginData=$query->fetch(PDO::FETCH_OBJ);
    
    if($loginData)
    {
        $_SESSION['alogin']=$_POST['username'];
        $_SESSION['userId']=$loginData->id;
        $_SESSION['status']=$loginData->status;
        
        header('location:index.php');
        //echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    } else{

        echo "<script>alert('Invalid Details Or Account Not Confirmed');</script>";

    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Login</title>
    <?php include __DIR__ . '/head.php'; ?>
</head>

<body>
<div id="site-content">
    <?php include __DIR__ . '/nav.php'; ?>
    <main class="main-content">
        <div class="page">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="index.php">Home</a>
                    <span>Login</span>
                </div>

                <div class="login-page bk-img">
                    <div class="form-content">
                        <div class="">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <h1 class="text-center text-bold mt-4x">Login</h1>
                                    <div class="well row pt-2x pb-3x bk-light">
                                        <div class="col-md-8 col-md-offset-2">
                                            <form method="post">

                                                <label for="" class="text-uppercase text-sm mb-1">Your Email</label>
                                                <input type="text" placeholder="Username" name="username" class="form-control mb-2" required>

                                                <label for="" class="text-uppercase text-sm mb-1">Password</label>
                                                <input type="password" placeholder="Password" name="password" class="form-control mb" required>
                                                <button class="btn btn-warning btn-block mt-2" name="login" type="submit">LOGIN</button>
                                            </form>
                                            <br>
                                            <p>Don't Have an Account? <a href="register.php" >Signup</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div> <!-- .container -->
    </main>
    <?php include __DIR__ . '/footer.php'; ?>
</div>
<!-- Default snippet for navigation -->



<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>

</body>

</html>

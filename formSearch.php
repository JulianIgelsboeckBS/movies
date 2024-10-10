<?php
session_start();
error_reporting(0);
include('DbConn.php');
if(strlen($_SESSION['alogin'])==0)
{
    header('location:login.php');
}
else{
    $instance= new DbConn();
    $dbh = $instance->connect();
    $email = $_SESSION['alogin'];
    $sql = "SELECT * from users where email = (:email);";
    $query = $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $loginData=$query->fetch(PDO::FETCH_OBJ);
    $cnt=1;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Search <?= $loginData->name;?></title>
    <!-- Latest compiled and minified CSS -->
    <?php include __DIR__ . '/head.php'; ?>

</head>
<?php echo htmlentities($loginData->name);?>

<body>
<div id="site-content">
    <?php include __DIR__ . '/nav.php'; ?>
    <main class="main-content">
        <div class="container">
            <div class="page">
                <div class="breadcrumbs">
                    <a href="index.php">Home</a>
                    <span>Filmsuche</span>
                </div>

                <?php include __DIR__ . '/form_search.php'; ?>


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

<?php
session_start();
error_reporting(0);
include('models/DbConn.php');
if (strlen($_SESSION['alogin']) == 0) {
    //header('location:login.php');
} else {
    $instance = new DbConn();
    $dbh = $instance->connect();
    $email = $_SESSION['alogin'];
    $sql = "SELECT * from users where email = (:email);";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $loginData = $query->fetch(PDO::FETCH_OBJ);
    $cnt = 1;
    $status = $loginData->status;
    $id = $_SESSION['userId'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Search <?= $loginData->name; ?></title>

    <?php include __DIR__ . '/head.php'; ?>

</head>

<?php //print_r($_SESSION) ?>

<body>
    <div id="site-content">
        <?php
        if ($status == 1 || $status == 2) {
            if ($status == 2) {
                include __DIR__ . '/navAdmin.php';
            } else {
                include __DIR__ . '/navLogout.php';
            }
        } else {
            include __DIR__ . '/nav.php';
        }

        ?>
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



        <!-- Default snippet for navigation -->


        <?php include __DIR__ . '/footer.php'; ?>
    </div>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>

</body>

</html>
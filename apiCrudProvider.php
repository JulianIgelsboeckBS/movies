<?php
session_start();
error_reporting(0);
include('models/DbConn.php');

if (strlen($_SESSION['alogin']) == 0) {
    //header('location:cms_movies_list.php');
} else {
    $dbConn = new DbConn();
    $dbh = $dbConn->connect();
    $email = $_SESSION['alogin'];
    $sql = "SELECT * from users where email = (:email);";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $loginData = $query->fetch(PDO::FETCH_OBJ);
    $cnt = 1;
    $status = $loginData->status;


}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Crud Provider</title>
    <!-- Latest compiled and minified CSS -->
    <?php include __DIR__ . '/head.php'; ?>

</head>


<body>
    <div id="site-content">
        <?php
        if ($status == 1 || $status == 2) {
            if ($status == 1) {
                include __DIR__ . '/navLogout.php';
            } else {
                include __DIR__ . '/navAdmin.php';
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
                        <span>Crud Provider</span>
                    </div>
                    <form action="" class="mb-4" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Provider:</label>
                            <input type="text" class="form-control" id="genre" name="genre" required>
                        </div>
                        <button class="btn btn-success" id="addBtn">Add Provider</button>
                        
                    </form>

                    <table class="table" id="fetchBody"></table>

                </div>
            </div> <!-- .container -->
        </main>
        <?php include __DIR__ . '/footer.php'; ?>

    </div>
    <!-- Default snippet for navigation -->


    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>
    <script src="js/apiProvider.js"></script>

</body>

</html>
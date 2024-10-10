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
    $status=$loginData->status;

}
?>

<?php if($status==1):?>
<header class="site-header">
    <div class="container">
        <a href="index.php" id="branding">
            <img src="images/streamer1.png" alt="" class="logo">
            <!--<div class="logo-copy">
                <h1 class="site-title">Streamer</h1>
                <small class="site-description">Follow your Streams</small>
            </div> -->
        </a> <!-- #branding -->
        <nav>
            <div class="main-navigation">
                <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                <ul class="menu">
                    <li class="menu-item current-menu-item"><a href="index.php">Home</a></li>
                    <li class="menu-item"><a href="addMovie.php">Add Movie</a></li>
                    <li class="menu-item"><a href="about.php">About</a></li>
                    <li class="menu-item"><a href="cms_movies_list.php">Admin</a></li>
                    <li class="menu-item"><a href="formSearch.php">Form Search</a></li>
                    <li class="menu-item"><a href="movie_details.php">Movie Details</a></li>
                    <li class="menu-item"><a href="login.php">Login</a></li>
                </ul> <!-- .menu -->

                <form action="#" class="search-form">
                    <input type="text" placeholder="Search..." id="searchfield" >
                    <button><i class="fa fa-search"></i></button>
                    <!-- <button class="btn" id="disableFilter">Filter ausblenden</button> -->
                </form>
            </div> <!-- .main-navigation -->

            <div class="mobile-navigation"></div>
        </nav>
    </div>
</header>
<?php endif; ?>
<?php if($status = 0): ?>
<header class="site-header">
    <div class="container">
        <a href="index.php" id="branding">
            <img src="images/streamer1.png" alt="" class="logo">
            <!--<div class="logo-copy">
                <h1 class="site-title">Streamer</h1>
                <small class="site-description">Follow your Streams</small>
            </div> -->
        </a> <!-- #branding -->
        <nav>
            <div class="main-navigation">
                <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                <ul class="menu">
                    <li class="menu-item current-menu-item"><a href="index.php">Home</a></li>
                    <li class="menu-item"><a href="addMovie.php">Add Movie</a></li>
                    <li class="menu-item"><a href="about.php">About</a></li>
                    <li class="menu-item"><a href="cms_movies_list.php">Admin</a></li>
                    <li class="menu-item"><a href="formSearch.php">Form Search</a></li>
                    <li class="menu-item"><a href="movie_details.php">Movie Details</a></li>
                    <li class="menu-item"><a href="login.php">Login</a></li>
                </ul> <!-- .menu -->

                <form action="#" class="search-form">
                    <input type="text" placeholder="Search..." id="searchfield" >
                    <button><i class="fa fa-search"></i></button>
                    <!-- <button class="btn" id="disableFilter">Filter ausblenden</button> -->
                </form>
            </div> <!-- .main-navigation -->

            <div class="mobile-navigation"></div>
        </nav>
    </div>
</header>
<?php endif; ?>



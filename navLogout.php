
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
                    <li class="menu-item"><a href="watchlist.php">Watchlist</a></li>
                    <li class="menu-item"><a href="formSearch.php">Filmsuche</a></li>
                    <li class="menu-item"><a href="movie_details.php">Filmdetails</a></li>
                    <li class="menu-item"><a href="logout.php">Logout</a></li>
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
<script>
   document.addEventListener('DOMContentLoaded', function() {
    // Get the current URL path
    const currentPath = window.location.pathname.substring(1);
    
    
    // Select all menu items
    const menuItems = document.querySelectorAll('.menu-item a');
    
        

    // Loop through each menu item
    menuItems.forEach(item => {
        
        // Check if the menu item href matches the current URL path
        if (item.getAttribute('href') == currentPath) {
            // Add the 'current-menu-item' class to the parent <li>
            item.parentElement.classList.add('current-menu-item');
        } else {
            // Remove the 'current-menu-item' class from other items
            item.parentElement.classList.remove('current-menu-item');
        }
    });
});

</script>






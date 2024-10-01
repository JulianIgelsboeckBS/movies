<html>
<body>
<?php
require_once "offers.php";
$db = new offers();
$a = $db->offerQuery();
foreach ($a as $row) {
    echo $row['title']."<br>";
};

?>



</body>
</html>







?>
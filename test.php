<html>
<body>
<?php
require_once "DbConn.php";
$db = new dbConn();
$a = $db->SelectFilters();
foreach ($a as $row) {
    echo $row['rating']."<br>";
};

?>



</body>
</html>







?>
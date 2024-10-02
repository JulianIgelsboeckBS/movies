<html>
<body>
<?php
require_once("filterQueries.php");

$filter = new filterQueries();
$a = $filter->getGenre();
foreach ($a as $row) {
    echo $row['genre']."<br>";
};
?>



</body>
</html>







?>
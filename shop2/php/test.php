<?php
$user = "root";
$pass = "";
$db = "aka";

// Create connection
$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $sql="select * from products;";
        $result = mysqli_query($db, $sql);
        $resultCheck = mysqli_num_rows($result);
         for($i=0;$i< $resultCheck;$i++)
        {
            while ($row = mysqli_fetch_assoc($result)) {
               return $row['product_name'] ;
            }
        }
    ?>
</body>
</html>
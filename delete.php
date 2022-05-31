<?php

require("connect_db.php");

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET["id"])){

    $id = $_GET["id"];

    try {
        $sql ="DELETE FROM myguests where id=$id;";

        $statement = $pdo->prepare($sql);

        $statement->execute();

        echo "deleted with no problem";
        // grab results 
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <br>
    <br>
<head>
<a href="create.php">Create User</a>
        <a href="read.php?show=all">Show All Users</a>
    
</head>

<h2>Item was deleted</h2>




</body>
</html>

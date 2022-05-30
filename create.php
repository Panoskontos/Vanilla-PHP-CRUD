<?php

require("connect_db.php");

// CREATE NEW USER
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $age = $_POST["age"];

    try{
        $sql = "INSERT INTO myguests (firstname, lastname, age)
        VALUES ('$first_name', '$last_name', '$age')";
        $pdo->exec($sql);
        echo "New record created successfully";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
};

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
<head>
      
<head>
<a href="create.php">Create User</a>
        <a href="read.php?show=all">Show All Users</a>
    
</head>

    <form action="create.php" method="post">

        <br>
        <label for="first_name">First name</label>
        <input type="text" name="first_name">
        <br>
        <label for="last_name">Last name</label>
        <input type="text" name="last_name">
        <br>
        <label for="age">age</label>
        <input type="text" name="age">
        <br>
        <button type="submit">Save</button>

    </form>
</body>
</html>
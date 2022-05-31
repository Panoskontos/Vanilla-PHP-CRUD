<?php

require("connect_db.php");


// get ID
if (isset($_GET["id"])){
    // get id from url
    $id = $_GET["id"];
    try{
        $sql = 'SELECT * FROM myguests where id = :id;';
        $statement = $pdo->prepare($sql);
        $statement->execute(["id"=>$id]);
        // get results
        $results = $statement->fetchAll(PDO::FETCH_OBJ);
        var_dump($results);
        echo "<br>";
        
    }catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
};


// UPDATE USER
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_GET["id"])){

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $age = $_POST["age"];
     // get id from url
    $id = $_GET["id"];

    try{
        $sql = "UPDATE myguests SET firstname ='$first_name', lastname='$last_name', age='$age' WHERE id=$id ;";

        $statement = $pdo->prepare($sql);
        // sql injection potential
        $statement->execute();     
        echo "New record edited successfully";


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

<?php foreach($results as $user) { ?>
    <form action="update.php?id=<?php echo $user->id; ?>" method="post">

        <br>
        <label for="first_name">First name</label>
        <input type="text" name="first_name" value="<?php echo $user->firstname; ?>">
        <br>
        <label for="last_name">Last name</label>
        <input type="text" name="last_name" value="<?php echo $user->lastname; ?>">
        <br>
        <label for="age">age</label>
        <input type="text" name="age" value="<?php echo $user->age; ?>">
        <br>
        <button type="submit">Save</button>
    <?php } ?>
    </form>
</body>
</html>
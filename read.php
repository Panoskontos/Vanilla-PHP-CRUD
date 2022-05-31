<?php

require("connect_db.php");

// READ USER
if($_GET["show"] == "all"){
    try {
        $sql ="SELECT * FROM myguests;";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        echo "good so far";
        // grab results 
        $results = $statement->fetchAll(PDO::FETCH_OBJ);    
        echo var_dump($results);
        

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
    <h3>This is read php</h3>

    <!-- GOD DAMN -->
    <?php foreach($results as $user) { ?>
        
        <!-- <h1><?php echo $user->firstname; ?></h1> -->

    <?php } ?>
<!-- ------------------------- -->
<!-- SWEET PHP  -->
    <table>
  <tr>
    <th>Id</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Age</th>
  </tr>
<?php foreach($results as $user) { ?>
  <tr>
    <td><?php echo $user->id; ?></td>
    <td><?php echo $user->firstname; ?></td>
    <td><?php echo $user->lastname; ?></td>
    <td><?php echo $user->id; ?></td>
  </tr>
  <?php } ?>
</table>
    
    
</body>
</html>
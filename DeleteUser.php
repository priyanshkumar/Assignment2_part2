
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Album</title>
</head>
<body>
<?php


    //connect to the database
    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200360677','gc200360677','p496f-H4zl');

    // turn on the error handling
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // create the SQL statement
    $sql = "DELETE FROM Ass2
                WHERE ID = :ID";

    //prepare and execute the sql statement
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':ID', $_GET['ID'], PDO::PARAM_INT);
    $cmd->execute();

    //disconnect from the database
    $conn = null;
header('location:viewUser.php')


?>
</body>
</html>
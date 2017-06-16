<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <title>Save User</title>

    </head>
    <body>

    <h1>Saving Details</h1>

    <?php
    $ID = $_POST['ID'];
    $fName = $_POST['fName'];
    $address =$_POST['address'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $sport = $_POST['sport'];
    $gender = $_POST['gender'];
    $number = $_POST['number'];
    $age = $_POST['age'];

    //connection to datbase
    try {
        $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200360677','gc200360677','p496f-H4zl');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";




    //create sql statement
    if (!empty($ID))
    {
        $sql = "UPDATE Ass2
                SET fname = :fName, address = :address, city = :city, province = :province, age = :age, sport = :sport, gender = :gender , number = :number
                WHERE ID = :ID";
    }
    else {
        $sql = "INSERT INTO Ass2 (fname, gender, age, address, city, province, sport, number)
            VALUES(:fName, :gender, :age, :address, :city, :province ,:sport ,:number)";

    }

    //attacking command
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':fName', $fName, PDO::PARAM_STR,30);
    $cmd->bindParam(':address', $address, PDO::PARAM_STR,50);
    $cmd->bindParam(':age', $age, PDO::PARAM_INT,2);
    $cmd->bindParam(':sport', $sport, PDO::PARAM_STR,50);
    $cmd->bindParam(':gender', $gender, PDO::PARAM_STR,6);
    $cmd->bindParam(':number', $number, PDO::PARAM_INT,10);
    $cmd->bindParam(':city', $city, PDO::PARAM_STR,20);
    $cmd->bindParam(':province', $province, PDO::PARAM_STR,2);

    if (!empty($ID))
    {
        $cmd->bindParam(':ID',$ID, PDO::PARAM_INT);
    }

    //execute sql command
        $cmd->execute();

    //disconnect the database
    $conn = null;
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    //redirecting
    header('location:default.php')
    ?>

    </body>
</html>

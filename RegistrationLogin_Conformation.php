<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <title>Conformation</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    </head>
    <body>

    <?php

    //after the client side validation is complete,
    //we need to perform server side validation as well.
    $AdminID = $_POST['AdminID'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    $ok = true;

    if (empty($email)){
        echo 'email cannot be empty <br />';
        $ok = false;
    }

    if (strlen($password) < 8){
        echo 'password must be greater than or equal to 8 characters';
        $ok = false;
    }

    if ($password != $confirm){
        echo 'password must match';
        $ok = false;
    }

    //if it looks like an ok user, save to the DB
    if ($ok)
    {

        $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200360677','gc200360677','p496f-H4zl');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (!empty($AdminID))
        {
            $sql = "UPDATE users
                SET username = :username, email = :email, password = :password
                WHERE AdminID = :AdminID";
        }
        else {
            $sql = "INSERT INTO users (username, email, password) 
              VALUES (:username, :email, :password)";
        }

        //hash the password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':email', $email, PDO::PARAM_STR, 120);
        $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
        $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);

        if (!empty($AdminID))
        {
            $cmd->bindParam(':AdminID',$AdminID, PDO::PARAM_INT);
        }

        $cmd->execute();

        $conn = null;
        }


        header('location:login.php');


    ?>

    </body>

    <script src="js/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="js/Application.js"></script>


</html>


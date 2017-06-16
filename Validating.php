<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <title>Validating</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    </head>
    <body>

    <?php

    $email = $_POST['email'];
    $password = $_POST['password'];

    //Step 1 - connect to the DB
    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200360677','gc200360677','p496f-H4zl');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Step 2 - create SQL query
    $sql = "SELECT email, password FROM users WHERE email = :email";

    //Step 3 - prepare and execute query
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':email', $email, PDO::PARAM_STR, 120);

    $cmd->execute();
    $user = $cmd->fetch ();

    //Step 4 - validate the user
    if (password_verify($password, $user['password']))
    {
        session_start();
        $_SESSION['email'] = $user['email'];
        header('location:viewAdministrators.php');
    }
    else
    {
        header('location:login.php?invalid=true');
    }
    //Step 5 - disconnect from the DB
    $conn = null;
    ?>
    </body>

<script src="js/jquery-3.2.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="js/Application.js"></script>

</html>

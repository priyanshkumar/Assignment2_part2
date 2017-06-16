<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">



</head>
<body>
<nav class="nav nav-tabs">
    <div class="container-fluid">
        <div class="navbar-header">
            <li class="active"><a href="default.php" class="navbar-brand">Sports</a></li>
        </div>
    <ul class="nav navbar-nav">
        <?php
        //only show these links if the user is NOT logged in
        session_start();
        if (empty($_SESSION['email'])){
            echo '<li><a href="Registration.php">User Information</a></li>';
        }
        else{
            //These are links for logged in users
            echo '<li><a href="viewAdministrators.php">My Administrators</a></li>
                  <li><a href="viewUser.php">My Contact</a></li>';
        }
        ?>

    </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php
        if (!empty($_SESSION['email'])){
            echo ' <li><a href="logout.php">Logout</a></li>';
        }
        ?>
        </ul>

        <ul class="nav navbar-nav navbar-right">
        <?php
        if (empty($_SESSION['email'])) {
            echo '<li><a href="RegistrationLogin.php"><span class="glyphicon glyphicon-user"></span> Register Now</a></li>
                  <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span></span> Login</a></li>';
        }
        ?>
        </ul>

    </div>
</nav>
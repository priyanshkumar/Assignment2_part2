<?php
$pageTitle = 'My Contact';
require_once('header.php')
?>

    <style>
        body{
            background-color: lightgoldenrodyellow;
        }
    </style>
<div class="container">
    <h1>My Contacts</h1>

    <?php

    //connect to database
    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200360677','gc200360677','p496f-H4zl');

    //create a sql command
    $sql = "SELECT * FROM Ass2";

    //prepare the sql command
    $cmd = $conn->prepare($sql);

    //execute and store result
    $cmd->execute();
    $Ass2 = $cmd->fetchAll();

    //discunnect from the database
    $conn = null;

    // loop over the results and display them to the screen
    echo '<br><table class="table table-striped table-hover">
                <tr><th>Name</th>
                       <th>Gender</th>
                       <th>Age</th> 
                       <th>Address</th>
                       <th>City</th>
                       <th>Province</th>
                       <th>Sport Intrested</th>
                       <th>Mobile Number</th>';
                if (!empty($_SESSION['email'])) {
                    echo '<th>Edit</th>
                       <th>Delete</th>';
                }
                echo'</tr>';
    foreach($Ass2 as $Ass2)
    {
        echo '<tr><td>'.$Ass2['fName'].'</td>
                  <td>'.$Ass2['gender'].'</td>
                  <td>'.$Ass2['age'].'</td>
                  <td>'.$Ass2['address'].'</td>
                  <td>'.$Ass2['city'].'</td>
                  <td>'.$Ass2['province'].'</td>
                  <td>'.$Ass2['sport'].'</td>
                  <td>'.$Ass2['number'].'</td>';
        if (!empty($_SESSION['email'])) {
            echo '<td><a href="Registration.php?ID=' . $Ass2['ID'] . '"class="btn btn-primary"</a>Edit</td>
                  <td><a href="DeleteUser.php?ID=' . $Ass2['ID'] . '" class="btn btn-danger confirmation">Delete</a></td>';
        }
                  echo'</tr>';
    }

    echo '</table>';

    ?>
</div>

<?php require_once('footer.php') ?>
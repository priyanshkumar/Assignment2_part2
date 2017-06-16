<?php
$pageTitle = 'My Contact';
require_once('header.php')
?>
    <style>
        body{
            background-color: lavender;
    </style>
    <div class="container">
        <h1>My Contacts</h1>

        <?php

        //connect to database
        $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200360677','gc200360677','p496f-H4zl');

        //create a sql command
        $sql = "SELECT * FROM users";

        //prepare the sql command
        $cmd = $conn->prepare($sql);

        //execute and store result
        $cmd->execute();
        $users = $cmd->fetchAll();

        //discunnect from the database
        $conn = null;

        // loop over the results and display them to the screen
        echo '<br><table class="table table-striped table-hover">
                <tr><th>Name</th>
                    <th>Email</th>';
        if (!empty($_SESSION['email'])) {
            echo '<th>Edit</th>
                  <th>Delete</th>';
        }
        echo'</tr>';
        foreach($users as $users)
        {
            echo '<tr><td>'.$users['username'].'</td>
                  <td>'.$users['email'].'</td>';
            if (!empty($_SESSION['email'])) {
                echo '<td><a href="RegistrationLogin.php?AdminID=' . $users['AdminID'] . '"class="btn btn-primary"</a>Edit</td>
                  <td><a href="deleteAdmin.php?AdminID=' . $users['AdminID'] . '" class="btn btn-danger confirmation">Delete</a></td>';
            }
            echo'</tr>';
        }

        echo '</table>';

        ?>
    </div>

<?php require_once('footer.php') ?>
<?php
$pageTitle = 'Log In';
require_once('header.php')
?>

<style>
    body{
        background-color: cornsilk;
</style>

    <main class="container">

        <h1>Log Inn Here!!</h1>

        <?php

        if (!empty($_GET['invalid']))

            echo '<div class="alert alert-danger" id="message">Your password was incorrect</div>';
        else

            echo '<div class="alert alert-info" id="message">Please log into your account</div>';

        ?>

        <form method="post" action="Validating.php">

            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input name="email" id="email" class="form-control" required type="email" placeholder="email@email.com"/>
            </div>
            <br>

            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input name="password" class="form-control" id="password" required type="password" placeholder="Password" pattern="(?=.*\d)(?=.*[A-Z].{8,}"/>
            </div>
            <br>

            <button  class=" btn-success btnRegister">Login</button>

        </form>

    </main>

    <?php require_once('footer.php') ?>

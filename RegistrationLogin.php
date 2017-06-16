<?php
$pageTitle = 'Log Upp';
require_once('header.php')
?>

<style>
    body{
        background-color: honeydew ;
</style>

        <main class="container">

            <h1>Log Upp Here!!</h1>

            <?php
            //check the URL for an albumID to determine if this is a new or edit album
            if(!empty($_GET['AdminID']))
                $AdminID = $_GET['AdminID'];
            else
                $AdminID = null;
            $username = null;
            $email = null;
            $password = null;


            //to decide if the album is an edit, we look at the albumID
            if(!empty($AdminID))
            {
                //connect to the database
                $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200360677','gc200360677','p496f-H4zl');

                //create the SQL query
                $sql = "SELECT * FROM users WHERE AdminID = :AdminID";

                //prepare and execute the SQL
                $cmd = $conn->prepare($sql);
                $cmd->bindParam(':AdminID', $AdminID, PDO::PARAM_INT);

                $cmd->execute();

                //update the variables
                $users = $cmd->fetch();
                $conn = null;

                    $username = $users['username'];
                    $email = $users['email'];
                    $password = $users['password'];

            }
            ?>

            <?php
            if (!empty($_GET['errorMessage']))
                echo '<div class="alert alert-danger" id="message">Email address already exists</div>';
            else
                echo '<div class="alert alert-info" id="message">Please create your account</div>';
            ?>
            <form method="post" action="RegistrationLogin_Conformation.php">

                <fieldset class="form-group">
                    <label for="username" >Name : </label>
                    <input name="username" class="form-control" id="username" required type="text" value="<?=$username?>" placeholder="Name"/>
                </fieldset>


                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input name="email" id="email" class="form-control" required type="email" value="<?=$email?>"  placeholder="email@email.com"/>
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input name="password" class="form-control" id="password" required type="password" placeholder="Password" pattern="(?=.*\d)(?=.*[A-Z].{8,}"/>
                    <span id="result"></span>
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input name="confirm" id="confirm" class="form-control" required type="password" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[A-Z].{8,}"/>
                    <span id="result"></span>
                </div>
                <br>
                <input name="AdminID" id="AdminID" value="<?php echo $AdminID?>" type="hidden"/>
                <button class=" btn-success btnRegister">Register</button>

            </form>

        </main>

    <?php require_once('footer.php') ?>


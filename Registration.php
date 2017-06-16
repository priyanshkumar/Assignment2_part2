<?php
$pageTitle = 'Registration';
require_once('header.php')
?>
    <style>
       body{
           background-color: floralwhite;
       }
        h1{
            color: black;
        }
    </style>

    <div class="container">

    <h1>Welcome</h1>

    <?php
    //check the URL for an albumID to determine if this is a new or edit album
    if(!empty($_GET['ID']))
        $ID = $_GET['ID'];
    else
        $ID = null;
    $fname = null;
    $gender = null;
    $address = null;
    $cityPicked = null;
    $age = null;
    $sportPicked = null;
    $number = null;
    $provincePicked = null;

    //to decide if the album is an edit, we look at the albumID
    if(!empty($ID))
    {
        //connect to the database
        $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200360677','gc200360677','p496f-H4zl');

        //create the SQL query
        $sql = "SELECT * FROM Ass2 WHERE ID = :ID";

        //prepare and execute the SQL
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':ID', $ID, PDO::PARAM_INT);

        $cmd->execute();

        //update the variables
        $Ass2 = $cmd->fetchAll();
        foreach ($Ass2 as $Ass2) {
            $fname = $Ass2['fName'];
            $gender = $Ass2['gender'];
            $age = $Ass2['age'];
            $address = $Ass2['address'];
            $cityPicked = $Ass2['city'];
            $provincePicked = $Ass2['province'];
            $sportPicked = $Ass2['sport'];
            $number = $Ass2['number'];
        }

        //disconnect from database
        $conn = null;
    }
    ?>
    <form method="post" action="SaveUser.php">

        <fieldset>
            <label for="fName">First Name: </label>
            <input class="form-control" name="fName" id="fName" placeholder="First Name" required value="<?=$fname?>" />
        </fieldset>
        <br>

        <fieldset>
            <label for="age">Age : </label>
            <input class="form-control" type="number" id="age" name="age" min="0" required placeholder="Age" value="<?=$age?>"/>
        </fieldset>
        <br>

        <label for="gender" >Gender : </label>
        <fieldset  >

            <div class="radio">
                <label><input type="radio" id="gender" name="gender" required value="male" value="<?=$gender?>"/>Male</label>
            </div>

            <div class="radio">
                <label><input type="radio" id="gender" name="gender" required value="female" value="<?=$gender?>"/>Female</label>
            </div>

        </fieldset>
        <br>

        <fieldset>
            <label for="address">Address: </label>
            <input class="form-control" name="address" id="address" placeholder="Address" required value="<?=$address?>"/>
        </fieldset>
        <br>

        <fieldset class="form-group">
            <label for="city">City: </label>
            <select class="form-control" id="city" name="city" required placeholder="Select City">
                <option value="null" desabled>Select City</option>
                <?php
                //connect to the database
                $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200360677','gc200360677','p496f-H4zl');

                //create the SQL query
                $sql = "SELECT * FROM citi";
                $cmd = $conn->prepare($sql);

                //prepare and execute the SQL
                $cmd->execute();
                $citi = $cmd->fetchAll();

                //display the result
                foreach($citi as $city)
                {
                    if ($cityPicked == $city['city']){
                        echo '<option selected>'.$city['city'].'</option>';
                    }
                    else {
                        echo '<option>'.$city['city'].'</option>';
                    }
                }

                //disconnecct from database
                $conn = null;
                ?>

            </select>
        </fieldset>
        <br>

        <fieldset class="form-group">
            <label for="province" >Province: </label>
            <select class="form-control" id="province" name="province" required placeholder="Select Province" >
                <option value="null" desabled>Select Province </option>

                <?php
                //connect to the database
                $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200360677','gc200360677','p496f-H4zl');

                //create the SQL query
                $sql = "SELECT * FROM provinces";
                $cmd = $conn->prepare($sql);

                //prepare and execute the SQL
                $cmd->execute();
                $provinces = $cmd->fetchAll();

                //display the result
                foreach($provinces as $province)
                {
                    if ($provincePicked == $province['province']){
                        echo '<option selected>'.$province['province'].'</option>';
                    }
                    else {
                        echo '<option>'.$province['province'].'</option>';
                    }
                }

                //disconnect from database
                $conn = null;
                ?>
            </select>
        </fieldset>
        <br>

        <fieldset class="form-group">
            <label for="sport">Sport: </label>
            <select class="form-control" id="sport" name="sport" required placeholder="Select Sport">
                <option value="null" desabled>Select Sport</option>
                <?php
                //connect to the database
                $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200360677','gc200360677','p496f-H4zl');

                //create the SQL query
                $sql = "SELECT * FROM sporty";
                $cmd = $conn->prepare($sql);

                //prepare and execute the SQL
                $cmd->execute();
                $sporty = $cmd->fetchAll();

                //display the result
                foreach($sporty as $sport)
                {
                    if ($sportPicked == $sport['sport']){
                        echo '<option selected>'.$sport['sport'].'</option>';
                    }
                    else {
                        echo '<option>'.$sport['sport'].'</option>';
                    }
                }

                //disconnecct from database
                $conn = null;
                ?>

            </select>
        </fieldset>
        <br>

        <fieldset>
            <label for="number">Contact Number: </label>
            <input class="form-control" type="tel" name="number" id="number" placeholder="Contact Number" required value="<?=$number?>" />
        </fieldset>
        <br>
        <input name="ID" id="ID" value="<?php echo $ID?>" type="hidden"/>
        <button  type="submit" class="btn btn-primary">Submit</button>
        <br>

    </form>
        <br>
        <br>
        <br>
    </div>

    <?php require_once('footer.php') ?>


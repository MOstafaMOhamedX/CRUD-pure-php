<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Registration</title>
        <link rel="stylesheet" href="css/design.css" />
    </head>

    <body>
        <?php

        include('connectFN.php');
        $con = dbconnect();

        if (isset($_REQUEST['username'])) 
        {
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($con, $username);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);

            $query = "INSERT into `users` (username, password ) VALUES ('$username', '" . md5($password) . "')";
            $result = mysqli_query($con, $query);

            if ($result) 
            {
                echo "  <div class='con'>
                            <h3>You are registered successfully.</h3>
                            <br/>
                            Click here to  <a href='index.php' style='dicoration = 'none' '>Login</a>
                        </div>";
            }

        } else {
        ?>

            <div class="con" style="padding-bottom: 190px">
                <div class="form">
                    <h1>Registration</h1>
                    <form name="registration" action="" method="post">
                        <input type="text" name="username" placeholder="Username" required /><br>
                        <input type="password" name="password" placeholder="Password" required /><br>
                        <input type="submit" name="submit" value="back" style="margin-left: 9px;" onclick="location.href='index.php'" />
                        <input type="submit" name="submit" value="Register" style="margin-left: 9px" />
                    </form>
                </div>
            </div>

        <?php } ?>

    </body>
    
</html>
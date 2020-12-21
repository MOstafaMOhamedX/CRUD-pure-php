<?php

    $Banking = $_POST['x'];
    $Scarlet = $_POST['y'];
    $Bouncer = $_POST['z'];

    $back = "<a href = 'updateHTML.html'> Go Back </a>";

    if(!is_numeric($Banking) || !is_numeric($Bouncer)){
        die("enter valid Data <br>$back");
    }

    include('connectFN.php');
    $con = dbconnect();

    $sql = "Update data Set Scarlet = '$Scarlet' , Bouncer = '$Bouncer' Where Banking = $Banking";

    if($con -> query($sql) == TRUE){
        $status = "Record Updated Successfully.";
        echo '<p style="color:#FF0000; text-align: center; align-items: center;">' . $status . '</p>';
    }else{
        echo '<p style="color:#FF0000; text-align: center; align-items: center;">' . $con->error . '</p>';
    }
    echo '<p style="color:#FF0000; text-align: center; align-items: center; text-decoration: none;">' . $back . '</p>';

    $con -> close();
?>
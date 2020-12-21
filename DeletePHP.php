<?php
    $Banking = $_POST['x'];

    $back = "<a href = 'DeleteHTML.html'> Go Back </a>";
    
    include('connectFN.php');
    $con = dbconnect();

    $sql = "Delete from data Where Banking = $Banking";

    if($con -> query($sql) == TRUE  && $con->affected_rows > 0)
    {
        $status = "record was deleted successfully";
        echo '<p style="color:#FF0000; text-align: center; align-items: center;">' . $status . '</p>';
    }
    else
    {
        echo '<p style="color:#FF0000; text-align: center; align-items: center;">' . $con->error . '</p>';
    }
    echo '<p style="color:#FF0000; text-align: center; align-items: center; text-decoration: none;">' . $back . '</p>';

    $con -> close();
?>
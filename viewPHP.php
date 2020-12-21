<?php

    if (isset($_POST['back'])) {
        header("Location: main.php");
        exit;
    }

    include('connectFN.php');
    $con = mysqli_connect("localhost", "root", "", "exam");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>View Records</title>
    <link rel="stylesheet" href="css/design.css" />
    <script src="jquery-3.5.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</head>

<body>
    <div class="con" style="padding-bottom: 400px">
        <div class="form">
            <p><a href="main.php">Home</a> | <a href="index.php" style="color: red">Logout </a>| <a href="viewHTML.html">Back</a></p>
            <h3 style="float: left; margin-left: 30%">Search Records</h3>
            <input id="myInput" type="text" placeholder="Search.." style="margin-left: -20% ; margin-top: 21px" />
            <table width="100%" border="1" style="border-collapse:collapse; ">
                <thead>
                    <tr>
                        <th><strong>
                                <h3>S.No</h3>
                            </strong></th>
                        <th><strong>
                                <h3> Banking</h3>
                            </strong></th>
                        <th><strong>
                                <h3>Scarlet</h3>
                            </strong></th>
                        <th><strong>
                                <h3>Bouncer</h3>
                            </strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;

                    $Scarlet  = $_POST['x'];
                    $Banking = $_POST['y'];
                    $Bouncer = $_POST['z'];


                    if (empty($Scarlet) && empty($Banking) && empty($Bouncer)) {
                        $sel_query = "Select * from data";
                    } else if (!empty($Scarlet) && empty($Banking) && empty($Bouncer)) {
                        $sel_query = "Select * from data Where Scarlet  = '$Scarlet '";
                    } else if (empty($Scarlet) && !empty($Banking) && empty($Bouncer)) {
                        $sel_query = "Select * from data Where Banking = '$Banking'";
                    } else if (empty($Scarlet) && empty($Banking) && !empty($Bouncer)) {
                        $sel_query = "Select * from data Where Bouncer = '$Bouncer'";
                    } else if (empty($Scarlet) && !empty($Banking) && !empty($Bouncer)) {
                        $sel_query = "Select * from data Where Banking = '$Banking' AND Bouncer = '$Bouncer'";
                    } else {
                        die("Please follow search rules<br>$back");
                    }
                    $result = mysqli_query($con, $sel_query);


                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tbody id="myTable">
                            <tr>
                                <td align="center"><?php echo $count; ?></td>
                                <td align="center"><?php echo $row["Banking"]; ?></td>
                                <td align="center"><?php echo $row["Scarlet"]; ?></td>
                                <td align="center"><?php echo $row["Bouncer"]; ?></td>
                            </tr>
                        </tbody>
                    <?php 
                        $count++; } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>


</body>

</html>
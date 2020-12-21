<?php

  include('connectFN.php');
  $con = dbconnect();

  session_start();
  
  if (!isset($_SESSION["username"])) 
  {
    header("Location: login.php");
    exit();
  }

  if (mysqli_connect_errno()) 
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>Welcome Home</title>
    <link rel="stylesheet" href="css/design.css" />
  </head>

  <body>
    <div class="con" style="padding-bottom: 130px">
      <div class="form">

        <h2>Welcome <?php echo $_SESSION['username']; ?> </h2>
        <p>Select an operation</p><br>
        <p><a href="insertHTML.html">Insert New Record</a></p>
        <p><a href="updateHTML.html">Update Existing Records</a></p>
        <p><a href="DeleteHTML.html">Delete Existing Record</a></p>
        <p><a href="viewHTML.html">Search for Records</a></p>
        <p><a href="logout.php" style="color: red">Logout</a></p>

      </div>
    </div>
  </body>

</html>
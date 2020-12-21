<?php
    function dbconnect(){
        $con = new mysqli("localhost","root","","exam");
        if($con->connect_error){
            die("conncetion failed");
        }
        return $con;
    }
?>
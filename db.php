<?php
    $con = mysqli_connect("localhost","Avishkar","avishkar","dbms");
    if(! $con){
        echo mysqli_connect_error($con);
    }
?>
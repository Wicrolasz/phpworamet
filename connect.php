<?php
    $con = mysqli_connect("localhost","root","","phpworamet");

    if(!$con){
     die ("Can't Connect :" . mysqli_connect_error());
    }
?>
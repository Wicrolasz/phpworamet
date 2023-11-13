<?php
include 'navbar.php';
include 'connect.php';
$username = $_GET['username'];
$sql = "DELETE FROM user WHERE username = '$username'";
$result = $con->query($sql);
if(!$result){
    echo "<script>alert('Error : Can not Delete username !');history.back();</script>";
}else{
    header('location:user.php');
}

?>
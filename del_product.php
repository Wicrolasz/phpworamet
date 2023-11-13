<?php
include 'navbar.php';
include 'connect.php';
$pro_id = $_GET['pro_id'];
$sql = "DELETE FROM products WHERE pro_id = '$pro_id'";
$result = $con->query($sql);
if(!$result){
    echo "<script>alert('Error : Can not Delete product !');history.back();</script>";
}else{
    header('location:product.php');
}

?>
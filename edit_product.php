<?php
include 'navbar.php';
include 'connect.php';
$pro_id = $_GET['pro_id'];
$sql = "SELECT * FROM  products WHERE pro_id='$pro_id'";
$result = $con->query($sql);
$row = mysqli_fetch_array($result);
if (isset($_POST['submit'])) { // เช็คว่ามีปุ่มหรือยัง
    $pro_name = $_POST['pro_name'];
    $pro_price = $_POST['pro_price'];
    $pro_amount = $_POST['pro_amount'];
    $pro_status = $_POST['pro_status'];
    if ($pro_name == '' || $pro_price == '' || $pro_amount == '' || $pro_status == ''){
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบทุกช่อง')</script>";
    } else {
        $sql = "UPDATE products SET  pro_name='$pro_name',pro_price='$pro_price',pro_amount='$pro_amount',pro_status='$pro_status' WHERE pro_id='$pro_id'";
        $result = $con->query($sql);
        if (!$result) {
            echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');history.back();</script>";
        } else {
            header('location:product.php');
        }
    } //ปิดเช็คค่าว่าง
} //ปิดเช็คการกดปุ่ม
?>

<div class="container mt-5 w-50">
    <div class="card">
        <div class="card-header bg-success text-light"> <h1 class="text-center">Edit Product</h1>
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="mb-3">
                    <label class="form-col-label">Product name</label>
                    <input type="text" name="pro_name" class="form-control" value="<?php echo $row['pro_name'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-col-label">Price</label>
                    <input type="text" name="pro_price" class="form-control" value="<?php echo $row['pro_price'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-col-label">Amount</label>
                    <input type="text" name="pro_amount" class="form-control" value="<?php echo $row['pro_amount'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="pro_status" value="<?php echo $row['pro_status'] ?>">
                        <option></option>
                        <option value="1">Products Available</option>
                        <option value="2">Out of stock</option>
                        <option value="3">Products Canceled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">บันทึกข้อมูล</button>
            </form>
        </div>
    </div>
</div>
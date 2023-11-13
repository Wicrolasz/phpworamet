<?php
    include_once "navbar.php";
    if(isset($_POST['submit'])){
        include_once 'connect.php';
        $pro_name = $_POST['pro_name'];
        $pro_price = $_POST['pro_price'];
        $pro_amount = $_POST['pro_amount'];
        $pro_status = $_POST['pro_status'];
        if($pro_name == '' || $pro_price == '' || $pro_amount == '' || $pro_status == ''){
            echo "<div class='alert alert-danger'>Error: Please fill in all fields</div>";
        }else{
            $num = mysqli_fetch_array($con->query("SELECT * FROM products"));
            if($num == 1){
                echo "<div class='alert alert-warning'>Products already in stock</div>";
            }else{
                $sql = "INSERT INTO products (pro_name, pro_price, pro_amount, pro_status) VALUES ('$pro_name', '$pro_price', '$pro_amount', '$pro_status')";
                $result = $con->query($sql);
                if(!$result){
                    echo "<div class='alert alert-danger'>Error: Can't Insert</div>";
                }else{
                    header('location:product.php');
                }
            }
        }
    }
?>

<div class="container mt-5 w-50">
    <div class="card">
        <div class="card-header bg-success text-light mb-3">
            <h2>Add Product</h2>
        </div>
        <div class="card-body">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="pro_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="text" name="pro_price" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <input type="text" name="pro_amount" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="pro_status">
                        <option value="1">Products Available</option>
                        <option value="2">Out of stock</option>
                        <option value="3">Products Canceled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-danger" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

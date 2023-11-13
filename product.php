<?php 
include_once "navbar.php";
include_once "connect.php";
$sql = "SELECT * FROM products";
$result = $con->query($sql);
?> 
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-success text-white"> 
            <h1 class="text-center">Product List</h1>
        </div>
        <div class="card-body">
            <a href="add_product.php" class="btn btn-outline-danger mb-3"><i class="bi bi-person-plus-fill"></i> Add Product</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="bg-success text-white">Product ID</th>
                        <th class="bg-success text-white">Product Name</th>
                        <th class="bg-success text-white">Price</th>
                        <th class="bg-success text-white">Amount</th>
                        <th class="bg-success text-white">Status</th>
                        <th class="bg-success text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $row['pro_id']?></td>
                        <td><?php echo $row['pro_name']?></td>
                        <td><?php echo $row['pro_price']?></td>
                        <td><?php echo $row['pro_amount']?></td>
                        <td><?php 
                            if($row['pro_status'] == 1){
                                echo "Products Available";
                            }elseif($row['pro_status'] == 2){
                                echo "Out of stock";
                            }elseif($row['pro_status'] == 3){
                                echo "Products Canceled";
                            }
                        ?></td>
                        <td>
                            <a href="edit_product.php?pro_id=<?php echo $row['pro_id']?>" class="btn btn-primary">Edit</a>
                            <a href="del_product.php?pro_id=<?php echo $row['pro_id']?>" onclick="return confirm('Do You Want to Delete Product?')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

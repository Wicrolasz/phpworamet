<?php 
include_once "navbar.php";
include_once "connect.php";
$sql = "SELECT * FROM user";
$result = $con->query($sql);
?> 
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-warning text-dark"> 
            <h1 class="text-center">User</h1>
        </div>
        <div class="card-body">
            <a href="add_user.php" class="btn btn-danger mb-3"><i class="bi bi-person-plus-fill"></i> Add User</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="bg-warning text-dark">Number</th>
                        <th class="bg-warning text-dark">Username</th>
                        <th class="bg-warning text-dark">Fullname</th>
                        <th class="bg-warning text-dark">Email</th>
                        <th class="bg-warning text-dark">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $i; $i++; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['fullname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a href="edit_user.php?username=<?php echo $row['username']; ?>" class="btn btn-primary">Edit</a>
                            <a href="del_user.php?username=<?php echo $row['username']; ?>" onclick="return confirm('Do You Want to Delete?')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

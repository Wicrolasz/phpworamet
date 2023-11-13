<?php
    include_once "navbar.php";
    if(isset($_POST['submit'])){
        include_once 'connect.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        if($username == '' || $password == '' || $fullname == '' || $email == ''){
            echo "<script>alert('Error Error Error !!!!');history.back();</script>";
        }else{
        $num = mysqli_fetch_array($con->query("SELECT * FROM user"));
        if($num==1){
            echo "<script>alert('Username Already in use!');history.back();</script>";
        }else{
        $sql = "INSERT INTO user VALUES('$username','$password','$fullname','$email')";
        $result = $con->query($sql);
        if(!$result){
            echo "<script>alert('Error: Cant Insert');history.back();</script>";
        }else{
            header('location:user.php');
             }
        }
    }
}
?>



<div class="container mt-5 w-50">
    <div class="card">
        <div class="card-header bg-warning text-white mb-3">
            <h2>Insert Username</h2>
        </div>
        <div class="card-body">
        <form action="<?php $_SERVER['PHP_SELF']?> "method="POST">
                <div class="mb-3">
                    <label  class="form-label">Username</label>
                    <input type="text" name="username"class="form-control" placeholder="Username" >
                </div>
                <div class="mb-3">
                    <label  class="form-label">Password</label>
                    <input type="password" name="password"class="form-control" placeholder="Password">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Fullname</label>
                    <input type="text" name="fullname"class="form-control" placeholder="Fullname">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Email</label>
                    <input type="email" name="email"class="form-control"  placeholder="Email">
                </div>
                <button type="submit" class="btn btn-danger" name="submit">Submit</button>
        </form>
        </div>
    </div>
</div>
<?php
include_once 'connect.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == '' || $password == '') {
        echo "<script>alert('ไม่ได้กรอก username หรือ pasword')</script>";
    } else {
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password' ";
        //$result=mysqli_query($con,$sql;);
        $result = $con->query($sql);
        $row=mysqli_fetch_array($result);
        $num=mysqli_num_rows($result);
        if ($num != 1) {
            //echo "<script>alert('login ไม่สำเร็จ')</script>";
            echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง')</script>";
        } else {
             session_start();
             $_SESSION['username'] = $row['username'];
             $_SESSION['fullname'] = $row['fullname'];
               header('location:index.php');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    
                    <div class="card-header bg-dark text-white">
                        <h2 class="text-center">User Login</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                       
                            <div class="mb-3">
                                <label for="username" class="form-label"> <h5>Username</h5></label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label"><h5>Password</h5></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                           
                            <button type="submit" class="btn btn-dark text-light" name="submit"> <h5>Login</h5></button>
                        </form>
                        <div class="text-center text-danger mt-3">
                            <?php
                            if (isset($message)) {
                                echo $message;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

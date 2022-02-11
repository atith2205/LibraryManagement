<?php
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

if (isset($_POST['submit'])) {

    $matric = sanitize(trim($_POST['matric_no']));
    $password = sanitize(trim($_POST['password']));
    $password2 = sanitize(trim($_POST['password2']));
    $username = sanitize(trim($_POST['username']));
    $email = sanitize(trim($_POST['email']));
    $dept = sanitize(trim($_POST['dept']));
    $books = sanitize(trim($_POST['num_books']));
    $money = sanitize(trim($_POST['money_owed']));
    $phone = sanitize(trim($_POST['phone']));
    $name = sanitize(trim($_POST['name']));
    $filename = '';
    $err_flag = false;
    if (isset($_FILES['postimg'])) {
        $img_size = $_FILES['postimg']['size'];
        $temp = $_FILES['postimg']['tmp_name'];
        $img_type = $_FILES['postimg']['type'];
        $img_name = $_FILES['postimg']['name'];
        // print_r($_FILES['postimg']);
        if ($img_size > 500000) {
            $err_flag = true;
            $error = "Your image size is too big... Try again.";
        }

        $extensions = array('jpg', 'jpeg', 'png', 'gif');
        $img_ext = explode('/', $img_type);
        $img_ext = end($img_ext);
        $img_ext = strtolower($img_ext);
        if (!(in_array($img_ext, $extensions))) {
            $err_flag = true;
            $error = "Unwanted image file type... Only jpg,jpeg,png and gif allowed";
        }
        // Prepare image folder in the server
        if (!$err_flag) {
            $imgFile = 'posts-images/';
            $filename = rand(1000, 8000) . '_' . time() . '.' . $img_ext;
            $filepath = $imgFile . $filename;
            move_uploaded_file($temp, $filepath);
        } else {
            echo "<script>alert('$error');</script>";
        }
    }

    // echo $filename;

    if ($password == $password2) {
        $sql = "INSERT INTO students( matric_no, password, username, email, dept, photo, phoneNumber, name)
                             VALUES ('$matric', '$password', '$username', '$email', '$dept',  '$filename', '$phone', '$name' ) ";
        $query = mysqli_query($conn, $sql);
        $error = false;
        if ($query) {
            $error = true;
        } else {
            echo "<script>alert('Not Registered successful!! Try again.');</script>";
        }
    } else {
        echo  "<script>alert('Password mismatched!')</script>";
    }
}

?>


<div class="container">
    <?php include "includes/nav.php"; ?>
    <div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 20px">
        <div class="jumbotron login3 col-lg-10 col-md-11 col-sm-12 col-xs-12">
            <?php if (isset($error) === true) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Record Added Successfully!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            <?php } ?>
            <p class="page-header h1" style="text-align: center">ADD STUDENTS</p>
            <div class="container p-5 rounded" style="background-color:#f6f6f6;">
                <form class="form-horizontal" role="form" action="addstudent.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="Username" class="col-sm-4 control-label">FULL NAME</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" placeholder="Full name" id="username" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="matrix" class="col-sm-4 control-label">MATRIC NO</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="matric_no" placeholder="Matric Number" id="matrix" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dept" class="col-sm-4 control-label">DEPT</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="dept" placeholder="Department" id="dept" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 control-label">EMAIL</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" placeholder="Email" id="email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-4 control-label">USERNAME</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="username" placeholder="Username" id="username" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-4 control-label">PASSWORD</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" placeholder="password" id="password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="condirmpassword" class="col-sm-4 control-label">CONFRIM PASSWORD</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password2" placeholder="Confirm password" id="confirmpassword" required>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" name="num_books" placeholder="books" id="password" required value="null">
                    <input type="hidden" class="form-control" name="money_owed" placeholder="Money" id="password" required value="null">
                    <div class="form-group row">
                        <label for="phone" class="col-sm-4 control-label">PHONE NUMBER</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="phone" placeholder="phone" id="phone" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="image" class="col-sm-4 control-label">IMAGE</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="postimg" placeholder="Enter image" id="image" style="padding: 0" required>
                        </div>
                    </div>

                    <div class=" row justify-content-center">
                        <div class="col-auto">
                            <button class="btn btn-primary " data-toggle="modal" data-target="#info" name="submit">
                                ADD MEMBER
                            </button>
                        </div>
                    </div>


                </form>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    window.onload = function() {
        var input = document.getElementById('username').focus();
    }
</script>
</body>

</html>
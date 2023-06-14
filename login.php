<?php
require("common_files/php/database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- boot strape 5 link css -->
    <link rel="stylesheet" href="common_files/css/bootstrap.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="common_files/css/animation.css">
    <!-- index css link -->
    <link rel="stylesheet" href="pages/index.css">
    <!-- bootstrap javascript -->
    <script src="common_files/js/bootstrap.bundle.min.js"></script>
    <!-- font owsum -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- sweetalert -->
    <script src="common_files/js/sweetalert.js"></script>
    <!-- jqueary -->
    <script src="common_files/js/jquery.js"></script>
    <title>sms-app</title>

</head>

<body>
    <?php require("assets/nav.php") ?>
    <div class="container p-4 bg-white shadow-lg border" style="margin-top: 100px;">
        <h2>LOGIN WITH US</h2>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <label for="username">User Name</label>
                <input type="email" id="username" class="form-control mb-3">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control mb-3">
                <input type="radio" name="user" class="user" id="admin" value="admin"><label for="admin">Admin</label>
                &nbsp;&nbsp;<input type="radio" class="user" name="user" id="user" value="student"><label for="user">Student</label>
                </br></br>
                <button class="btn btn-primary login-btn">Login Now</button>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <h4>New Student</h4>
                <p>if You don't Have Any account Please Register First !</p>
                <a href="register.php" class="btn btn-danger">Register Now </a>
            </div>
        </div>
    </div>
    <script src="assets/index.js"></script>
</body>

</html>
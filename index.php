<?php
// require("common_files/php/database.php");
require("common_files/php/database.php")
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
    <link rel="stylesheet" href="assets/index.css">
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
    <div class="container-fluid" style="margin-top : 66px;">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner " style="height : 400px !important;">
                <div class="carousel-item active">
                    <img src="images/pic-1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/pic-2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/pic-3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- start course section coding -->
    <div class="course-section">
        <div class="container">
            <h1 class="mt-5 fw-bold mb-4">Tranding Course</h1>
            <div class="row mb-5">
                <?php $get_course = "SELECT * FROM course";
                $response_course = $db->query($get_course);
                if ($response_course) {
                    while ($data = $response_course->fetch_assoc()) {
                        echo '
            <div class="col-md-3 p-0 mb-3 course-box">
                <div class="card">
                    <img class="card-img-top" src="employee/' . $data['logo'] . '" alt="">
                    <div class="card-body">
                        <h4 class="card-title">
                            ' . $data['name'] . '
                        </h4>
                        <p class="card-text fw-bold">
                            RS : ' . $data['fee'] . '
                        </p>
                    </div>
                </div>
            </div>
        ';
                    }
                }

                ?>
            </div>
        </div>
    </div>
    <!-- start course section coding -->

    <?php require("assets/footer.php") ?>

<script src="assets/index.js"></script>
</body>

</html>
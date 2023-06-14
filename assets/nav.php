<?php
$brand_res = "";
$get_brand = "SELECT * FROM branding";
$response = $db->query($get_brand);
if ($response) {
    $brand_res = $response->fetch_assoc();
}
?>
<div class="container-fluid bg-light shadow-sm">
    <nav class="navbar navbar-expand-sm fixed-top shadow-lg navbar-light bg-white" style="z-index: 1000;">
        <div class="container">
            <a href="index.php" class="navbar-brand text-uppercase border p-2">
                <?php
                $logo_string = base64_encode($brand_res['brand_logo']);
                $src = "data:image/png;base64," . $logo_string;
                echo "<img src='" . $src . "' width='40px'>";
                echo "&nbsp";
                echo "<small class='fw-bold'>" . $brand_res['brand_name'] . "</small>";
                ?>

            </a>
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="myNavbar">
                <ul class="navbar-nav w-100 justify-content-end">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link">
                            About
                        </a>
                    </li>
                    <?php
                    $get_menu = "SELECT * FROM category";
                    $cat_response = $db->query($get_menu);
                    if ($cat_response) {
                        while ($data = $cat_response->fetch_assoc()) {
                            echo '<li class="nav-item"><a href="#" class="nav-link">' . $data['category_name'] . '</a></li>';
                        }
                    }
                    ?>
                    <div class="dropdown btn-group shadow-ms ml-auto">
                        <button class="btn">
                            <i class="fa fa-user" data-bs-toggle="dropdown"></i>
                            <div class="dropdown-menu">
                                <a href="register.php" class="dropdown-item">
                                    <i class="fa fa-user">
                                        Register
                                    </i>
                                </a>
                                <a href="login.php" class="dropdown-item">
                                    <i class="fa fa-sign-in">
                                        Login
                                    </i>
                                </a>
                            </div>
                        </button>
                    </div>

                </ul>
            </div>
        </div>
    </nav>
</div>
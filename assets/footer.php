<div class="container " style="margin-top: 200px;">
        <div class="row">
            <div class="col-md-6 mb-3 d-flex justify-content-center align-items-center">
                <div class="input-group w-100">
                    <input type="email" name="subcribe" class="form-control" placeholder="email@email.com">
                    <span class="input-group-text">SUBCRIBE</span>
                </div>
            </div>
            <div class="col-md-6 mb-3 d-flex justify-content-center align-items-center">
                <div class="btn-group">
                    <button class="btn btn-dark">FOLLOW US</button>
                    <button class="btn border"><a href="<?php echo $brand_res['brand_twitter'] ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a></button>
                    <button class="btn border"><a href="<?php echo $brand_res['brand_facebook'] ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a></button>
                    <button class="btn border"><a href="<?php echo $brand_res['brand_instagram'] ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></button>
                    <button class="btn border"><a href="<?php echo $brand_res['brand_whatsapp'] ?>" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark p-4">
        <div class="row">
            <div class="col-md-3">
                <h5 class="text-white">CATEGORY</h5>
                <?php
                $get_menu = "SELECT * FROM category";
                $cat_response = $db->query($get_menu);
                if ($cat_response) {
                    while ($data = $cat_response->fetch_assoc()) {
                        echo '<a href="#" class="nav-link fw-bold">' . $data['category_name'] . '</a>';
                    }
                }
                ?>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <h5 class="text-white">POLICIES</h5>
                <a href="privacy.php" class="nav-link fw-bold">Privacy Policy</a>
                <a href="cookie.php" class="nav-link fw-bold">Cookie Policy</a>
                <a href="terms.php" class="nav-link fw-bold">Terms & Conditions</a>
                <a href="about.php" class="nav-link fw-bold">About Us</a>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
            <h5 class="text-light">CONTACTS</h5>
                <P class="text-white py-2"><b>Adress</b> : <?php echo $brand_res['brand_address'] ?></P>
                <p class="text-white py-2"><b>Call</b> : <?php echo $brand_res['brand_mobile_1'].", " ?><?php echo $brand_res['brand_mobile_2'] ?></p>
                <P class="text-white py-2"><b>Email</b> : <?php echo $brand_res['brand_email'] ?></P>
                <P class="text-white py-2"><b>Website</b> : <a href="#"><?php echo $brand_res['brand_domain'] ?></a></P>
            </div>
        </div>
    </div>
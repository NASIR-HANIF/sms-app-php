<?php

// nav bar link
require_once("../php/nav.php");
echo '

<div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 bg-white shadow-sm mt-3 p-4">
                        <h5 class="mb-3 fw-bold">Creat Branding
                            <i class="fa-solid fa-circle-notch fa-spin d-none brand-loader float-end mt-1"
                                style="font-size: 18px;"></i>
                                <i class="d-none fa fa-edit brand-edit-btn float-end mt-1"
                                style="font-size: 18px;cursor: pointer; ">&nbsp; EDIT BRAND</i>                  
                        </h5>
                       <form action="" class="brand-form">
                        <div class="form-group mb-3">
                            <label for="brand-name" class="fw-bold">Enter Brand Name</label>
                            <input type="text" id="brand-name" class="form-control" name="brand-name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="brand-logo" class="fw-bold">Choose Brand Logo</label>
                            <input type="file" id="brand-logo" class="form-control" name="brand-logo">
                        </div>
                        <div class="form-group mb-3">
                            <label for="brand-domain" class="fw-bold">Enter Domain Name</label>
                            <input type="text" id="brand-domain" class="form-control" name="brand-domain">
                        </div>
                        <div class="form-group mb-3">
                            <label for="brand-email" class="fw-bold">Enter Brand Email</label>
                            <input type="email" id="brand-email" class="form-control" name="brand-email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="brand-twitter" class="fw-bold">Social Handles</label>
                            <input type="url" id="brand-twitter" placeholder="twitter-url" class="form-control mb-3" name="brand-twitter">
                            <input type="url" id="brand-facebook" placeholder="facebook-url" class="form-control mb-3" name="brand-facebook">
                            <input type="url" id="brand-instagram" placeholder="instagram-url" class="form-control mb-3" name="brand-instagram">
                            <input type="url" id="brand-whatsapp" placeholder="whatsapp-url" class="form-control mb-3" name="brand-whatsapp">
                        </div>
                        <div class="form-group mb-3">
                            <label for="brand-adress" class="fw-bold">Brand Address</label>
                             <textarea name="brand-address" id="brand-address" class="form-control" ></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="brand-phone" class="fw-bold">Enter Phone number</label>
                            <input type="number" id="brand-mobile-1" class="form-control mb-3" name="brand-mobile-1">
                            <input type="number" id="brand-mobile-2" class="form-control" name="brand-mobile-2">
                        </div>
                        <div class="form-group mb-3">
                            <label for="brand-about" class="fw-bold">About Us 0/5000</label>
                             <textarea name="brand-about" id="brand-about" rows="10" class="form-control" ></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="brand-privacy" class="fw-bold">Privacy Policy 0/5000</label>
                             <textarea name="brand-privacy" id="brand-privacy" rows="10" class="form-control" ></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="brand-cookie" class="fw-bold">Cookie Policy 0/5000</label>
                             <textarea name="brand-cookie" id="brand-cookie" rows="10" class="form-control" ></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="brand-terms" class="fw-bold">Terms & Conditions 0/5000</label>
                             <textarea name="brand-terms" id="brand-terms" rows="10" class="form-control" ></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-primary w-100">Creat Brand</button>

                        </div>


                       </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                
</div>

';

?>
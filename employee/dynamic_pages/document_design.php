<?php
require_once("../php/nav.php");
echo '

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col-md-10 bg-white shadow-sm mt-3 p-4">
            <h5 class="mb-3">
                Add Document
                <i class="fa-solid fa-circle-notch fa-spin d-none document-loder float-end mt-1"
                    style="font-size: 18px;"></i>
            </h5>
            <form class="document-form">
                <div class="row mb-3">
                    <div class="col-md-8">
                        <label for="stu-enrollment" class="fw-bold">Student Enrollment</label>
                        <span class="text-danger enroll-doc-msg"></span>
                        <input type="text" required reruarid name="stu-enrollment" id="stu-enrollment" class="form-control mb-3">
                        <label for="stu-photo" class="fw-bold">Upload Passport Size Photo</label>
                        <input type="file" required name="photo" accept="image/png, image/gif, image/jpeg" id="stu-photo" class="form-control mb-3"> 
                    </div>                               
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                       <img src="photos/avater.png" width="150" height="150" alt=""> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <label for="signature" class="fw-bold"> Upload Signature</label>
                        <input type="file" required name="signature" accept="image/png,  image/jpeg" id="signature" class="form-control mb-3">
                        <label for="stu-proof" class="fw-bold">Upload Id Proof In Pdf Form</label>
                        <input type="file" required name="id-proof" accept=".pdf" id="stu-proof"  class="form-control mb-3"> 
                    </div>                               
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                       <img src="signatures/signature.png" width="150" height="150" alt=""> 
                    </div>
                </div>
                <button class="btn disabled btn-primary w-100 document-btn">Upload Document</button>
            </form>  
                     
        </div>
        <div class="col-md-1"></div>
    </div>
</div>  

    ';

?>
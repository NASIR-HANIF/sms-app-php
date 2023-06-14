<?php
// database connection link
require_once("../../common_files/php/database.php");
$all_category = [];
$get_category = "SELECT * FROM category";
$response = $db ->query($get_category);
if($response){
    while($data = $response -> fetch_assoc()){
        array_push($all_category,$data['category_name']);

    }
};

$length = count($all_category);
// nav bar link
require_once("../php/nav.php");
echo '


<div class="container-fluid">
            <div class="row mb-3">
                <div class="col-md-1"></div>
                <div class="col-md-10 bg-white shadow-sm mt-3 p-4">
                    <h5 class="mb-3">Student Registration Form
                        <i class="fa-solid fa-circle-notch fa-spin d-none student-loder float-end mt-1"
                            style="font-size: 18px;"></i>
                    </h5>
                    <form class="student-form">
                        <div class="row">
                            <div class="col-md-4">
                                <select name="stu-category" id="stu-category" class="form-select mb-3">
                                    <option value="choose category">Choose Category</option>';
                                    for($i = 0;$i < $length; $i++){ echo '<option value="' .$all_category[$i].'">
                                        '.$all_category[$i].'</option>';
                                        }
                                        echo '
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="stu-course" id="stu-course" class="form-select mb-3">
                                    <option value="choose course">Choose course</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="stu-batch" id="stu-batch" class="form-select mb-3">
                                    <option value="choose batch">Choose Batch</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="enrollment" placeholder="Enrollment" class="form-control enrollmentel">
                                <span class="text-danger enr-msg"></span>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="name" placeholder="Name" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <input type="number" class="form-control day" min="1" max="31" name="day" placeholder="DD">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <select name="month" class="form-select month">
                                            <option value="choose month">Choose Month</option>
                                            <option value="january">January</option>
                                            <option value="february">February</option>
                                            <option value="march">March</option>
                                            <option value="april">April</option>
                                            <option value="may">May</option>
                                            <option value="june">June</option>
                                            <option value="july">July</option>
                                            <option value="august">August</option>
                                            <option value="september">September</option>
                                            <option value="october">October</option>
                                            <option value="november">November</option>
                                            <option value="december">December</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="number" class="form-control year" name="year" placeholder="YY">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <select name="gender" class="form-select mb-3 gender">
                                    <option value="choose gender">Choose Gender</option>
                                    <option value="male">Male</option>
                                    <option value="femaile">Femaile</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="father" placeholder="Father Name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="mother" placeholder="Mother Name" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 mb-3">
                                <input type="email" name="email" placeholder="Email" class="form-control email">
                                <span class="email-msg text-danger"></span>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="password" name="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input type="tel" name="mobile" placeholder="Mobile Number" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="country" placeholder="Country" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="state" class="form-control" placeholder="State">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="city" placeholder="City" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="pincode" class="form-control" placeholder="Pincode">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <input type="number" readonly name="fee" placeholder="Fee" class="fee form-control">
                            </div>
                            <div class="col-md-6">
                                <input type="text" readonly name="fee-time" class="fee-time form-control"
                                    placeholder="fee Time">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="checkbox" id="stu-active" name="stu-active">
                                <label for=" stu-active">Is Active</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="stu-added-by" placeholder="Added By">
                                
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                               <button class="btn stu-add-btn btn-primary float-end">Add Student</button>
                               <button type="button" class="btn d-none btn-danger float-end">Update
                                 Student</button>
                    
                            </div>
                        </div>
                       
                    </form>
                </div>
                <div class="col-md-1"></div>
             </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 bg-white p-4 shadow-sm">
                        <div class="row">
                            <div class="col-md-6">
                                <select name="select-category" id="stu-list-category"
                                    class="form-select course-category mb-3">
                                    <option value="choose category">Choose category</option>';

                                    for($i = 0;$i < $length; $i++){ echo '<option value="' .$all_category[$i].'">
                                        '.$all_category[$i].'</option>';

                                        }
                          echo '
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select name="select-course" id="stu-list-course"
                            class="form-select course-category mb-3">
                            <option value="choose course">Choose Course</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select name="select-batch" id="stu-list-batch" class="form-select  mb-3">
                            <option value="choose batch">Choose Batch</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="search by Name and Enrollment">
                    </div>

                </div>
                <h5 class="mb-3">Batch List
                    <i class="fa-solid fa-circle-notch fa-spin d-none student-list-loder float-end mt-1"
                        style="font-size: 18px;"></i>
                </h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-nowrap">Sr No</th>
                                <th class="text-nowrap">Category</th>
                                <th class="text-nowrap">Course</th>
                                <th class="text-nowrap">Batch</th>
                                <th class="text-nowrap">Enrollment</th>
                                <th class="text-nowrap">Name</th>
                                <th class="text-nowrap">Father Name</th>
                                <th class="text-nowrap">Mother Name</th>
                                <th class="text-nowrap">Dob</th>
                                <th class="text-nowrap">Gender</th>
                                <th class="text-nowrap">Email</th>
                                <th class="text-nowrap">Password</th>
                                <th class="text-nowrap">Mobile</th>
                                <th class="text-nowrap">Countery</th>
                                <th class="text-nowrap">State</th>
                                <th class="text-nowrap">City</th>
                                <th class="text-nowrap">PinCode</th>
                                <th class="text-nowrap">Fee</th>
                                <th class="text-nowrap">fee Time</th>
                                <th class="text-nowrap">Photo</th>
                                <th class="text-nowrap">Signature</th>
                                <th class="text-nowrap">ID Proof</th>
                                <th class="text-nowrap">Status</th>
                                <th class="text-nowrap">Added By</th>
                                <th class="text-nowrap">Added Date</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody class="student-list">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
 </div>


    ';

?>
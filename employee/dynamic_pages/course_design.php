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

<div clascontainer-fluid">
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col-md-10 bg-white shadow-sm mt-3 p-4">
    <h5 class="mb-3">CREATE COURSE
        <i class="fa-solid fa-circle-notch fa-spin d-none course-loder float-end mt-1" style="font-size: 18px;"></i>
    </h5>
    <form class="course-form">
        <select name="course-category" class="form-select mb-3">
            <option value="choose category">Choose category</option>';

for($i = 0;$i < $length; $i++){
echo '<option value="'.$all_category[$i].'">'.$all_category[$i].'</option>';

}

  echo '
     </select>
        <div class="row mb-3">
            <div class="col-6">
                <input type="text" name="course-code" placeholder="Course-code"
                    class="form-control">
            </div>
            <div class="col-6">
                <input type="text" name="course-name" placeholder="Course-Name"
                    class="form-control">
            </div>
        </div>
        <textarea name="course-detail" placeholder="Course Detail"
            class="form-control mb-3"></textarea>
        <div class="row mb-3">
            <div class="col-6">
                <input type="text" name="course-duration" placeholder="Course-Duration"
                    class="form-control">
            </div>
            <div class="col-6">
                <select name="course-time" class="form-select">
                    <option value="days">Days</option>
                    <option value="month">Month</option>
                    <option value="years">Years</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <input type="text" name="course-fee" placeholder="Course-Fee" class="form-control">
            </div>
            <div class="col-6">
                <select name="course-fee-time" class="form-select">
                    <option value="monthly">Monthly</option>
                    <option value="one-time">One Time</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <input type="file" name="course-logo" class="form-control">
            </div>
            <div class="col-6">
                <input type="text" name="course-added-by" class="form-control"
                    placeholder="Course-Added-By">
            </div>
        </div>
<div class="row mb-3">
            <div class="col-6
           <label for="course-active">Is Active</label>
           <input type="checkbox" id="course-active"  name="course-active">  
       </div>
     <div class="col-6 ">
         <button class="btn btn-primary float-end">Add Course</button>
         <button type="button" class="btn btn-danger d-none float-end">Update Course</button>
     </div>
 </div>
       </form>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 bg-white p-4 shadow-sm">
                 <select name="choose category" class="form-select course-category mb-3">
                <option value="choose category">Choose category</option>';

        for($i = 0;$i < $length; $i++){
            echo '<option value="'.$all_category[$i].'">'.$all_category[$i].'</option>';
            
            }

      echo '         
            </select>
            <h5 class="mb-3">COURSE LIST
                <i class="fa-solid fa-circle-notch fa-spin d-none course-list-loder float-end mt-1" style="font-size: 18px;"></i>
            </h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Sr No</th>
                            <th class="text-nowrap">Category</th>
                            <th class="text-nowrap">Course Code</th>
                            <th class="text-nowrap">Course name</th>
                            <th class="text-nowrap">Duration</th>
                            <th class="text-nowrap">Total Time</th>
                            <th class="text-nowrap">Fee</th>
                            <th class="text-nowrap">Fee Period</th>
                            <th class="text-nowrap">Adeed Data</th>
                            <th class="text-nowrap">Is Active</th>                           
                            <th class="text-nowrap">Adeed By</th>
                            <th class="text-nowrap">Course Detail</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody class="course-list">
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
            </div>


';

?>
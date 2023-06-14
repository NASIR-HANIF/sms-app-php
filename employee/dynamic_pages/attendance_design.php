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
        <h5 class="mb-3">Creat Attendance
            <i class="fa-solid fa-circle-notch fa-spin d-none attendance-loader float-end mt-1"
                style="font-size: 18px;"></i>
        </h5>
        <form class="invoice-form">
            <div class="row">
                <div class="col-md-4">
                    <select name="select-category" id="att-category"
                        class="form-select course-category mb-3">
                        <option value="choose category">Choose category</option>';

                        for($i = 0;$i < $length; $i++){ echo '<option value="' .$all_category[$i].'">
                            '.$all_category[$i].'</option>';

                            }
                            echo '
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="select-course" id="att-course"
                        class="form-select course-category mb-3">
                        <option value="choose course">Choose Course</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="select-batch" id="att-batch" class="form-select  mb-3">
                        <option value="choose batch">Choose Batch</option>
                    </select>
                </div>
            </div>
            <input type="date" class="date form-control mb-3">
            <div class="table-responsive">
                <table class="table mb-3">
                    <tr>
                        <thead>
                            <th>Sr</th>
                            <th>Enrollment</th>
                            <th>Name</th>
                            <th>Batch</th>
                            <th>Attendance</th>

                        </thead>
                    </tr>
                    <tbody class="attendance-list">
                       
                    </tbody>
                </table>

            </div>
            <button disabled class=" btn btn-primary float-end attendance-btn">Add Attendance</button>
        </form>
    </div>
    <div class="col-md-1"></div>
</div>
</div>
';
?>
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


<div class = "container-fluid">
<div class="row mb-3">
    <div class="col-md-1"></div>
    <div class="col-md-10 bg-white shadow-sm mt-3 p-4">
        <h5 class="mb-3">CREATE BATCH
            <i class="fa-solid fa-circle-notch fa-spin d-none batch-loder float-end mt-1"
                style="font-size: 18px;"></i>
        </h5>
        <form class="batch-form">
            <div class="row">
                <div class="col-md-6">
                    <select name="batch-category" id="batch-category" class="form-select mb-3">
                        <option value="choose category">Choose Category</option>';

                        for($i = 0;$i < $length; $i++){ echo '<option value="' .$all_category[$i].'">
                            '.$all_category[$i].'</option>';

                            }

                            echo '
                    </select>
                </div>
                <div class="col-md-6">
                    <select name="batch-course" id="batch-course" class="form-select mb-3">
                        <option value="choose course">Choose course</option>

                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <input type="text" name="batch-code" placeholder="Batch-code"
                        class="form-control">
                </div>
                <div class="col-6">
                    <input type="text" name="batch-name" placeholder="Batch-Name"
                        class="form-control">
                </div>
            </div>
            <textarea name="batch-detail" placeholder="Batch Detail"
                class="form-control mb-3"></textarea>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="batch-from">Batch From</label>
                    <input type="time" name="batch-from" id="batch-from" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="batch-to">Batch To</label>
                    <input type="time" name="batch-to" id="batch-to" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="batch-from-date">Batch From Date</label>
                    <input type="date" name="batch-from-date" id="batch-from-date" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="batch-to-date">Batch To Date</label>
                    <input type="date" name="batch-to-date" id="batch-to-date" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="file" name="batch-logo" class="form-control">
                </div>
                <div class="col-md-6">
                    <input type="text" name="batch-added-by" class="form-control"
                        placeholder="Batch-Added-By">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                 <label for=" batch-active">Is Active</label>
                    <input type="checkbox" id="batch-active" name="batch-active">
                </div>
                <div class="col-md-6 ">
                    <button class="btn btn-primary float-end">Add Batch</button>
                    <button type="button" class="btn btn-danger d-none float-end">Update Batch</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-1"></div>
</div>
<div class="row">
    <div class="col-1"></div>
    <div class="col-10 bg-white p-4 shadow-sm">
        <div class="row">
        <div class="col-md-6">
        <select name="choose category" id="batch-list-category" class="form-select course-category mb-3">
            <option value="choose category">Choose category</option>';

            for($i = 0;$i < $length; $i++){ echo '<option value="' .$all_category[$i].'">
                '.$all_category[$i].'</option>';

                }

                echo '
        </select>
        </div>
        <div class="col-md-6">
        <select name="select category" id="batch-list-course" class="form-select course-category mb-3">
            <option value="choose course">Choose Course</option>
        </select>
        </div>
        </div>
        <h5 class="mb-3">BATCH LIST
            <i class="fa-solid fa-circle-notch fa-spin d-none batch-list-loder float-end mt-1"
                style="font-size: 18px;"></i>
        </h5>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-nowrap">Sr No</th>
                        <th class="text-nowrap">Category</th>
                        <th class="text-nowrap">Course</th>
                        <th class="text-nowrap">Batch Code</th>
                        <th class="text-nowrap">Batch Name</th>
                        <th class="text-nowrap">Starting Timing</th>
                        <th class="text-nowrap">Ending Timing</th>
                        <th class="text-nowrap">Start Date</th>
                        <th class="text-nowrap">End Date</th>
                        <th class="text-nowrap">Is Active</th>
                        <th class="text-nowrap">Adeed By</th>
                        <th class="text-nowrap">Batch Detail</th>
                        <th class="text-nowrap">Added Date</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody class="batch-list">

                </tbody>
            </table>
        </div>
    </div>
    <div class="col-1"></div>
</div>
</div>


';

?>
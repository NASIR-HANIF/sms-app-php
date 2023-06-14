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
        <h5 class="mb-3">Add Invoice
            <i class="fa-solid fa-circle-notch fa-spin d-none invoice-loder float-end mt-1"
                style="font-size: 18px;"></i>
        </h5>
        <form class="invoice-form">
            <label for="invoice-enrollment">Enter Enrollment No</label>
            <span class="text-danger invoice-msg"></span>
            <input type="text" class="form-control mb-3"
                id="search-enrollment" placeholder="Search Enrollment">
            <div class="table-responsive">
                <table class="table mb-3">
                    <tr>
                        <thead>
                            <th>Enrollment</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Course</th>
                            <th>Batch</th>
                        </thead>
                    </tr>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" readonly name="invoice-enrollment">
                            </td>
                            <td><input type="text" class="form-control" readonly name="invoice-name"></td>
                            <td><input type="text" class="form-control" readonly name="invoice-category">
                            </td>
                            <td><input type="text" class="form-control" readonly name="invoice-course"></td>
                            <td><input type="text" class="form-control" readonly name="invoice-batch"></td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="mb-3 d-flex w-75  align-items-center justify-content-between">
                <h4>Total Fee</h4>
                <div>
                    <span class="invoice-fee"></span>
                    <strong class="text-success">Rs</strong>
                </div>
            </div>
            <div class="d-flex w-75  align-items-center justify-content-between">
                <h4>Paid Amount</h4>
                <div>
                    <span class="invoice-fee"></span>
                    <strong class="text-success">Rs</strong>
                </div>
            </div>
            <table class="table mb-3">
                <tr>
                    <thead>
                        <th>Fee Time</th>
                        <th>Amount Pending</th>
                        <th>Amount Payable</th>

                    </thead>
                </tr>
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" readonly name="invoice-fee-time">
                        </td>
                        <td><input type="text" class="form-control" readonly name="invoice-pending">
                        </td>
                        <td><input type="text" class="form-control recent-paid" name="invoice-recent">
                        </td>

                    </tr>
                </tbody>
            </table>
            <button class="disabled btn btn-primary float-end invoice-btn">Add Invoice</button>


        </form>
    </div>
    <div class="col-md-1"></div>
</div>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 bg-white p-4 shadow-sm">
        <div class="row">
            <div class="col-md-6">
                <select name="select-batch" id="stu-list-batch" class="form-select  mb-3">
                    <option value="choose batch">Choose Batch</option>
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="search by Name and Enrollment">
            </div>

            <h5 class="mb-3">Batch List
                <i class="fa-solid fa-circle-notch fa-spin d-none student-list-loder float-end mt-1"
                    style="font-size: 18px;"></i>
            </h5>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Sr No</th>
                            <th class="text-nowrap">Category</th>
                            <th class="text-nowrap">Course</th>
                            <th class="text-nowrap">Batch</th>
                            <th class="text-nowrap">Enrollment</th>
                            <th class="text-nowrap">Name</th>
                            <th class="text-nowrap">Fee Time</th>
                            <th class="text-nowrap">Paid fee</th>
                            <th class="text-nowrap">Recently pay</th>
                            <th class="text-nowrap">Due Fee</th>
                            <th class="text-nowrap">Paid Date</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody class="invoice-list">
                        <tr index="1">
                            <td class="text-nowrap">1</td>
                            <td class="text-nowrap">Diploma</td>
                            <td class="text-nowrap">php</td>
                            <td class="text-nowrap">gtbtb from 17:19 to 17:19</td>
                            <td class="text-nowrap">12345</td>
                            <td class="text-nowrap">nasir</td>
                            <td class="text-nowrap">7 :10 pm</td>
                            <td class="text-nowrap">2500</td>
                            <td class="text-nowrap">500</td>
                            <td class="text-nowrap">6000</td>
                            <td class="text-nowrap">25-12-2023</td>
                            <td class="text-nowrap">
                                <button class="btn edit-btn btn-primary p-2 px-1"><i
                                        class="fa fa-edit"></i></button>
                                <button class="btn del-btn btn-danger p-2 px-1"><i
                                        class="fa fa-trash"></i></button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

 ';
?>
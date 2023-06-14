<?php
require_once("../php/nav.php");
echo '

<div class="row py-3">
    
    <div class="col-4 bg-white shadow-sm py-2"  style="height: 410px;overflow-y: scroll;">
        <h5 class="mb-3">Creat Category
             <i class="fa-solid fa-circle-notch fa-spin d-none creat-category-loder float-end mt-1"
                style="font-size: 18px;"></i>
             </h5>
        <form class="category-form">
            <input type="text" name="category" placeholder="Category Name" class="form-control category mb-3">
            <textarea name="details" class="form-control details mb-3" placeholder="details"></textarea>
            <div class="dynamic-fields"></div>
            <div align="end">
             <button type="button" class="btn btn-primary category-add-btn"><i class="fa fa-plus"></i>Add Fields</button>
            <button type="submit" class="btn btn-danger category-create-btn">Create</button>

            </div>
       </form>
     </div>
    <div class="col-2"></div>
    <div class="col-6 bg-white py-2" style="height: 410px;overflow-y: scroll;">
       <h5 class="mb-3">Category LIST
           <i class="fa-solid fa-circle-notch fa-spin category-list-loder d-none float-end mt-1"
               style="font-size: 18px;"></i>

       </h5>
       <hr>
       <table class="table table-striped" >
       <thead>
           <tr>
               <th>Sr No</th>
               <th>Catagory Name</th>
               <th>Catagory Details</th>
               <th>Action</th>
            </tr>
        </thead>
        <tbody class="category_list">
        
                            
        </tbody>
        </table>
  </div>
</div>

';
?>
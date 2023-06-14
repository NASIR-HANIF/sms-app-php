$(document).ready(function () {
  $(".institute-update-btn").click(function () {
    $(".institute-menu").collapse("toggle");
  });
});

// daynamic request
$(document).ready(function () {
  var activeLink = $(".active").attr("access-link");
  dynamicRequest(activeLink);
  $(".collapse-item").each(function () {
    $(this).click(function () {
      var access_link = $(this).attr("access-link");
      dynamicRequest(access_link);
    });
  });
});

// daynamic request ajax
function dynamicRequest(access_link) {
  $.ajax({
    type: "POST",
    url: "dynamic_pages/" + access_link,
    xhr: function () {
      var request = new XMLHttpRequest();
      request.onprogress = function (e) {
        var percentage = Math.floor((e.loaded * 100) / e.total);
        var progress = `
                <div class="progress " style="height:5px;">
                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: ${percentage}%;height:5px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
                
                `;
        $(".page").html(progress);
      };
      return request;
    },
    beforeSend: function () {
      var progress = `
            <div class="progress " style="height:5px;">
            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 50%;height:5px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
            
            `;
      $(".page").html(progress);
    },
    success: function (response) {
      $(".page").html(response);
      if (access_link == "category_design.php") {
        categoryFunc();
      } else if (access_link == "course_design.php") {
        creatCoursefunc();
      } else if (access_link == "batch_design.php") {
        creatBatchFunc();
      } else if (access_link == "student_design.php") {
        creatStudentFunc();
      } else if (access_link == "document_design.php") {
        creatDocmentFunc();
      } else if (access_link == "invoice_design.php") {
        creatInvoiceFunc();
      } else if (access_link == "branding_design.php") {
        creatBrandFunc();
      } else if (access_link == "attendance_design.php") {
        creatAttendanceFunc();
      }
    },
  });
  // active tab
  $(document).ready(function () {
    $(".collapse-item").each(function () {
      $(this).click(function () {
        $(".collapse-item").each(function () {
          $(this).removeClass("active");
        });
        $(this).addClass("active");
      });
    });
  });
}
// start add category
function categoryFunc() {
  $(document).ready(function () {
    $(".category-add-btn").click(function () {
      var fileds = `
          <input type="text" name="category" placeholder="Category Name" class="form-control category mb-3">
          <textarea name="details" class="form-control details mb-3" placeholder="details"></textarea>
          
          `;
      $(".dynamic-fields").append(fileds);
    });
  });
  // end add category

  // start submit category code
  $(document).ready(function () {
    $(".category-create-btn").click(function (e) {
      e.preventDefault();
      var categoryEl = $(".category");
      var detailEl = $(".details");
      var i,
        category = [],
        details = [];

      for (i = 0; i < categoryEl.length; i++) {
        category[i] = categoryEl[i].value;
        details[i] = detailEl[i].value;
      }
      $.ajax({
        type: "POST",
        url: "php/creat_category.php",
        data: {
          category: JSON.stringify(category),
          details: JSON.stringify(details),
        },
        beforeSend: function () {
          $(".creat-category-loder").removeClass("d-none");
        },
        success: function (response) {
          $(".category-form").get(0).reset();
          if (response == "success") {
            $(".creat-category-loder").addClass("d-none");
            swal("new category add ", response.trim(), "success");

            getcategory();
          } else {
            $(".creat-category-loder").addClass("d-none");
            swal(response.trim(), response.trim(), "warning");
          }
        },
      });
    });
  });
  // end submit category code

  // get category function start
  async function getcategory() {
    try {
      var response = await ajaxGetAllData("category", "category-list-loder");
      $(".category-list-loder").addClass("d-none");
      var all_category = JSON.parse(response.trim());
      $(".category_list").html("");
      all_category.forEach((data, index) => {
        var tr = `

<tr index="${data.id}">
<td>${index + 1}</td>
<td>${data.category_name}</td>
<td>${data.details}</td>
<td>
    <button class="btn edit-btn btn-primary p-1 px-2"><i class="fa fa-edit"></i></button>
    <button class="btn save-btn d-none btn-primary p-1 px-2"><i class="fa fa-save"></i></button>
    <button class="btn btn-danger del-btn p-1 px-2"><i class="fa fa-trash"></i></button>
</td>
</tr>

`;
        $(".category_list").append(tr);
      });
      // update category function call
      upDateCategory();
      // delete category function call
      deleteCategory();
    } catch (err) {
      console.log(err);
    }
  }

  getcategory();
  // get category function end
  // update category function start
  function upDateCategory() {
    var categeryList = document.querySelector(".category_list");
    var allEditBtn = categeryList.querySelectorAll(".edit-btn");
    $(allEditBtn).each(function () {
      $(this).click(function () {
        var parent = this.parentElement.parentElement;
        var td = parent.querySelectorAll("TD");
        var id = $(parent).attr("index");
        var saveBtn = parent.querySelector(".save-btn");
        td[1].contentEditable = true;
        td[1].focus();
        td[2].contentEditable = true;
        td[2].style.border = "2px solid red";
        $(this).addClass("d-none");
        $(saveBtn).removeClass("d-none");
        $(saveBtn).click(function () {
          var catagory = $(td[1]).html();
          var details = $(td[2]).html();
          $.ajax({
            type: "POST",
            url: "php/edit_category.php",
            data: {
              category: catagory,
              details: details,
              id: id,
            },
            cache: false,
            beforeSend: function () {
              $(".category-list-loder").removeClass("d-none");
            },
            success: function (response) {
              if (response.trim() == "success") {
                $(".category-list-loder").addClass("d-none");
                td[1].contentEditable = false;
                td[1].focus();
                td[2].contentEditable = false;
                td[2].style.border = "inherit";
                $(saveBtn).addClass("d-none");
                $(allEditBtn).removeClass("d-none");
                swal("Data Updated", "please check table", "success");
              } else {
                $(".category-list-loder").addClass("d-none");
                swal(response.trim(), response.trim(), "warning");
              }
            },
          });
        });
      });
    });
  }
  // delete category function
  function deleteCategory() {
    var allDellBtn = $(".category_list .del-btn");
    $(allDellBtn).each(function () {
      $(this).click(async function () {
        let parent = this.parentElement.parentElement;
        let id = $(parent).attr("index");
        var response = await ajaxDeleteBYid(
          id,
          "category",
          "category-list-loder"
        );
        if (response.trim() == "success") {
          getcategory();
          swal("Category Deleted", "please check table", "success");
        } else {
          swal(response.trim(), response.trim(), "warning");
        }
      });
    });
  }
}
// -----------------------------------------------------------
// start course codding
function creatCoursefunc() {
  $(".course-form").submit(function (e) {
    e.preventDefault();
    var courseActiveEl = document.querySelector("#course-active");
    var status = "";
    courseActiveEl.checked == true ? (status = "active") : (status = "pending");
    var formData = new FormData(this);
    formData.append("status", status);

    $.ajax({
      type: "POST",
      url: "php/creat_course.php",
      data: formData,
      processData: false,
      contentType: false,
      cache: false,
      beforeSend: function () {
        $(".course-loder").removeClass("d-none");
      },
      success: function (response) {
        $(".course-form").get(0).reset();
        if (response.trim() == "success") {
          $(".course-loder").addClass("d-none");
          swal("new Course add ", response.trim(), "success");
        } else {
          $(".course-loder").addClass("d-none");
          swal("fail ", response.trim(), "warning");
        }
      },
    });
  });

  function courseListFunc() {
    $(".course-category").on("change", function () {
      if (this.value != "choose category") {
        $.ajax({
          type: "POST",
          url: "php/course_list.php",
          data: {
            category: this.value,
          },
          beforeSend: function () {
            $(".course-list-loder").removeClass("d-none");
          },
          success: function (response) {
            $(".course-list-loder").addClass("d-none");
            if (response.trim() != "there is no data") {
              var all_data = JSON.parse(response.trim());
              var i,
                all_time = [],
                all_date = [];
              for (i = 0; i < all_data.length; i++) {
                var date = new Date(all_data[i].added_date);
                var dd = date.getDate();
                dd = dd < 10 ? "0" + dd : dd;
                var mm = date.getMonth() + 1;
                mm = mm < 10 ? "0" + mm : mm;
                var yy = date.getFullYear();
                var final_date = dd + "-" + mm + "-" + yy;
                var time = date.toLocaleTimeString();
                all_date.push(final_date);
                all_time.push(time);
              }
              $(".course-list").html("");
              all_data.forEach((data, index) => {
                var tr = `
                <tr index ="${data.id}">
                <td class="text-nowrap">${index + 1}</td>
                <td class="text-nowrap">${data.category}</td>
                <td class="text-nowrap">${data.code}</td>
                <td class="text-nowrap">${data.name}</td>
                <td class="text-nowrap">${data.duration}</td>
                <td class="text-nowrap">${data.course_time}</td>
                <td class="text-nowrap">${data.fee}</td>
                <td class="text-nowrap">${data.fee_time}</td>
                <td class="text-nowrap">${all_date[index]} ${all_time[index]
                  }</td>
                <td class="text-nowrap">${data.status}</td>
                <td class="text-nowrap">${data.added_by}</td>
                <td class="text-nowrap">${data.detail}</td>
                <td class="text-nowrap">
                    <button class="btn edit-btn btn-primary p-2 px-1"><i class="fa fa-edit"></i></button>
                    <button class="btn del-btn btn-danger p-2 px-1"><i class="fa fa-trash"></i></button>
                </td>
            </tr>     
                `;

                $(".course-list").append(tr);
              });

              // deleteCourseFun call
              deleteCourseFunc();
              // updateCourseFunc call
              upDateCourseFunc();
            } else {
              $(".course-list").html("");
              swal(response.trim(), response.trim(), "warning");
            }
          },
        });
      } else {
        $(".course-list").html("");
        swal("Select category", "Plese Select category First", "warning");
      }
    });
  }
  //get Course function
  courseListFunc();
  // delete course function
  function deleteCourseFunc() {
    allDellBtn = $(".course-list .del-btn");
    allDellBtn.each(function () {
      $(this).click(async function () {
        var parentEl = this.parentElement.parentElement;
        var id = $(parentEl).attr("index");

        try {
          var response = await ajaxDeleteBYid(
            id,
            "course",
            "course-list-loder"
          );
          if (response.trim() == "success") {
            swal("Delete successfully", response.trim(), "success");
            parentEl.remove();
          } else {
            swal(response.trim(), response.trim(), "warning");
          }
        } catch (error) {
          console.log(error);
        }
      });
    });
  }

  //start edit course function
  function upDateCourseFunc() {
    var allEditBtn = $(".course-list .edit-btn");
    var courseForm = document.querySelector(".course-form");
    var allICourseInput = courseForm.querySelectorAll("input");
    var textAreaEl = courseForm.querySelector("textarea");
    var allSelectEl = courseForm.querySelectorAll("select");
    var allbutton = courseForm.querySelectorAll("button");

    $(allEditBtn).each(function () {
      $(this).click(function () {
        var parent = this.parentElement.parentElement;
        var id = $(parent).attr("index");
        var allTd = parent.querySelectorAll("td");
        var status = allTd[9].innerHTML;
        if (status == "active") {
          allICourseInput[6].checked = true;
        } else {
          allICourseInput[6].checked = false;
        }
        allICourseInput[6].checked == true
          ? (status = "active")
          : (status = "pending");
        allSelectEl[0].value = allTd[1].innerHTML;
        allICourseInput[0].value = allTd[2].innerHTML;
        allICourseInput[1].value = allTd[3].innerHTML;
        allICourseInput[2].value = allTd[4].innerHTML;
        allICourseInput[3].value = allTd[6].innerHTML;
        allICourseInput[5].value = allTd[10].innerHTML;
        allSelectEl[1].value = allTd[5].innerHTML;
        allSelectEl[2].value = allTd[7].innerHTML;
        textAreaEl.value = allTd[11].innerHTML;
        allbutton[0].classList.add("d-none");
        allbutton[1].classList.remove("d-none");
        allbutton[1].onclick = function () {
          var formData = new FormData(courseForm);
          formData.append("status", status);
          formData.append("id", id);
          console.log(id);
          $.ajax({
            type: "POST",
            url: "php/update_course.php",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
              $(".course-loder").removeClass("d-none");
            },
            success: function (response) {
              if (response.trim() == "Success") {
                allbutton[1].classList.add("d-none");
                allbutton[0].classList.remove("d-none");
                $(".course-loder").addClass("d-none");
                $(".course-form").get(0).reset();
                swal("Update successfully", response.trim(), "success");
              } else {
                $(".course-loder").classList.add("d-none");
                swal(response.trim(), response.trim(), "warning");
              }
            },
          });
        };
      });
    });
  }
  //end edit course function
}
// end course codding
// ---------------------------------------------------------------------
// start creat batch coding
function creatBatchFunc() {
  $("#batch-category").on("change", async function () {
    var response = await ajaxGetAllCourse("course", this.value, "batch-loder");
    if (response.trim() != "there is no data") {
      var all_course = JSON.parse(response.trim());
      $("#batch-course").html(
        '<option value="choose course">Choose course</option>'
      );
      all_course.forEach((course) => {
        var option = `
       <option value="${course.name}">${course.name}</option>

       `;
        $("#batch-course").append(option);
      });
    } else {
      $("#batch-course").html(
        '<option value="choose course">Choose course</option>'
      );
      swal("Theare is no data", response.trim(), "warning");
    }
  });
  // adding batch coding
  $(".batch-form").on("submit", function (e) {
    e.preventDefault();
    if ($("#batch-course").val() != "choose course") {
      var activeEl = document.querySelector("#batch-active");
      var status = "";
      status =
        activeEl.checked == true ? (status = "active") : (status = "panding");
      var formData = new FormData(this);
      formData.append("status", status);
      $.ajax({
        type: "POST",
        url: "php/create_batch.php",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
          $(".batch-loder").removeClass("d-none");
        },
        success: function (response) {
          if (response.trim() == "success") {
            $(".batch-loder").addClass("d-none");
            $(".batch-form").get(0).reset();
            swal("Batch Added", "Added Batch Successfully", "success");
          } else {
            swal(response.trim(), response.trim(), "warning");
          }
        },
      });
    } else {
      swal("Select Course First!", "Choose Course!", "warning");
    }
  });
  // get course coding
  $("#batch-list-category").on("change", async function () {
    var response = await ajaxGetAllCourse("course", this.value, "batch-loder");
    if (response.trim() != "there is no data") {
      var all_course = JSON.parse(response.trim());
      $("#batch-list-course").html(
        '<option value="choose course">Choose course</option>'
      );
      all_course.forEach((course) => {
        var option = `
       <option value="${course.name}">${course.name}</option>

       `;
        $("#batch-list-course").append(option);
      });
    } else {
      $("#batch-list-course").html(
        '<option value="choose course">Choose course</option>'
      );
      swal("Theare is no data", response.trim(), "warning");
    }
  });
  // get batch coding
  $("#batch-list-course").on("change", async function () {
    try {
      var response = await ajaxGetAllBatch(
        "batch",
        $("#batch-list-category").val(),
        this.value,
        "batch-list-loder"
      );
      if (response.trim() != "there is no data") {
        var all_data = JSON.parse(response.trim());
        var i,
          all_time = [],
          all_date = [];
        for (i = 0; i < all_data.length; i++) {
          var date = new Date(all_data[i].added_date);
          var dd = date.getDate();
          dd = dd < 10 ? "0" + dd : dd;
          var mm = date.getMonth() + 1;
          mm = mm < 10 ? "0" + mm : mm;
          var yy = date.getFullYear();
          var final_date = dd + "-" + mm + "-" + yy;
          var time = date.toLocaleTimeString();
          all_date.push(final_date);
          all_time.push(time);
        }
        $(".batch-list").html("");
        all_data.forEach((data, index) => {
          var tr = `
        <tr index="${data.id}">
        <td class="text-nowrap">${index + 1}</td>
        <td class="text-nowrap">${data.category}</td>
        <td class="text-nowrap">${data.course}</td>
        <td class="text-nowrap">${data.code}</td>
        <td class="text-nowrap">${data.name}</td>
        <td class="text-nowrap">${data.batch_from}</td>
        <td class="text-nowrap">${data.batch_to}</td>
        <td class="text-nowrap">${data.batch_from_date}</td>
         <td class="text-nowrap">${data.batch_to_date}</td>
        <td class="text-nowrap">${data.status}</td>
        <td class="text-nowrap">${data.added_by}</td>
        <td class="text-nowrap">${data.detail}</td>
        <td class="text-nowrap">${all_date[index]} ${all_time[index]}</td>
        <td class="text-nowrap">
            <button class="btn edit-btn btn-primary p-2 px-2"><i class="fa fa-edit"></i></button>
            <button class="btn del-btn btn-danger p-2 px-2"><i class="fa fa-trash"></i></button>
        </td>
    </tr>     
        `;

          $(".batch-list").append(tr);
        });

        // delete batch function
        deleteBatchFunc();
        /* edit batch function */
        editBatchFunc();
      } else {
        $(".batch-list").html("");
        swal(response.trim(), response.trim(), "warning");
      }
    } catch (error) {
      console.log(error);
    }
  });

  // delete batch function start
  function deleteBatchFunc() {
    var allDelBtn = $(".batch-list .del-btn");
    $(allDelBtn).each(function () {
      $(this).click(async function () {
        var parentEl = this.parentElement.parentElement;
        var id = $(parentEl).attr("index");
        try {
          var response = await ajaxDeleteBYid(id, "batch", "batch-list-loder");
          if (response.trim() == "success") {
            parentEl.remove();
            swal("Batch Delete", "Batch Delete Successfully", "success");
          } else {
            swal(response.trim(), response.trim(), "warning");
          }
        } catch (error) {
          console.log(error);
        }
      });
    });
  }
  // delete batch function end

  /*  start edit batch function */
  function editBatchFunc() {
    var allEditBtn = $(".batch-list .edit-btn");
    $(allEditBtn).each(function () {
      $(this).click(function () {
        var batchForm = document.querySelector(".batch-form");
        var allInput = batchForm.querySelectorAll("input");
        var textArea = batchForm.querySelector("textarea");
        var allSelect = batchForm.querySelectorAll("select");
        var option = allSelect[1].querySelector("option");
        var allButton = batchForm.querySelectorAll("button");
        var parentEl = this.parentElement.parentElement;
        var id = $(parentEl).attr("index");
        var allTd = parentEl.querySelectorAll("td");
        allSelect[0].value = allTd[1].innerHTML;
        option.value = allTd[2].innerHTML;
        option.innerHTML = allTd[2].innerHTML;
        allInput[0].value = allTd[3].innerHTML;
        allInput[1].value = allTd[4].innerHTML;
        textArea.value = allTd[11].innerHTML;
        allInput[2].value = allTd[5].innerHTML;
        allInput[3].value = allTd[6].innerHTML;
        allInput[4].value = allTd[7].innerHTML;
        allInput[5].value = allTd[8].innerHTML;
        allInput[7].value = allTd[10].innerHTML;
        var status = allTd[9].innerHTML;

        if (status == "active") {
          $("#batch-active").attr("checked", true);
        } else {
          $("#batch-active").attr("checked", false);
        }
        allButton[0].classList.add("d-none");
        allButton[1].classList.remove("d-none");
        allButton[1].onclick = function () {
          status = allInput[8].checked
            ? (status = "active")
            : (status = "pending");
          var formData = new FormData(batchForm);
          formData.append("status", status);
          formData.append("id", id);
          if (allSelect[1].value != "choose course") {
            $.ajax({
              type: "POST",
              url: "php/update_batch.php",
              data: formData,
              contentType: false,
              processData: false,
              cache: false,
              beforeSend: function () {
                $(".batch-loder").removeClass("d-none");
              },
              success: function (response) {
                if (response.trim() == "success") {
                  batchForm.reset("");
                  $(".batch-loder").addClass("d-none");
                  allButton[1].classList.add("d-none");
                  allButton[0].classList.remove("d-none");
                  allInput[8].checked = false;
                  swal(
                    "Batch Updated",
                    "Batch Updated Successfully",
                    "success"
                  );
                } else {
                  swal(response.trim(), response.trim(), "warning");
                }
              },
            });
          } else {
            swal("Please Select Course", "Chose Course", "warning");
          }
        };
      });
    });
  }
  /*  end edit batch function */
}
// end creat batch coding
// -------------------------------------------------------------------
/* start student regestration codding*/

function creatStudentFunc() {
  $("#stu-category").on("change", async function () {
    var response = await ajaxGetAllCourse(
      "course",
      this.value,
      "student-loder"
    );
    if (response.trim() != "there is no data") {
      var all_course = JSON.parse(response.trim());
      $("#stu-course").html(
        '<option value="choose course">Choose course</option>'
      );
      all_course.forEach((course) => {
        var option = `
       <option value="${course.name}">${course.name}</option>

       `;
        $("#stu-course").append(option);
      });
    } else {
      $("#stu-course").html(
        '<option value="choose course">Choose course</option>'
      );
      swal("Theare is no data", response.trim(), "warning");
    }
  });
  // get batch coding
  $("#stu-course").on("change", async function () {
    var response = await ajaxGetAllBatch(
      "batch",
      $("#stu-category").val(),
      this.value,
      "student-loder"
    );
    if (response.trim() != "there is no data") {
      var all_course = JSON.parse(response.trim());
      $("#stu-batch").html(
        '<option value="choose batch">Choose Batch</option>'
      );
      all_course.forEach((batch) => {
        var option = `
       <option value="${batch.name} from ${batch.batch_from} to ${batch.batch_to}">${batch.name} from ${batch.batch_from} to ${batch.batch_to}</option>

       `;
        $("#stu-batch").append(option);
      });
    } else {
      $("#stu-batch").html(
        '<option value="choose batch">Choose Batch</option>'
      );
      swal("Theare is no data", response.trim(), "warning");
    }
  });

  // get corse fee coding
  $("#stu-course").on("change", async function () {
    var response = await ajaxGetAllCourseFee(
      "course",
      $("#stu-category").val(),
      this.value,
      "student-loder"
    );
    if (response.trim() != "there is no data") {
      var data = JSON.parse(response.trim());
      $(".fee").val(data.fee);
      $(".fee-time").val(data.fee_time);
    } else {
      $("#stu-batch").html(
        '<option value="choose batch">Choose Batch</option>'
      );
      swal("Theare is no data", response.trim(), "warning");
    }
  });

  // adding student coding start

  $(".student-form").submit(function (e) {
    e.preventDefault();
    if ($("#stu-batch").val() != "choose batch") {
      if ($(".month").val() != "choose month") {
        if ($(".gender").val() != "choose gender") {
          var dd = $(".day").val();
          var mm = $(".month").val();
          var yy = $(".year").val();
          var dob = dd + "-" + mm + "-" + yy;

          var statusEl = document.querySelector("#stu-active");
          var status = "";

          status =
            statusEl.checked == true
              ? (status = "active")
              : (status = "panding");
          var formData = new FormData(this);
          formData.append("status", status);
          formData.append("dob", dob);
          $.ajax({
            type: "POST",
            url: "php/creat_student.php",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function () {
              $(".student-loder").removeClass("d-none");
            },
            success: function (response) {
              if (response.trim() == "success") {
                $(".student-loder").addClass("d-none");
                $(".student-form").get(0).reset();
                swal("Student Added", "Check Student Table", "success");
              } else {
                swal(response.trim(), response.trim(), "warning");
              }
            },
          });
        } else {
          swal("choose gender", "Please Choose gender", "warning");
        }
      } else {
        swal("choose month", "Please Choose month", "warning");
      }
    } else {
      swal("choose batch", "Please Choose Batch", "warning");
    }
  });
  // sdding student coding end

  // get student function start

  $("#stu-list-category").on("change", async function () {
    var response = await ajaxGetAllCourse(
      "course",
      this.value,
      "student-list-loder"
    );
    if (response.trim() != "there is no data") {
      var all_course = JSON.parse(response.trim());
      $("#stu-list-course").html(
        '<option value="choose course">Choose course</option>'
      );
      all_course.forEach((course) => {
        var option = `
     <option value="${course.name}">${course.name}</option>

     `;
        $("#stu-list-course").append(option);
      });
    } else {
      $(".student-list").html("");
      $("#stu-list-batch").html(
        '<option value="choose batch">Choose Batch</option>'
      );
      $("#stu-list-course").html(
        '<option value="choose course">Choose course</option>'
      );
      swal("Theare is no data", response.trim(), "warning");
    }
  });
  // get batch coding
  $("#stu-list-course").on("change", async function () {
    var response = await ajaxGetAllBatch(
      "batch",
      $("#stu-list-category").val(),
      this.value,
      "student-list-loder"
    );
    if (response.trim() != "there is no data") {
      var all_course = JSON.parse(response.trim());
      $("#stu-list-batch").html(
        '<option value="choose batch">Choose Batch</option>'
      );
      all_course.forEach((batch) => {
        var option = `
     <option value="${batch.name} from ${batch.batch_from} to ${batch.batch_to}">${batch.name} from ${batch.batch_from} to ${batch.batch_to}</option>

     `;
        $("#stu-list-batch").append(option);
      });
    } else {
      $(".student-list").html("");
      $("#stu-list-batch").html(
        '<option value="choose batch">Choose Batch</option>'
      );
      swal("Theare is no data", response.trim(), "warning");
    }
  });
  $("#stu-list-batch").on("change", async function () {
    var response = await ajaxGetAllStudents(
      "students",
      $("#stu-list-category").val(),
      this.value,
      "student-list-loder"
    );
    if (response.trim() != "there is no data") {
      var all_data = JSON.parse(response.trim());
      $(".student-list").html("");
      all_data.forEach((data, index) => {
        var tr = `
      <tr index ="${data.id}">
      <td class="text-nowrap">${index + 1}</td>
      <td class="text-nowrap">${data.category}</td>
      <td class="text-nowrap">${data.course}</td>
      <td class="text-nowrap">${data.batch}</td>
      <td class="text-nowrap">${data.enrollment}</td>
      <td class="text-nowrap">${data.name}</td>
      <td class="text-nowrap">${data.father}</td>
      <td class="text-nowrap">${data.mother}</td>
      <td class="text-nowrap">${data.dob}</td>
      <td class="text-nowrap">${data.gender}</td>
      <td class="text-nowrap">${data.email}</td>
      <td class="text-nowrap">${data.password}</td>
      <td class="text-nowrap">${data.mobile}</td>
      <td class="text-nowrap">${data.country}</td>
      <td class="text-nowrap">${data.state}</td>
      <td class="text-nowrap">${data.city}</td>
      <td class="text-nowrap">${data.pincode}</td>
      <td class="text-nowrap">${data.fee}</td>
      <td class="text-nowrap">${data.fee_time}</td>
      <td class="text-nowrap">${data.photo}</td>
      <td class="text-nowrap">${data.signature}</td>
      <td class="text-nowrap">${data.id_proof}</td>
      <td class="text-nowrap">${data.status}</td>
      <td class="text-nowrap">${data.added_by}</td>
      <td class="text-nowrap">${data.added_date}</td>
      
      <td class="text-nowrap">
          <button class="btn edit-btn btn-primary p-2 px-1"><i class="fa fa-edit"></i></button>
          <button class="btn del-btn btn-danger p-2 px-1"><i class="fa fa-trash"></i></button>
      </td>
  </tr>     
      `;

        $(".student-list").append(tr);
      });

      // delete student function
      deleteStudentFunc();
      // student update function
      studentUpdateFunc();
    } else {
      $(".student-list").html("");
      swal(response.trim(), response.trim(), "warning");
    }
  });
  // get student function end
  // delete student function
  function deleteStudentFunc() {
    allDellBtn = $(".student-list .del-btn");
    allDellBtn.each(function () {
      $(this).click(async function () {
        var parentEl = this.parentElement.parentElement;
        var id = $(parentEl).attr("index");

        try {
          var response = await ajaxDeleteBYid(
            id,
            "students",
            "student-list-loder"
          );
          if (response.trim() == "success") {
            swal("Student Delete successfully", response.trim(), "success");
            parentEl.remove();
          } else {
            swal(response.trim(), response.trim(), "warning");
          }
        } catch (error) {
          console.log(error);
        }
      });
    });
  }
  // student update function
  function studentUpdateFunc() {
    var allEditBtn = $(".student-list .edit-btn");
    $(allEditBtn).each(function () {
      $(this).click(function () {
        var studentForm = document.querySelector(".student-form");
        var allInput = studentForm.querySelectorAll("input");
        var allSelect = studentForm.querySelectorAll("select");
        var option1 = allSelect[1].querySelector("option");
        var option2 = allSelect[2].querySelector("option");
        var allButton = studentForm.querySelectorAll("button");
        var parentEl = this.parentElement.parentElement;
        var id = $(parentEl).attr("index");
        var allTd = parentEl.querySelectorAll("td");
        allSelect[0].value = allTd[1].innerHTML;
        option1.value = allTd[2].innerHTML;
        option1.innerHTML = allTd[2].innerHTML;
        option2.value = allTd[3].innerHTML;
        option2.innerHTML = allTd[3].innerHTML;
        allInput[0].value = allTd[4].innerHTML;
        allInput[1].value = allTd[5].innerHTML;
        allInput[4].value = allTd[6].innerHTML;
        allInput[5].value = allTd[7].innerHTML;
        var dob = allTd[8].innerHTML.split("-");
        allInput[2].value = dob[0];
        allInput[3].value = dob[2];
        allSelect[3].value = dob[1];
        allSelect[4].value = allTd[9].innerHTML;
        allInput[6].value = allTd[10].innerHTML;
        allInput[7].value = allTd[11].innerHTML;
        allInput[8].value = allTd[12].innerHTML;
        allInput[9].value = allTd[13].innerHTML;
        allInput[10].value = allTd[14].innerHTML;
        allInput[11].value = allTd[15].innerHTML;
        allInput[12].value = allTd[16].innerHTML;
        allInput[13].value = allTd[17].innerHTML;
        allInput[14].value = allTd[18].innerHTML;
        var status = allTd[22].innerHTML;
        if (status == "active") {
          $("#stu-active").attr("checked", true);
        } else {
          $("#stu-active").attr("checked", false);
        }
        allInput[16].value = allTd[23].innerHTML;
        allButton[0].classList.add("d-none");
        allButton[1].classList.remove("d-none");
        allButton[1].onclick = function () {
          var statusEl = document.getElementById("stu-active");
          status = statusEl.checked
            ? (status = "active")
            : (status = "pending");
          var formData = new FormData(studentForm);
          formData.append("status", status);
          formData.append("id", id);
          var dd = allInput[2].value;
          var mm = allSelect[3].value;
          var yy = allInput[3].value;
          var dob = dd + "-" + mm + "-" + yy;
          formData.append("dob", dob);
          $.ajax({
            type: "POST",
            url: "php/update_student.php",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function () {
              $(".student-loder").removeClass("d-none");
            },
            success: function (response) {
              if (response.trim() == "success") {
                $(".student-form").get(0).reset();
                $(".student-loder").addClass("d-none");
                allButton[1].classList.add("d-none");
                allButton[0].classList.remove("d-none");
                statusEl.checked = false;
                swal(
                  "Student Updated",
                  "Student Updated Successfully",
                  "success"
                );
              } else {
                swal(response.trim(), response.trim(), "warning");
              }
            },
          });
        };
      });
    });
  }
  // check enrollment
  $(".enrollmentel").on("input", async function () {
    try {
      var response = await ajaxGetColumnData(
        "students",
        "enrollment",
        this.value,
        "student-loder"
      );
      if (response.trim() == "not match") {
        $(".stu-add-btn").attr("disabled", false);
        $(".enr-msg").html("");
      } else {
        $(".stu-add-btn").attr("disabled", true);
        $(".enr-msg").html("This Enrollment " + response.trim());
      }
    } catch (error) {
      console.log(error);
    }
  });

  // check email
  $(".email").on("input", async function () {
    try {
      var response = await ajaxGetColumnData(
        "students",
        "email",
        this.value,
        "student-loder"
      );
      if (response.trim() == "not match") {
        $(".stu-add-btn").attr("disabled", false);
        $(".email-msg").html("");
      } else {
        $(".stu-add-btn").attr("disabled", true);
        $(".email-msg").html("This Email " + response.trim());
      }
    } catch (error) {
      console.log(error);
    }
  });
}

/* end student regestration codding*/
// -------------------------------------------------------------------
//start student uplode docmrnt function

function creatDocmentFunc() {
  // check enrollment

  $("#stu-enrollment").on("input", async function () {
    try {
      var response = await ajaxGetColumnData(
        "students",
        "enrollment",
        this.value,
        "student-loder"
      );
      if (response.trim() != "not match") {
        $(".document-btn").removeClass("disabled");
        $(".enroll-doc-msg").html("");
      } else {
        $(".document-btn").addClass("disabled");
        $(".enroll-doc-msg").html("There Is No Enrollment");
      }
    } catch (error) {
      console.log(error);
    }
  });

  $(".document-form").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "php/uploade_document.php",
      data: new FormData(this),
      contentType: false,
      processData: false,
      cache: false,
      beforeSend: function () {
        $(".document-loder").removeClass("d-none");
      },
      success: function (response) {
        if (response.trim() == "success") {
          $(".document-form").get(0).reset();
          $(".document-loder").addClass("d-none");
          swal("Document Update", "SuccessFully", "warning");
        } else {
          swal(response.trim(), response.trim(), "warning");
        }
      },
    });
  });
}

// end student uplode document function
// -----------------------------------------------------------------------
// creat invoice function start
function creatInvoiceFunc() {
  let invoiceForm = document.querySelector(".invoice-form");
  let all_input = invoiceForm.querySelectorAll("input");
  let all_span = invoiceForm.querySelectorAll("span");
  $("#search-enrollment").on("input", async function () {
    try {
      var response = await ajaxEnrollmentData("students", this.value, "invoice-loder");
      if (response.trim() != "not match") {
        $(".invoice-msg").html("");
        $(".invoice-btn").removeClass("disabled");
        let data = JSON.parse(response.trim());
        all_input[1].value = data.enrollment;
        all_input[2].value = data.name;
        all_input[3].value = data.category;
        all_input[4].value = data.course;
        all_input[5].value = data.batch;
        all_span[1].innerHTML = data.fee;
        all_span[2].innerHTML = data.paid_fee;
        all_input[6].value = data.fee_time;
        var pending = data.fee - data.paid_fee;
        all_input[7].value = pending;

      } else {
        $(".invoice-msg").html("There Is No Enrollment !");
        $(".invoice-btn").addClass("disabled");
      }
    } catch (error) {
      console.log(error);
    }
  });
  var total = 0;
  var pending = 0;
  var p = Number(all_input[7].value);
  $(".recent-paid").on("input", function () {
    var paid = +all_span[2].innerHTML;
    var recent = Number(this.value);
    pending = recent - p;
    all_input[7].value = pending;
    total = paid + recent;

  })

  $(invoiceForm).submit(function (e) {
    e.preventDefault();
    var date = new Date();
    var dd = date.getDate();
    var mm = date.getMonth();
    var yy = date.getFullYear();
    dd = dd < 10 ? "0" + dd : dd;
    mm = mm < 10 ? "0" + mm : mm;
    var finalDate = dd + "-" + mm + "-" + yy;
    var formData = new FormData(this);
    formData.append("paid_fee", total);
    formData.append("pending", pending);
    formData.append("date", finalDate);
    $.ajax({
      type: "POST",
      url: "php/creat_invoice.php",
      data: formData,
      contentType: false,
      processData: false,
      cache: false,
      beforeSend: function () {
        $(".invoice-loder").removeClass("d-none");
      },
      success: function (response) {
        $(".invoice-loder").addClass("d-none");
        if (response.trim() == "success") {
          window.location = "php/invoice.php?enrollment=" + all_input[1].value + "&name=" + all_input[2].value + "&category=" + all_input[3].value + "&date=" + finalDate + "&course=" + all_input[4].value + "&batch=" + all_input[5].value + "&fee-time=" + all_input[6].value + "&paid-fee=" + total + "&pending=" + pending + "&recent=" + all_input[8].value;
          swal("Invoice Added", "Insert Data SuccessFully", "success");
        } else {
          swal(response.trim(), response.trim(), "warning");
        }
      }

    });
  })

}
// creat invoice function end

//start creat branding coding
function creatBrandFunc() {
  let brandForm = document.querySelector(".brand-form");
  let allinput = brandForm.querySelectorAll("input");
  let allTextArea = brandForm.querySelectorAll("textarea");
  let brandBtn = brandForm.querySelector("button");

  $(document).ready(function () {
    $(".brand-form").on("submit", function (e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "php/creat_brand.php",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
          $(".brand-loader").removeClass("d-none")
        },
        success: function (response) {
          $(".brand-loader").addClass("d-none")
          if (response.trim() == "success") {
            swal("Data Updated", "updated Successful", "success")
            getBrandDataFunc();
          } else {
            swal(response.trim(), response.trim(), "warning")
          }
        }
      })
    })
  });
  function getBrandDataFunc() {
    $.ajax({
      type: "POST",
      url: "php/get_brand.php",
      cache: false,
      beforeSend: function () {
        $(".brand-loader").removeClass("d-none")
      },
      success: function (reponse) {
        $(".brand-loader").addClass("d-none")
        if (reponse.trim() != "Theare Is No Data") {
          let data = JSON.parse(reponse.trim())

          allinput[0].value = data.brand_name;
          allinput[2].value = data.brand_domain;
          allinput[3].value = data.brand_email;
          allinput[4].value = data.brand_twitter;
          allinput[5].value = data.brand_facebook;
          allinput[6].value = data.brand_instagram;
          allinput[7].value = data.brand_whatsapp;
          allTextArea[0].value = data.brand_address;
          allinput[8].value = data.brand_mobile_1;
          allinput[9].value = data.brand_mobile_2;
          allTextArea[1].value = data.brand_about;
          allTextArea[2].value = data.brand_privacy;
          allTextArea[3].value = data.brand_cookie;
          allTextArea[4].value = data.brand_terms;
          var i;
          for (i = 0; i < allinput.length; i++) {
            allinput[i].disabled = true;

          }
          for (i = 0; i < allTextArea.length; i++) {
            allTextArea[i].disabled = true;

          }
          brandBtn.disabled = true;
          $(".brand-edit-btn").removeClass("d-none");

        } else {
          // first time jab brand name nahi ho ja tab inputs fields active hun gi
          $(".brand-edit-btn").addClass("d-none");
          for (i = 0; i < allinput.length; i++) {
            allinput[i].disabled = false;
          }
          for (i = 0; i < allTextArea.length; i++) {
            allTextArea[i].disabled = false;
          }
          brandBtn.disabled = false;

        }
      }
    })
  }
  getBrandDataFunc();
  $(".brand-edit-btn").click(function () {
    $(".brand-edit-btn").addClass("d-none");
    for (i = 0; i < allinput.length; i++) {
      allinput[i].disabled = false;
    }
    for (i = 0; i < allTextArea.length; i++) {
      allTextArea[i].disabled = false;
    }
    brandBtn.disabled = false;
  })
}

//end creat branding coding

//start creat attendness coding
function creatAttendanceFunc() {

  $("#att-category").on("change", async function () {
    var response = await ajaxGetAllCourse(
      "course",
      this.value,
      "attendance-loader"
    );
    if (response.trim() != "there is no data") {
      var all_course = JSON.parse(response.trim());
      $("#att-course").html(
        '<option value="choose course">Choose course</option>'
      );
      all_course.forEach((course) => {
        var option = `
       <option value="${course.name}">${course.name}</option>

       `;
        $("#att-course").append(option);
      });
    } else {
      $(".attendance-list").html('');
      $("#att-course").html(
        '<option value="choose course">Choose course</option>'
      );
      swal("Theare is no data", response.trim(), "warning");
    }
  });
  // get batch coding
  $("#att-course").on("change", async function () {
    var response = await ajaxGetAllBatch(
      "batch",
      $("#att-category").val(),
      this.value,
      "attendance-loader"
    );
    if (response.trim() != "there is no data") {
      var all_course = JSON.parse(response.trim());
      $("#att-batch").html(
        '<option value="choose batch">Choose Batch</option>'
      );
      all_course.forEach((batch) => {
        var option = `
       <option value="${batch.name} from ${batch.batch_from} to ${batch.batch_to}">${batch.name} from ${batch.batch_from} to ${batch.batch_to}</option>

       `;
        $("#att-batch").append(option);
      });
    } else {

      $("#att-batch").html(
        '<option value="choose batch">Choose Batch</option>'
      );
      swal("Theare is no data", response.trim(), "warning");
      $(".attendance-list").html('');
    }
  });
  var date = new Date();
  var dd = date.getDate();
  var mm = date.getMonth() + 1;
  var yy = date.getFullYear();
  dd = dd < 10 ? "0" + dd : dd;
  mm = mm < 10 ? "0" + mm : mm;
  var maxDate = mm + "-" + dd + "-" + yy;
  $(".date").attr("max", maxDate);
  // get students
  $("#att-batch").on("change", async function () {

    try {
      var response = await ajaxGetAllStudents("students", $("#att-category").val(), this.value, "attendance-loader");
      if (response.trim() != "there is no data") {
        $(".attendance-btn").attr("disabled", false);
        var students = JSON.parse(response.trim())
        $(".attendance-list").html('');
        students.forEach((data, index) => {
          var tr = `
    
    <tr>
    <td>${index + 1}</td>
    <td class="enrollment">${data.enrollment}</td>
    <td class="name">${data.name}</td>
    <td class="batch">${data.batch}</td>
    <td class=" attendance d-flex justify-content-between">
        <div>
            <input type="radio" name="absent-${index}" checked value="absent">
            <label">Absent</label>
        </div>
        <div>
            <input type="radio" name="absent-${index}"  value="present">
            <label>Present</label>
        </div>
    </td>
</tr>
    
    `;
          $(".attendance-list").append(tr);
        });

      } else {
        $(".attendance-btn").attr("disabled", false);
        $(".attendance-list").html('');
        swal(response.trim(), response.trim(), "warning")

      }


    } catch (error) {
      console.log(error)
    }
  });
  // submit attendness
  $(".attendance-btn").click(function (e) {
    e.preventDefault();
    var enrollment = [];
    var name = [];
    var batch = [];
    var attendance = [];
    if ($(".date").val() != "") {
      var allEnrollEl = document.querySelectorAll(".enrollment");
      var allnamelEl = document.querySelectorAll(".name");
      var allBatchEl = document.querySelectorAll(".batch");
      var allAttEl = document.querySelector(".attendance-list");
      var allinput = allAttEl.querySelectorAll("INPUT");
      
      var i;
      for (i = 0; i < allEnrollEl.length; i++) {
        enrollment[i] = allEnrollEl[i].innerHTML;
        name[i] = allnamelEl[i].innerHTML;
        batch[i] = allBatchEl[i].innerHTML;

      }
      for (i = 0; i < allinput.length; i++) {
        if (allinput[i].checked == true) {
          attendance[i] = allinput[i].value;
        }

      }
       attendance = $.grep(attendance, n => n == 0 || n);
       $.ajax({
        type : "POST",
        url : "php/create_attendance.php",
        data : {
          name : JSON.stringify(name),
          enrollment : JSON.stringify(enrollment),
          batch : JSON.stringify(batch),
          attendance : JSON.stringify(attendance)
        },
        cache : false,
        beforeSend : function(){
          $(".attendance-loader").removeClass("d-none");
        },
        success : function(response){
          $(".attendance-loader").addClass("d-none");
          console.log(response)
        }
       })
    } else {
      swal("Please Choose Date !", "select Date First", "warning");
    }

  })

}
//end creat attendness coding

// get ajaxcategory data
function ajaxGetAllData(table, loader) {
  return new Promise((resolve, reject) => {
    $.ajax({
      type: "POST",
      url: "php/get_data_by_table.php",
      data: {
        table: table,
      },
      beforeSend: function () {
        $("." + loader).removeClass("d-none");
      },
      success: function (response) {
        resolve(response);
      },
    });
  });
}
// delete category function
function ajaxDeleteBYid(id, table, loader) {
  return new Promise((resolve, reject) => {
    $.ajax({
      type: "POST",
      url: "php/delete_by_id.php",
      data: {
        id: id,
        table: table,
      },
      beforeSend: function () {
        $("." + loader).removeClass("d-none");
      },
      success: function (response) {
        $("." + loader).addClass("d-none");
        return resolve(response);
      },
    });
  });
}

// get all course function
function ajaxGetAllCourse(table, category, loader) {
  return new Promise((resolve, reject) => {
    $.ajax({
      type: "POST",
      url: "php/get_all_course.php",
      data: {
        table: table,
        category: category,
      },
      beforeSend: function () {
        $("." + loader).removeClass("d-none");
      },
      success: function (response) {
        $("." + loader).addClass("d-none");
        return resolve(response);
      },
    });
  });
}

// get all batch function
function ajaxGetAllBatch(table, category, course, loader) {
  return new Promise((resolve, reject) => {
    $.ajax({
      type: "POST",
      url: "php/get_all_batch.php",
      data: {
        table: table,
        category: category,
        course: course,
      },
      beforeSend: function () {
        $("." + loader).removeClass("d-none");
      },
      success: function (response) {
        $("." + loader).addClass("d-none");
        return resolve(response);
      },
    });
  });
}

// get all course fee function
function ajaxGetAllCourseFee(table, category, course, loader) {
  return new Promise((resolve, reject) => {
    $.ajax({
      type: "POST",
      url: "php/get_all_course_fee.php",
      data: {
        table: table,
        category: category,
        course: course,
      },
      beforeSend: function () {
        $("." + loader).removeClass("d-none");
      },
      success: function (response) {
        $("." + loader).addClass("d-none");
        return resolve(response);
      },
    });
  });
}

// get all student ajex request  function
function ajaxGetAllStudents(table, category, batch, loader) {
  return new Promise((resolve, reject) => {
    $.ajax({
      type: "POST",
      url: "php/get_all_student.php",
      data: {
        table: table,
        category: category,
        batch: batch,
      },
      beforeSend: function () {
        $("." + loader).removeClass("d-none");
      },
      success: function (response) {
        $("." + loader).addClass("d-none");
        return resolve(response);
      },
    });
  });
}
// enrollment check ajex request
function ajaxGetColumnData(table, column, data, loader) {
  return new Promise((resolve, reject) => {
    $.ajax({
      type: "POST",
      url: "php/get_column_data.php",
      data: {
        table: table,
        column: column,
        user_data: data,
      },
      beforeSend: function () {
        $("." + loader).removeClass("d-none");
      },
      success: function (response) {
        $("." + loader).addClass("d-none");
        return resolve(response);
      },
    });
  });
}
// enrollment check ajex request
/* get enrollment data indivisul */
function ajaxEnrollmentData(table, data, loader) {
  return new Promise((resolve, reject) => {
    $.ajax({
      type: "POST",
      url: "php/get_enrollment_data.php",
      data: {
        table: table,
        user_data: data,
      },
      beforeSend: function () {
        $("." + loader).removeClass("d-none");
      },
      success: function (response) {
        $("." + loader).addClass("d-none");
        return resolve(response);
      },
    });
  });
}


$(document).ready(function () {
    $("#addButton").attr("disabled", true);
    $("#inputStudentName").blur(validateStudentName);
    $("#inputPhone").blur(validatePhone);
    $("#inputCourseName").blur(validateCourseName);
    $("#capacityInput").blur(validateCapacity);
})

function validateStudentName() {
    if ($("#inputStudentName").val() == "") {
        $("#inputStudentName").attr('class', "form-control is-invalid").css("background-color", "#f8d7da");
        $("#errorHelp").attr('class', 'text-danger visible').html("You must enter name!");
        $("#addButton").attr("disabled", true);
      } else {
        $("#inputStudentName").attr('class', "form-control").css("background-color", "#FFF");
        $("#errorHelp").attr('class', 'text-success visible').html('Student name OK');
        $("#addButton").attr("disabled", false);
        checkAvailabilityStudent();
      }
    }

function validatePhone() {
    if ($.isNumeric($("#inputPhone").val())){
        $("#inputPhone").attr('class', "form-control").css("background-color", "#FFF");
        $("#errorHelp").attr('class', 'text-success visible').html("Phone number OK");
        $("#addButton").attr("disabled", false);
    } else {
        $("#inputPhone").attr('class', "form-control is-invalid").css("background-color", "#f8d7da");
        $("#errorHelp").attr('class', 'text-danger visible').html("Phone number is invalid");
        $("#addButton").attr("disabled", true);
    }
}

function checkAvailabilityStudent () {
        $("#loaderIcon").show();
        $.ajax({
          type: "POST",
          url: 'http://localhost/PHP_MySQL_Project/model/check_availability.php',
          data:'studentName='+ $("#inputStudentName").val(),
          success: function(result){
            if (result == '1') {
              $("#inputStudentName").attr('class', "form-control is-invalid").css("background-color", "#f8d7da");;
              $("#errorHelp").attr('class', 'text-danger visible').html('User name alerady taken!');
              $("#addButton").attr("disabled", true);
              $("#loaderIcon").hide();
              return false;
            } else {
              $("#inputStudentName").attr('class', "form-control is-valid").css("background-color", "#FFF");;;
              $("#errorHelp").attr('class', 'text-success visible').html('Student name OK');
              //$("#addButton").attr("disabled", false);
              $("#loaderIcon").hide();
              return true;
              }
            },
          error:function (){  
            }
        });
    }

function validateCourseName() {
    if ($("#inputCourseName").val() == "") {
        $("#inputCourseName").attr('class', "form-control is-invalid").css("background-color", "#f8d7da");
        $("#errorHelp").attr('class', 'text-danger visible').html("You must enter course name!");
        $("#addButton").attr("disabled", true);
      } else {
        $("#inputCourseName").attr('class', "form-control").css("background-color", "#FFF");
        $("#errorHelp").attr('class', 'text-success visible').html('Course name OK');
        $("#addButton").attr("disabled", false);
        validateCapacity();
      }
    }

function validateCapacity() {
    if ($('#capacityInput').val() <= 0) {
        $("#capacityInput").attr('class', "form-control is-invalid").css("background-color", "#f8d7da");
        $("#errorHelp").attr('class', 'text-danger visible').html("Capacity must be a positive number!");
        $("#addButton").attr("disabled", true);
    } else {
        $("#capacityInput").attr('class', "form-control ").css("background-color", "#FFF");
        $("#errorHelp").attr('class', 'text-success visible').html('Capacity OK');
        $("#addButton").attr("disabled", false);
    }
}


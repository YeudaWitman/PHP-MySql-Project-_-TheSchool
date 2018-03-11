$(document).ready(function () {
  $("#addButton").attr("disabled", true);
  $("#inputAdminName").blur(validateNameAdmin);
  $("#roleInput").blur(validateRole);
})

function validateNameAdmin() {
  if ($("#inputAdminName").val() == "") {
    $("#inputAdminName").attr('class', "form-control is-invalid").css("background-color", "#f8d7da");
    $("#errorHelpMsg").attr('class', 'text-danger visible').html("You must enter name!");
    $("#addButton").attr("disabled", true);
    return false;
  } else {
    $("#inputAdminName").attr('class', "form-control").css("background-color", "#FFF");
    $("#loaderIcon").show();
    checkAvailability();
  }
}

function checkAvailability() {
    $("#loaderIcon").show();
    $.ajax({
      type: "POST",
      url: 'http://localhost/PHP_MySQL_Project/model/check_availability.php',
      data:'adminName='+ $("#inputAdminName").val(),
      success: function(result){
        if (result == '1') {
          $("#inputAdminName").attr('class', "form-control is-invalid");
          $("#errorHelpMsg").attr('class', 'text-danger visible').html('User name alerady taken!');
          $("#addButton").attr("disabled", true);
          $("#loaderIcon").hide();
          return false;
        } else {
          $("#inputAdminName").attr('class', "form-control is-valid");
          $("#errorHelpMsg").attr('class', 'text-success visible').html('Admin name OK');
          //$("#addButton").attr("disabled", false);
          $("#loaderIcon").hide();
          return true;
          }
        },
      error:function (){  
        }
    });
  }

  function validateRole() {
    if ($("#roleInput").val() == null) {
      $("#roleInput").addClass("form-control is-invalid").css("background-color", "#f8d7da");
      $("#errorHelpMsg").attr('class', 'text-danger visible').html('You must select role');
      $("#addButton").attr("disabled", true);
      return false;
    } else if ($("#roleInput").val() !== null) {
      $("#roleInput").addClass("form-control is-valid").css("background-color", "#FFF");
      $("#errorHelpMsg").attr('class', 'text-success visible').html(' ');
      $("#addButton").attr("disabled", false);
      return true;
    }
  }
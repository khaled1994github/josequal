$(document).ready(function(){

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });
  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
  });

  //getcompany();
});

function getemployee(ele){

 var editID = $(ele).attr("data-id");
  $.ajax({
    type:'GET',
    url:'/get-employee/'+editID,
  }).done(function($resp){

      $('#fname-edit-employee').val($resp.first_name);
      $('#lname-edit-employee').val($resp.last_name);
      $('#email-edit-employee').val($resp.email);
      $('#phone-edit-employee').val($resp.phone);

      var url = '/employees/'+editID;
      $('#edit-form-id').attr('action', url);
      $('#editemployee').modal('show');


  });

}

function deleteemployee(ele){
  Swal.fire({
    title: 'Are you sure?',
    text: "You wante to delete this employee!!!",
    icon: 'warning',
    allowOutsideClick: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    var deleteID = $(ele).attr("data-id");
        $.ajax({
          type:'GET',
          url:'/delete-employee/'+deleteID,
        }).done(function($resp){

          Swal.fire({
             icon: 'success',
             text: 'employee deleted successfully.',
             allowOutsideClick: false
          }).then((result) => {

            window.location.reload(true);

          });

        });
  }
});


}

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

function getcompany(ele){

 var editID = $(ele).attr("data-id");
  $.ajax({
    type:'GET',
    url:'/get-company/'+editID,
  }).done(function($resp){

      $('#name-edit-company').val($resp.name);
      $('#email-edit-company').val($resp.email);
      $('#website-edit-company').val($resp.website);

      var url = '/companies/'+editID;
      $('#edit-form-id').attr('action', url);
      $('#editcompany').modal('show');


  });

}

function deletecompany(ele){
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
          url:'/delete-company/'+deleteID,
        }).done(function($resp){

          Swal.fire({
             icon: 'success',
             text: 'Company deleted successfully.',
             allowOutsideClick: false
          }).then((result) => {

            window.location.reload(true);

          });

        });
  }
});


}

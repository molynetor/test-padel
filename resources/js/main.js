
 $(".cerrarModal").click(function(){
    $("#modalDetalle").modal('hide')
  });


  $('.login_button').on('click',function(){
      console.log('hola')
    $('#registerModal').modal('hide');
    $('#loginModal').modal('show');
});
$('.register_button').on('click',function(){
    console.log('hola')
    $('#loginModal').modal('hide');
    $('#registerModal').modal('show');
}); 



var login_validator = $('#modal_login_form').validate({
    ignore:'.ingnore',
    errorClass: 'invalid',
    validClass:'success',
    rules:{
        email: {
            required:true,
            email:true,
        },
        password:{
            required: true,
            minlenght: 6,
            maxlength: 100
        },
        messages: {
            email:{
                required: "El email es obligatorio",
                email: "El emaill debe ser en formato ejemplo@mail.com",
            }
        },
        submitHandler: function (form){
            $.LoadingOverlay("show");
           //app.js form.submit();

           var formData = new FormData(form);
           $.ajax({
               url: baseUrl + "auth/ajax-login",
               type: "post",
               data: formData,
               cache: false,
               contentType: false,
               processData: false,
               success: function (data){

               },
               error: function(jqXHR, textStatus, errorThrown){

               }
           })
        }
    }
})
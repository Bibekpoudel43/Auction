$(function() {
    $('button.btn').on('click', function() {

        var isAtLestOneInputEmpty = false;


        // loop all elements inside form         
        $.each( $('#updateForm').children(), function( key, value ) {


            if(value.type !== undefined) {


                let elem = value;

                if(
                    elem === undefined 
                    || elem === null 
                    || elem.value.trim() === ''
                ) {

                    // change the flag because at least one field is empty 
                    // submission cannot continue
                    isAtLestOneInputEmpty = true;

                console.log(elem);


                    // highlight the input
                    elem.style.border = '1px solid red';
                } else {

                    // change color to green because the input is not empty
                    elem.style.border = '1px solid green';
                }
            }
        });

        if(!isAtLestOneInputEmpty) {

            $('form').submit();
        }
    });

    $("#Cpassword").keyup(function(){
        var current_pwd = $('#Cpassword').val();

        $.ajax({
            type: 'get',
            url: '/admin/checkPassword',
            data: {current_pwd:current_pwd},
            success:function(resp){
                if(resp == "false"){
                    $("#chkPwd").html("<p class='text-danger'>Current Password is Incorrect </p>");                    
                }
                else if(resp == "true")
                {
                    $("#chkPwd").html("<p class='text-success'>Current Password is Correct </p>");
                }
            },
            error:function(){

            }
    
        });
    });
    
})
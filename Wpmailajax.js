$('#askQuestion').validate({
      rules: {
      fname: {
      required: true,
      },
      lname: {
      required: true,
      },
      phone:{
        required: true,
      },
      email:{
        required: true,
        email:true,
      },
      message:{
        required: true,
      },
		  file_up: {
		   required: false,
	  }
      },
      messages: {},
      submitHandler: function (form) {
        // $captcha = $( '#recaptcha' );
        // response = grecaptcha.getResponse();
        // if (response.length === 0) {
        // if( !$captcha.hasClass( "error" ) ){
        // $captcha.addClass( "error" );
        // $( '.msg-error').text( "Captcha is required" );
        // }
        // } else {
        //$captcha.removeClass( "error" );
          var formData = new FormData(form);
       
        $( '.msg-error').text('');
        $('.loading_image').show();
        $.ajax({
        type: "POST",
        url: ajax_url,
        data:formData,
//         dataType:'json',
			 processData: false,
    contentType: false,
        success: function (data) {
          console.log(data);
          if(data.message == 'error'){
            $('.loading_image').hide();
            $('.alert-success').hide();
            $('.alert-danger').show();
            setTimeout(function(){
            $('.alert-danger').hide();
            }, 3000);
          }else{
            $('.loading_image').hide();
            $('#askQuestion')[0].reset();
            $('.alert-danger').hide();
            $('.alert-success').show();
            setTimeout(function(){
            $('.alert-success').hide();
            }, 3000);
           // window.location.href = site_url+'/thank-you';
          }
        }
        });
      //}
      }
      });

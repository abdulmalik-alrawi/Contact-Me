/* global , alert, consol */

$(function(){
	'use strict';

	var userErrors = true;

	var	emailError = true;

	var	msgError   =true;


	

	
	$('.username').blur(function(){
		

		if ($(this).val().length < 4 ) {
			$(this).css('border','1px solid #f00');

			$(this).parent().find('.custom-alert').fadeIn(300);
					$(this).parent().find('.astrex').fadeOut(300);
					$(this).parent().find('.left').css('color','#f00').fadeIn(300);

					userErrors = true;
			

		}else{
			$(this).css('border','1px solid #080');
			$(this).parent().find('.custom-alert').fadeOut(300);
			$(this).parent().find('.astrex').fadeOut(300);
			$(this).parent().find('.right').css('color','#080').fadeIn(300);
			$(this).parent().find('.left').fadeOut(300);		

			userErrors = false;
		}
		
	});

	
		$('.email').blur(function(){
		if ($(this).val()== '' ) {
			$(this).css('border','1px solid #f00');

			$(this).parent().find('.custom-alert').fadeIn(300).end().find('.astrex').fadeOut(300);
					//$(this).parent();
					$(this).parent().find('.left').css('color','#f00').fadeIn(300);

					emailError = true;
			

		}else{
			$(this).css('border','1px solid #080');
			$(this).parent().find('.custom-alert').fadeOut(300).end().find('.astrex').fadeOut(300);
			//$(this).parent();
			$(this).parent().find('.left').fadeOut(200);		
			$(this).parent().find('.right').css('color','#080').fadeIn(300);
			
			emailError = false;
		}
		


	});

		
		$('.message').blur(function(){
		if ($(this).val().length < 10 ) {
			$(this).css('border','1px solid #f00');

			$(this).parent().find('.custom-alert').fadeIn(300).end().find('.astrex').fadeOut(300);
					//$(this).parent();
					$(this).parent().find('.left').css('color','#f00').fadeIn(300);

					msgError = true;
			

		}else{
			$(this).css('border','1px solid #080');
			$(this).parent().find('.custom-alert').fadeOut(300).end().find('.astrex').fadeOut(300);;
			//$(this).parent()
			$(this).parent().find('.right').css('color','#080').fadeIn(300);	
			$(this).parent().find('.left').fadeOut(300);	

			msgError = false;
		}
		


	});
		  // submit Form Validate

      $('.contact-form').submit(function(e){
      	if (userErrors === true || emailError === true || msgError === true){

      		e.preventDefault();
      		$('.username, .email, .message').blur();
      	

      	}

      	
      });


	});	


//Hide placeholder on form 	
$('[placeholder]').focus(function(){
	
	$(this).attr('data-text', $(this).attr('placeholder'));
	$(this).attr('placeholder','');
      }).blur(function(){
	
	$(this).attr('placeholder',$(this).attr('data-text'));
	
});	

    
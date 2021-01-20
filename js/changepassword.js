$( document ).ready(function() {	
	$('.signup-confirmpassword').on('blur keyup', function(){
		if(this.value != $('.signup-password').val() ){
		   $(this).css('border','2px solid red');
		   $(".confirmpassword_reminder").html("<i class='fa fa-times'></i> Make sure you enter the same password as above");
		}
		else if(this.value == $('.signup-password').val() ){
			$(this).css('border','2px solid green');
			$(".confirmpassword_reminder").html("<i class='fa fa-check'></i> Both passwords are the same"); 
		}
		else if(this.value.length ==0){
			$(this).css('border','1px solid #ccc');
			$(".confirmpassword_reminder").html("Enter the same password as above"); 
		}
	});
});

function checkpassword(ev){
	if($('.signup-confirmpassword').val()!= $('.signup-password').val() ){
		$('.signup-confirmpassword').css('border','2px solid red');
		$(".confirmpassword_reminder").html("<i class='fa fa-times'></i> Make sure you enter the same password as above");
		$('.signup-confirmpassword').focus();
		ev.preventDefault();
		return false;
	}
}
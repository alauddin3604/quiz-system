$( document ).ready(function() {

	$('.signup-username').on('blur keyup', function(){
		if(this.value.length < 12&&this.value.length > 0){
		   $(this).css('border','2px solid red');
		   $(".username_reminder").html("<i class='fa fa-times'></i> Minimum 12 characters for username");
		}
		else if(this.value.length >= 12){
			$(this).css('border','2px solid green');
			$(".username_reminder").html("<i class='fa fa-check'></i> Minimum 12 characters for username"); 
		}
		else if(this.value.length ==0){
			$(this).css('border','1px solid #ccc');
			$(".username_reminder").html("Username must be 12 characters or above"); 
		}
	});
	
	$('.signup-password').on('blur keyup', function(){
		if(this.value.length < 12&&this.value.length > 0){
		   $(this).css('border','2px solid red');
		   $(".password_reminder").html("<i class='fa fa-times'></i> Minimum 12 characters for password");
		}
		else if(this.value.length >= 12){
			$(this).css('border','2px solid green');
			$(".password_reminder").html("<i class='fa fa-check'></i> Minimum 12 characters for password"); 
		}
		else if(this.value.length ==0){
			$(this).css('border','1px solid #ccc');
			$(".password_reminder").html("Password must be 12 characters or above"); 
		}
	});
	
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
	
	$('.signup-address').on('blur keyup', function(){
		if(this.value.length < 12&&this.value.length > 0){
		   $(this).css('border','2px solid red');
		   $(".address_reminder").html("<i class='fa fa-times'></i> Enter a valid address");
		}
		else if(this.value.length >= 12){
			$(this).css('border','2px solid green');
			$(".address_reminder").html("<i class='fa fa-check'></i> Valid address"); 
		}
		else if(this.value.length ==0){
			$(this).css('border','1px solid #ccc');
			$(".address_reminder").html("Please enter a valid address"); 
		}
	});
	
	$('.signup-email').on('blur keyup', function(){
		var email = $(".signup-email").val();
		if (validateEmail(email)){
			$(this).css('border','2px solid green');
		    $(".email_reminder").html("<i class='fa fa-check'></i> Valid email address");  
		}
		else if(this.value.length ==0){
			$(this).css('border','1px solid #ccc');
			$(".email_reminder").html("Please enter a valid address"); 
		}
		else {
			$(this).css('border','2px solid red');
		    $(".email_reminder").html("<i class='fa fa-times'></i> This email isn't validate");
		}
	});
	
	$('.signup-contactno').on('blur keyup', function(){
		var number1 = $(".signup-contactno").val();
		var number2 = $(".signup-contactno").val();
		if (validateNumber1(number1)|| validateNumber2(number2)){
			$(this).css('border','2px solid green');
		    $(".contactno_reminder").html("<i class='fa fa-check'></i> Valid contact number");  
		}
		else if(this.value.length ==0){
			$(this).css('border','1px solid #ccc');
			$(".contactno_reminder").html("Please enter a valid contact number"); 
		}
		else {
			$(this).css('border','2px solid red');
		    $(".contactno_reminder").html("<i class='fa fa-times'></i> This contact number isn't validate");
		}
	});

	function validateEmail(email) 
	{
	  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  return re.test(email);
	}
	
	function validateNumber1(number1) 
	{
	  var re = /^\(?([0-9]{3})\)?[-. ]?([0-9]{7})$/;
	  return re.test(number1);
	}
	
	function validateNumber2(number2) 
	{
	  var re = /^\(?([0-9]{3})\)?[-. ]?([0-9]{8})$/;
	  return re.test(number2);
	}
	
	// Get the modal login form
	var modal = document.getElementById('loginform');

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			closeform();
		}
	}
});

function closeform(){
	$('#loginform').css('display','none');
}

function showform(){
	$('#loginform').css('display','block');
}

function switchtab(target){
	$('.username').val('');
	$('.password').val('');
	
	if (target=='toadmin'){
		$('.admintab').show();
		$('.usertab').hide();
	}
	else{
		$('.usertab').show();
		$('.admintab').hide();
	}
}


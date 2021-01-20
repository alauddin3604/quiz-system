function closeform(){
	$('#loginform').css('display','none');
	//console.log('das');
}

function showform(){
	
	
	$('#loginform').css('display','block');
	//$('#loginform').css('display','block');
}

$( document ).ready(function() {
	// Get the modal login form
	var modal = document.getElementById('loginform');

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			closeform();
		}
	}
});

function validation(ev){
	ev.preventDefault();
	
}
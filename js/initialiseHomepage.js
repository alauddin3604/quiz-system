function closeform(){
	$('#loginform').css('display','none');
}

function showform(){
	$('#loginform').css('display','block');
	$('.admintab').hide();
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
	
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
		if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
			$("#gototop").css('display','block')
		} else {
			$("#gototop").css('display','none')
		}
	}
	
	showSlides();
	
});

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

function scrollpage(target){
	document.getElementById(target).scrollIntoView({ behavior: 'smooth'});
}


//slideshow
var slideIndex = 0;
var slides = document.getElementsByClassName("mySlides");
var timer = null;


$(".slideshow-container").mouseenter(function(){
    stopSlide();
});

$(".slideshow-container").mouseleave(function(){
    timer=setTimeout(showSlides,1000);
});

function showSlides() {    
    var i;    
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1} 
    slides[slideIndex-1].style.display = "block"; 
    timer=setTimeout(showSlides, 5000); // Change image every 5 seconds
}

function currentSlide(no) {
    
	var i;    
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slideIndex = no;
    slides[no-1].style.display = "block";
	clearTimeout(timer);
	timer=setTimeout(showSlides, 5000);
}

function plusSlides(n) {
  var newslideIndex = slideIndex + n;
  if(newslideIndex < 4 && newslideIndex > 0){
     currentSlide(newslideIndex);
  }
}

function stopSlide() {
    clearTimeout(timer);
}
//end slideshow

//highlight tab
$(document).ready(function() {
    $(document).on("scroll", onScroll);

	function onScroll(event){
		var scrollPos = $(document).scrollTop();
		$('.scroll').each(function () {
			var currLink = $(this);
			var refElement = $(currLink.attr("href"));
			console.log($(this));
			
			if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
				//console.log(refElement.position().top);
				
            $('.menutab > a').removeClass("active");
            currLink.addClass("active");
			}
			else{
				currLink.removeClass("active");
			}
		});
    }
})
//end highlight tab

$(function($) {
  
    // The speed of the scroll in milliseconds
    const speed = 1000;
  
    // Find links that are #anchors and scroll to them
    /*$('a[href^="#"]')
      .not('.lp-pom-form .lp-pom-button')
      .unbind('click.smoothScroll')
      .bind('click.smoothScroll', function(event) {
        event.preventDefault();
        const href = $(this).attr('href').split('#');
        $('html, body').animate({ scrollTop: $(`#${href[1]}`).offset().top }, speed);
      });*/
  });
  

function sort(condition){
	
		if (condition!=0){//console.log(condition);
			window.location.href =('homepage.php?categoryid='+categoryid+'&sortby='+condition+'&#producttable');
		}else{
			window.location.href =('homepage.php?categoryid='+categoryid+'&sortby='+$('#price_sorting').val()+'&#producttable');
		}	
	
}
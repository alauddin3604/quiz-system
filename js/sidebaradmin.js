$(document).ready( function () {
    t = $('.dataTable').DataTable();
	if (localStorage.getItem("sidebaropen") === null) { 
		
	}//means didnt click sidebar icon
	else if (localStorage.getItem("sidebaropen") !== null) { //means user has click sidebar icon but dont know wan open or close
		var checksidebar = localStorage.getItem("sidebaropen");
		if (checksidebar=='true'){
			//force open nav bar
			$('.sidenav,.sidenav a,.page-header,.page-content').addClass('notransition');
			openNav();
			$('.sidenav,.sidenav a,.page-header,.page-content').removeClass('notransition');
		}
		else {
			$('.sidenav,.sidenav a,.page-header,.page-content').addClass('notransition');
			closeNav();
			setTimeout(function(){ $('.sidenav,.sidenav a,.page-header,.page-content').removeClass('notransition'); }, 1100);
			
			//do nothing because original code is close nav bar
		}
	}
});

function openNav() {
	document.getElementById("mySidenav").style.width = "250px";
	$(".page-header").css('margin-left','250px');
	$(".page-content").css('margin-left','250px');
	//$('.menuicon').css('top','15px'); 
	//$('.navarrow').hide();
	//$('.navmenu').show();
	$('.menuicon').html("<i class='fa fa-bars navmenu' aria-hidden='true'></i>");
	$('.menuicon').attr("onclick","closeNav()");
	$('#orderlist').html("<i class='fa fa-dashboard' aria-hidden='true'></i> Manage Quiz");
	$('#menusetting').html("<i class='fa fa-list-alt' aria-hidden='true'></i> Quiz Result");
	$('#promotionmenusetting').html("<i class='fa fa-history' aria-hidden='true'></i> My Participated Quiz ");
	$('#latestmenusetting').html("<i class='fa fa-sign-out' aria-hidden='true'></i>Logout");
	$('#orderlist >i').css("margin-right","10px");
	$('#menusetting >i').css("margin-right","10px");
	$('#promotionmenusetting >i').css("margin-right","10px");
	$('#latestmenusetting >i').css("margin-right","10px");
	localStorage.setItem("sidebaropen", true);
}

function closeNav() {
	document.getElementById("mySidenav").style.width = "50px";
	$(".page-content").css('margin-left','50px');
	$(".page-header").css('margin-left','50px');
	//$('.menuicon').css('top','9px'); 
	//$('.navarrow').show();
	//$('.navmenu').hide();
	$('.menuicon').html("<i class='fa fa-chevron-right navmenu' aria-hidden='true'></i>");
	$('.menuicon').attr("onclick","openNav()");
	$('#orderlist').html("<i class='fa fa-dashboard' aria-hidden='true'></i>");
	$('#menusetting').html("<i class='fa fa-list-alt' aria-hidden='true'></i>");
	$('#promotionmenusetting').html("<i class='fa fa-history' aria-hidden='true'></i>");
	$('#latestmenusetting').html("<i class='fa fa-sign-out' aria-hidden='true'></i>");
	localStorage.setItem("sidebaropen", false);
}
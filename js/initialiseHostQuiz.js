var playerorder=" score DESC";
var getleaderboard="no";
var firsttime=1;    
var sec = 4;
var correct=0;
var question;
var answer;
var option_A;
var option_B;
var option_C;
var option_D;
var cq=0;
var tq=0;
var quiz_status=0;
var magniused=0;
var current_use=0;
var score_array=[];
$(document).click();
$( document ).ready(function() {
	if (guestmode=='no'){
		$('.guest_container').transition({ opacity: 0 });
		$('.guest_container').hide();
		$('.spinner_container').transition({ opacity: 1 });
		$('.spinner_container').show();
	}
	var refreshleaderboard = setInterval(function() {
		if (getleaderboard=="yes"){
		$.ajax({
			type: "POST",
			dataType: "json",
			url: 'joinquiz_query.php',
			data: {quiz_host_id: quiz_host_id, action: 'getleaderboard', orderby:playerorder},
			success: function(response){
				//$('#thingy').transition({ opacity: 0 });
				//console.log(response[0]);
				//console.log(response);
				let theExport = "";
				var counter=0;
				playerorder = response[2];
				if (firsttime==1){
					while (counter<response[3].length){
						theExport += '<tr><td>' + response[3][counter] + '</td><td>' + response[0][counter] + "</td><td><div id='Progress_Status' class='Progress_Status_"+counter+"'> <div id='myprogressBar' class='myprogressBar_"+counter+"'></div> </div></td><td>"+ response[1][counter] +"</td></tr>";
						
						score_array.push(response[1][counter]);
						progress(counter,response[1][counter]);
						counter++;
						//console.log(score_array);
					}
					firsttime=2;
					document.getElementById("thingy").innerHTML = theExport;
					
				}else{
					$(".leaderboard tbody tr").each(function() {
						//$(this).children('td').slice(0, 2).addClass("black");
						$(this).children('td:nth-child(4)').html(response[1][counter]+"/"+tq);
						$(this).children('td:nth-child(1)').html(response[3][counter]);
						//console.log(counter);
						//console.log(response[1][counter]);
						progress(counter,response[1][counter]);
						counter++;
						//$('#rankingtext').html("You currently place "+response[3][response[4]]+" in the ranking.");
						//$(".leaderboard tbody tr td:nth-child(2)").html(response[1][counter]);
					});
					$('#rankingtext').html("You currently place "+response[3][response[4]]+" in the ranking.");
				}
				//document.getElementById("thingy").innerHTML = theExport;
				//console.log("success");
				//$('#thingy').transition({ opacity: 1 , delay: 1000 });
				//clearInterval(refreshleaderboard);
				
			},
			error: function (xhr) {
				console.log(JSON.stringify(xhr));
			}
		});
		}
	}, 3000);
	
	var checkstart = setInterval(function() {
		$.ajax({
			type: "POST",
			dataType: "json",
			url: 'joinquiz_query.php',
			data: {quiz_pin: quiz_pin, action: 'startquiz'},
			success: function(response){
				//clearInterval(checkstart);
				
				if (response==2){
					clearInterval(checkstart);
					getleaderboard='yes';
					startcountdown();
				}
			},
			error: function (xhr) {
				console.log(JSON.stringify(xhr));
			}
		});
	}, 1000);
	
	
	var checkend = setInterval(function() {
		$.ajax({
			type: "POST",
			dataType: "json",
			url: 'joinquiz_query.php',
			data: {quiz_pin: quiz_pin, action: 'endquiz'},
			success: function(response){
				//clearInterval(checkstart);
				
				if (response==3){
					clearInterval(checkend);
					alert('The quiz is now ended!');
					window.location.href='../homepage.php';
				}
			},
			error: function (xhr) {
				console.log(JSON.stringify(xhr));
			}
		});
	}, 1000);
	getquestion();
	//startcountdown();
	//setTimeout(function(){ startcountdown(); }, 3000);
	
	$('.hover_bkgr_fricc').click(function(){
        $('.hover_bkgr_fricc').hide();
    });
    $('.popupCloseButton').click(function(){
        $('.hover_bkgr_fricc').hide();
    });
});

function startcountdown(){
	$('.spinner_container').transition({ opacity: 0 });
	setTimeout(function(){ 
		$('.spinner_container').hide();
		$('.countdown_container').show();
		$('.countdown_container').transition({ opacity: 1 });
		
		var timer = setInterval(function() {
			document.getElementById("countdown").play();
			
			$('#hideMsg #countdown').css('opacity','1');
			$('#hideMsg #countdown').toggleClass('animate');
			//console.log(sec-1);
			if(sec-1==2){
				$('#hideMsg #countdown').css('background-color','yellow');
			}else if (sec-1==1){
				$('#hideMsg #countdown').css('background-color','green');
			}else if (sec-1==0){
				$('#hideMsg #countdown').css('background-color','green');
			}
			$('#hideMsg #countdown').text(--sec);
			setTimeout(function(){ $('#hideMsg #countdown').toggleClass('animate'); }, 500);
			if (sec == 0) {
				
				$('#hideMsg #countdown').text('GO');
				setTimeout(function(){
					document.getElementById("countdown").pause();
					$('#hideMsg #countdown').transition({ scale: 0 });
					$('.countdown_container').hide();
				//$('#countdown').transition({ opacity: 0 });;
					clearInterval(timer);
					$('.questiondiv_container').transition({ opacity: 1 });
					$('.questiondiv_container').show();
				}, 1000);
				
			}
		}, 1000);
	}, 1000);
}

function checkanswer(selected){
	var choices=['A','B','C','D']
	$('#option_A').removeAttr('onclick');
	$('#option_B').removeAttr('onclick');
	$('#option_C').removeAttr('onclick');
	$('#option_D').removeAttr('onclick');
	$('.optioncolumn').css( 'cursor', 'default');
	if (choices[0]=='A'&&answer[cq]=='A'){
		$('#option_A').html("<i class='fa fa-check' aria-hidden='true'></i>&nbsp;&nbsp;"+option_A[cq]);
	}else if(choices[0]=='A'){
		$('#option_A').html("<i class='fa fa-times' aria-hidden='true'></i>&nbsp;&nbsp;"+option_A[cq]);
	}
	if (choices[1]=='B'&&answer[cq]=='B'){
		$('#option_B').html("<i class='fa fa-check' aria-hidden='true'></i>&nbsp;&nbsp;"+option_B[cq]);
	}else if(choices[1]=='B'){
		$('#option_B').html("<i class='fa fa-times' aria-hidden='true'></i>&nbsp;&nbsp;"+option_B[cq]);
	}
	
	if (choices[2]=='C'&&answer[cq]=='C'){
		$('#option_C').html("<i class='fa fa-check' aria-hidden='true'></i>&nbsp;&nbsp;"+option_C[cq]);
	}else if(choices[2]=='C'){
		$('#option_C').html("<i class='fa fa-times' aria-hidden='true'></i>&nbsp;&nbsp;"+option_C[cq]);
	}
	
	if (choices[3]=='D'&&answer[cq]=='D'){
		$('#option_D').html("<i class='fa fa-check' aria-hidden='true'></i>&nbsp;&nbsp;"+option_D[cq]);
	}else if(choices[3]=='D'){
		$('#option_D').html("<i class='fa fa-times' aria-hidden='true'></i>&nbsp;&nbsp;"+option_D[cq]);
	}
	
	if (selected==answer[cq]){
		correct++;
		$('.optioncolumn').css('background-color','#ff0000');
		$('#option_'+answer[cq]).css('background-color','#74E13D');
		document.getElementById("correct").play();
		//document.getElementById("correct").addEventListener("ended", gonext);
		setTimeout(function(){ gonext(); }, 3000);
	}else{
		$('.optioncolumn').css('background-color','#ff0000');
		$('#option_'+answer[cq]).css('background-color','lightgreen');
		document.getElementById("incorrect").play();
		//document.getElementById("incorrect").addEventListener("ended", gonext);
		setTimeout(function(){ gonext(); }, 3000);
	}
	cq++;
	$('#answerstatus').html(cq+'/'+tq);
	if (cq==tq){
		quiz_status=1;
	}
	$.ajax({
			type: "POST",
			dataType: "json",
			url: 'joinquiz_query.php',
			data: {quiz_host_id: quiz_host_id, action: 'updateresult', correct:correct,quiz_status:quiz_status},
			success: function(response){
				
				
				
			},
			error: function (xhr) {
				console.log(JSON.stringify(xhr));
			}
		});
}

function gonext(){
	current_use=0;
	if (cq!=tq){
		$('.questiondiv_container').transition({ scale: 0 });
		setTimeout(function(){
			if (magniused!=0){
				$('.optioncolumn').css( 'opacity', '1');
				$('.optioncolumn').css( 'cursor', 'pointer');
				$('#option_'+target).attr('onclick',onclickevent);
				//magniused++;
				console.log('das')
			}
			$('#option_A').attr('onclick',"checkanswer('A')");
			$('#option_B').attr('onclick',"checkanswer('B')");
			$('#option_C').attr('onclick',"checkanswer('C')");
			$('#option_D').attr('onclick',"checkanswer('D')");
			$('.optioncolumn').css( 'cursor', 'pointer');
			
			$('.questioncolumn').html(question[cq]);
			$('#option_A').css('background-color','#EF6950');
			$('#option_B').css('background-color','#40C5AF');
			$('#option_C').css('background-color','#409AE1');
			$('#option_D').css('background-color','#FFC83D');
			$('#option_A').html("<i class='fa fa-square' aria-hidden='true'></i>&nbsp;&nbsp;"+option_A[cq]);
			$('#option_B').html("<i class='fa fa-circle' aria-hidden='true'></i>&nbsp;&nbsp;"+option_B[cq]);
			$('#option_C').html("<i class='fa fa-caret-up' aria-hidden='true'></i>&nbsp;&nbsp;"+option_C[cq]);
			$('#option_D').html("<i class='fa fa-square' id ='diamond' aria-hidden='true'></i>&nbsp;&nbsp;"+option_D[cq]);
		}, 1000);
		$('.questiondiv_container').transition({ scale: 1 , delay: 2000 });
		
	}else{
		$('.questiondiv_container').transition({ opacity: 0 });
		$('.questiondiv_container').hide();
		$('#leaderboardtext').html("You answer "+correct+" out of "+tq+" question correctly.");
		$('#correctinfo').html(correct+" correct.");
		$('#wrongwronginfo').html(tq-correct+" wrong.");
		$('.leaderboarddiv_container').transition({ opacity: 1 });
		$('.leaderboarddiv_container').show();
		$('.leaderboard').isortope();
		$('#leaderboard > thead > tr > th').click();
		$('#leaderboard > thead > tr > th.sortAsc').click();
		progress();
		$('.sort-arrow').hide();
	}
}

function getquestion(){
	$.ajax({
			type: "POST",
			dataType: "json",
			url: 'joinquiz_query.php',
			data: {quiz_id: quiz_id, action: 'getquestion', },
			success: function(response){
				//$('#thingy').transition({ opacity: 0 });
				//console.log(response);
				question=response[0].slice(0);
				answer=response[1].slice(0);
				option_A=response[2].slice(0);
				option_B=response[3].slice(0);
				option_C=response[4].slice(0);
				option_D=response[5].slice(0);
				tq=response[0].length;
				$('#answerstatus').html('0/'+tq);
				$('#questioncolumn').html(question[cq]);
				$('#option_A').html("<i class='fa fa-square' aria-hidden='true'></i>&nbsp;&nbsp;"+option_A[cq]);
				$('#option_B').html("<i class='fa fa-circle' aria-hidden='true'></i>&nbsp;&nbsp;"+option_B[cq]);
				$('#option_C').html("<i class='fa fa-caret-up' aria-hidden='true'></i>&nbsp;&nbsp;"+option_C[cq]);
				$('#option_D').html("<i class='fa fa-square'  id ='diamond' aria-hidden='true'></i>&nbsp;&nbsp;"+option_D[cq]);
				
			},
			error: function (xhr) {
				console.log(JSON.stringify(xhr));
			}
		})
		
}

function magni(){
	if (current_use==1){
		$('.popup_icon').html("<i style='color:red;' class='fa fa-exclamation-circle' aria-hidden='true'></i>");
		$('.popup_text').html("You can only use this function 1 time on each question. Good luck!");
		$('.hover_bkgr_fricc').show();
		return false;
	}
	var choices=['A','B','C','D'];
	var index = choices.indexOf(answer[cq]);
	if (index !== -1) {
		choices.splice(index, 1);
	}
	choices=shuffle(choices);
	onclickevent = $('#option_'+choices[0]).attr('onclick');
	$('#option_'+choices[0]).removeAttr('onclick');
	target=choices[0];
	magniused++;
	$('#magni'+magniused).hide();
	$('#option_'+choices[0]).transition({ opacity: 0.1});
	$('#option_'+choices[0]).css('cursor','default');
	$('#option_'+choices[0]).css('user-action','none');
	$('#option_'+choices[0]).css('pointer','none');
	current_use=1;
}

function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}

function showmagni(){
	$('.popup_icon').html("What is this?<br><i class='fa fa-search' aria-hidden='true'></i>");
	$('.popup_text').html("You can use magnifying glass to eliminate 1 wrong option. You can use them 3 times throughout this quiz but only 1 time per question. Good luck!");
	$('.hover_bkgr_fricc').show();
	$('.hover_bkgr_fricc').show();
}


function progress(target,score) { 
	//console.log("target  "+target);
	//console.log(score);
	//target=target-1;
	var length=score/tq*100;
	
	var width = score_array[target]; 
	score_array[target]=length;
	var identity = setInterval(scene, 10); 
	function scene() { 
		if (width >= length) { 
			clearInterval(identity); 
		} else { 
			width++;  
			$(".myprogressBar_"+target).css("width" , width+'%');  
			$(".myprogressBar_"+target).html( width * 1  + '%');
		} 
  }
} 

function setname(ev){
	ev.preventDefault();
	$.ajax({
		type: "POST",
		//dataType: "json",
		url: 'joinquiz_query.php',
		data: {quiz_host_id: quiz_host_id,quiz_id: quiz_id,username: $('#username').val(), action: 'setname'},
		success: function(response){
			$('.guest_container').transition({ opacity: 0 });
			$('.guest_container').hide();
			$('.spinner_container').transition({ opacity: 1 });
			$('.spinner_container').show();
			$("#usernamebox").html("Welcome "+$('#username').val());
			$("#username_spinner").html($('#username').val());
		},
		error: function (xhr) {
			console.log(JSON.stringify(xhr));
		}
	});
}
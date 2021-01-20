var playerorder=" score DESC";
var getleaderboard="no";
var firsttime=1;
var score_array=[];

$(document).click();
$( document ).ready(function() {
	
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
						theExport += '<tr><td>' + response[3][counter] + '</td><td>' + response[0][counter] + "</td><td><div id='Progress_Status' class='Progress_Status_"+counter+"'> <div id='myprogressBar' class='myprogressBar_"+counter+"'></div> </div></td><td>"+ response[1][counter] +"/"+tq+"</td></tr>";
						
						score_array.push(response[1][counter]);
						progress(counter,response[1][counter]);
						counter++;
						//console.log(score_array);
					}
					firsttime=2;
					document.getElementById("thingy2").innerHTML = theExport;
					$('.leaderboard').isortope();
					setTimeout(function(){
						$('#leaderboard > thead > tr > th').click();
						$('#leaderboard > thead > tr > th.sortAsc').click();
						//progress();
						$('.sort-arrow').hide();
					 }, 1000);
					//$('#leaderboard > thead > tr > th').click();
					//$('#leaderboard > thead > tr > th.sortAsc').click();
					//progress();
					//$('.sort-arrow').hide();
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
					//$('#rankingtext').html("You currently place "+response[3][response[4]]+" in the ranking.");
				}
				//document.getElementById("thingy2").innerHTML = theExport;
				//console.log("success");
				//$('#thingy2').transition({ opacity: 1 , delay: 1000 });
				//clearInterval(refreshleaderboard);
				$("#totaltext").html("Total participant : "+response[6]);
				$("#incompletetext").html(response[5]+" of them has not completed the quiz");
				$("#completetext").html(response[4]+" of them has completed the quiz");
				
			},
			error: function (xhr) {
				console.log(JSON.stringify(xhr));
			}
		});
		}
	}, 3000);
	
	
	var getparticipantlist = setInterval(function() {
		
		$.ajax({
			type: "POST",
			dataType: "json",
			url: 'joinquiz_query.php',
			data: {quiz_host_id: quiz_host_id, action: 'getparticipantlist'},
			success: function(response){
				
				let theExport = "";
				var counter=0;
				//playerorder = response[2];
				var trcount=(response[0].length)/5;
				
					while (counter<trcount+1){
						if (response[0][counter]!=undefined){
							var name1="<td>"+response[0][counter]+"</td>";
						}else{
							var name1="";
						}
						if (response[0][counter+1]!=undefined){
							var name2="<td>"+response[0][counter+1]+"</td>";
						}else{
							var name2="";
						}
						if (response[0][counter+2]!=undefined){
							var name3="<td>"+response[0][counter+2]+"</td>";
						}else{
							var name3="";
						}
						if (response[0][counter+3]!=undefined){
							var name4="<td>"+response[0][counter+3]+"</td>";
						}else{
							var name4="";
						}
						if (response[0][counter+4]!=undefined){
							var name5="<td>"+response[0][counter+4]+"</td>";
						}else{
							var name5="";
						}
						theExport += '<tr>' + name1 + '' + name2 + ""+ name3 +""+ name4 +""+ name5 +"</tr>";
						counter+=4;
						
					}
					
					document.getElementById("thingy").innerHTML = theExport;
					
				
				
				//clearInterval(getparticipantlist);
				
			},
			error: function (xhr) {
				console.log(JSON.stringify(xhr));
			}
		});
	}, 3000);
	
	$('.hover_bkgr_fricc').click(function(){
        $('.hover_bkgr_fricc').hide();
    });
    $('.popupCloseButton').click(function(){
        $('.hover_bkgr_fricc').hide();
    });
});

function start(ev){
	
	ev.preventDefault();
	$("#backbutton").hide();
	$.ajax({
		type: "POST",
		dataType: "json",
		url: 'joinquiz_query.php',
		data: {quiz_host_id: quiz_host_id, action: 'startquiz'},
		success: function(response){
			if (response==0){
				$('.participantlist_container').transition({ opacity: 0 });
				setTimeout(function(){
					getleaderboard='yes';
					$('.participantlist_container').hide();
					$('.leaderboarddiv_container').show();
					$('.leaderboarddiv_container').transition({ opacity: 1 });
				}, 1000);
			}else{
				alert('Please wait for at least 1 participant to join your quiz');
			}
			
		},
		error: function (xhr) {
			console.log(JSON.stringify(xhr));
		}
	});
}

function end(ev){
	ev.preventDefault();
	if (confirm("Are you sure to end the quiz?")) {
		$.ajax({
		type: "POST",
		dataType: "json",
		url: 'joinquiz_query.php',
		data: {quiz_host_id: quiz_host_id, action: 'endquiz'},
		success: function(response){
			location.href = "admin_resultDetailsView.php?quiz_host_id="+quiz_host_id;
		},
		error: function (xhr) {
			console.log(JSON.stringify(xhr));
		}
	});
	}
	
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
<?php 
	require "../connection.php";
	if ($_POST["action"]=="getleaderboard"){
		$playername=array();
		$playerscore=array();
		$players=array();
		$ranking=array();
		$orderby="FIELD( username , ";
		$query="SELECT * from quiz_result where quiz_host_id='$_POST[quiz_host_id]' order by $_POST[orderby]";
		$result=mysqli_query($conn,$query);
		if (!mysqli_query($conn,$query)){
			echo $query;exit;
		}
		while($row=mysqli_fetch_assoc($result)){
			array_push($playername, $row["username"]);
			array_push($playerscore, $row["score"]);
			$orderby.="\"".$row["username"]."\",";
		}
		
		$orderby = substr($orderby, 0, -1);
		$orderby .= ")";
		
		$ordered_values = $playerscore;
		rsort($ordered_values);
		foreach ($playerscore as $key => $value) {
			foreach ($ordered_values as $ordered_key => $ordered_value) {
				if ($value === $ordered_value) {
					$key = $ordered_key;
					break;
				}
			}
			//$playername[$key] = ' Rank '. ((int) $key + 1) .' &nbsp;'.$playername[$key];
			array_push($ranking, ((int) $key + 1));
			//echo $value . '- Rank: ' . ((int) $key + 1) . '<br/>';
		}
		$index = array_search($_SESSION['username'], $playername);
		$returnArr = [$playername,$playerscore,$orderby,$ranking,$index];  
		echo json_encode($returnArr);
	}else if ($_POST["action"]=="getquestion"){
		$question=array();
		$question_answer=array();
		$option_A=array();
		$option_B=array();
		$option_C=array();
		$option_D=array();
		
		$orderby="FIELD( username , ";
		$query="SELECT * from quiz_question where quiz_id='$_POST[quiz_id]' and status=1 order by id";
		$result=mysqli_query($conn,$query);
		if (!mysqli_query($conn,$query)){
			echo $query;exit;
		}
		
		while($row=mysqli_fetch_assoc($result)){
			array_push($question, $row["question"]);
			array_push($question_answer, $row["answer"]);
			array_push($option_A, $row["option_1"]);
			array_push($option_B, $row["option_2"]);
			array_push($option_C, $row["option_3"]);
			array_push($option_D, $row["option_4"]);
		}
		$returnArr = [$question,$question_answer,$option_A,$option_B,$option_C,$option_D];  
		echo json_encode($returnArr);
	}else if ($_POST["action"]=="startquiz"){
		$query="SELECT * from quiz_host where quiz_pin='$_POST[quiz_pin]'";
		$result=mysqli_query($conn,$query);
		if (!mysqli_query($conn,$query)){
			echo $query;exit;
		}
		$row=mysqli_fetch_assoc($result);
		$status = $row["status"];
		
		
		echo json_encode($status);
	}else if ($_POST["action"]=="endquiz"){
		$query="SELECT * from quiz_host where quiz_pin='$_POST[quiz_pin]'";
		$result=mysqli_query($conn,$query);
		if (!mysqli_query($conn,$query)){
			echo $query;exit;
		}
		$row=mysqli_fetch_assoc($result);
		$status = $row["status"];
		
		
		echo json_encode($status);
	}else if ($_POST["action"]=="updateresult"){
		if(isset($_SESSION["guestid"])){
			$query="UPDATE quiz_result SET score='$_POST[correct]',status='$_POST[quiz_status]' WHERE quiz_host_id='$_POST[quiz_host_id]' and guestid='$_SESSION[guestid]' ";
		}else{
			$query="UPDATE quiz_result SET score='$_POST[correct]',status='$_POST[quiz_status]' WHERE quiz_host_id='$_POST[quiz_host_id]' and userid='$_SESSION[userID]' ";
		}
		
		if ($_POST["quiz_status"]==1){
			$_SESSION["updateparticipant"]=0;
			unset($_SESSION['counter']);
			if ($_SESSION["userID"]==0){
				
			}
		}
		$result=mysqli_query($conn,$query);
		if (!mysqli_query($conn,$query)){
			echo $query;exit;
		}
		
		 
		echo json_encode(0);
	}else if ($_POST["action"]=="setname"){
		if( $_SESSION["updateparticipant"]==0 ){
			$query="UPDATE quiz_host SET total_participant=total_participant+1  WHERE id='$_POST[quiz_host_id]' ";
			mysqli_query($conn,$query);
			
			
			$ip = $_SERVER['REMOTE_ADDR'];
			$date=date('Y-m-d');
			$query_guest="INSERT INTO guest(quiz_host_id, username, ip,date) VALUES ('$_POST[quiz_host_id]', '$_POST[username]', '$ip', '$date')";
			mysqli_query($conn,$query_guest);
			$last_id = mysqli_insert_id($conn);
			$_SESSION["guestid"]=$last_id;
			$_SESSION["updateparticipant"]=1;
			
			$query="INSERT INTO quiz_result(quiz_host_id, username, guestid, quiz_id, score) VALUES ('$_POST[quiz_host_id]', '$_POST[username]', '$_SESSION[guestid]', '$_POST[quiz_id]', '0')";
			mysqli_query($conn,$query);
		}
		$_SESSION["username"]=$_POST["username"];
		echo json_encode(0);
	}
?>


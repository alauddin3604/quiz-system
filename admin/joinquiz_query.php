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
		$complete=0;
		$incomplete=0;
		$total=0;
		while($row=mysqli_fetch_assoc($result)){
			array_push($playername, $row["username"]);
			array_push($playerscore, $row["score"]);
			if ($row["status"]==0){
				$incomplete++;
			}
			if ($row["status"]==1){
				$complete++;
			}
			$total++;
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
		$returnArr = [$playername,$playerscore,$orderby,$ranking,$complete,$incomplete,$total];  
		echo json_encode($returnArr);
	}else if ($_POST["action"]=="getparticipantlist"){
		$playername=array();
		$playerscore=array();
		$players=array();
		$ranking=array();
		$query="SELECT * from quiz_result where quiz_host_id='$_POST[quiz_host_id]' order by id DESC";
		$result=mysqli_query($conn,$query);
		if (!mysqli_query($conn,$query)){
			echo $query;exit;
		}
		while($row=mysqli_fetch_assoc($result)){
			array_push($playername, $row["username"]);
			//array_push($playerscore, $row["score"]);
			//$orderby.="\"".$row["username"]."\",";
		}
		
		//$orderby = substr($orderby, 0, -1);
		//$orderby .= ")";
		
		//$ordered_values = $playerscore;
		//rsort($ordered_values);
		/*foreach ($playerscore as $key => $value) {
			foreach ($ordered_values as $ordered_key => $ordered_value) {
				if ($value === $ordered_value) {
					$key = $ordered_key;
					break;
				}
			}
			//$playername[$key] = ' Rank '. ((int) $key + 1) .' &nbsp;'.$playername[$key];
			array_push($ranking, ((int) $key + 1));
			//echo $value . '- Rank: ' . ((int) $key + 1) . '<br/>';
		}*/
		//$index = array_search($_SESSION['username'], $playername);
		$returnArr = [$playername];  
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
	}else if ($_POST["action"]=="updateresult"){
		$query="UPDATE quiz_result SET score='$_POST[correct]',status='$_POST[quiz_status]' WHERE quiz_host_id='$_POST[quiz_host_id]' and userid='$_SESSION[userID]' ";
		if ($_POST["quiz_status"]==2){
			$_SESSION["updateparticipant"]=0;
			unset($_SESSION['counter']);
		}
		$result=mysqli_query($conn,$query);
		if (!mysqli_query($conn,$query)){
			echo $query;exit;
		}
		
		 
		echo json_encode(0);
	}else if ($_POST["action"]=="startquiz"){
		$check="SELECT * from quiz_host where id ='$_POST[quiz_host_id]' ";
		$result_check=mysqli_query($conn,$check);
		$row_check=mysqli_fetch_assoc($result_check);
		$total=$row_check["total_participant"];
		if ($total==0){
			echo json_encode(1);
		}else{
			$query="UPDATE quiz_host SET status='2' WHERE id='$_POST[quiz_host_id]'";
			$result=mysqli_query($conn,$query);
			if (!mysqli_query($conn,$query)){
				echo $query;exit;
			}
			echo json_encode(0);
		}
		
	}else if ($_POST["action"]=="endquiz"){
		$query="UPDATE quiz_host SET status='3' WHERE id='$_POST[quiz_host_id]'";
		
		$result=mysqli_query($conn,$query);
		if (!mysqli_query($conn,$query)){
			echo $query;exit;
		}
		
		 
		echo json_encode(0);
	}
?>


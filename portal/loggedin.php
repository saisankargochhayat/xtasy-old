<?php
ob_start();
session_start();
// GEt the location to send
$current_file = $_SERVER['SCRIPT_NAME']; //to see the current file you are in
if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){

$http_referer = $_SERVER['HTTP_REFERER'];

}
 // page from which you came from

function loggedin(){
	if(isset($_SESSION['xtid']) && !empty($_SESSION['xtid'])){
		return true;
	}
	else{
		return false;
	}
}

function getuserfield($field){

	require 'connectdb.php';
	$query = "SELECT * FROM tbl_student  INNER JOIN tbl_college ON  tbl_student.college = tbl_college.id WHERE xtasy_id = :xtasy_id";
	$stmpt = $conn->prepare($query);
	$stmpt->bindParam(':xtasy_id',$_SESSION['xtid'],PDO::PARAM_STR);
	if($stmpt->execute())
	{
		$query_num_rows= $stmpt->rowCount();
		//echo $query_num_rows." ".$field." ".$_SESSION['xtasy_id'];
		if($final = $stmpt->fetch())
		{
			//echo $final;
			$x= $final[$field];
			return $x;

		}
		else{
			echo "Cannot fetch data from database";
		}
	}
	else{
		echo "Cannot execute the query";
	}

}
function gettotalreg(){
	require 'connectdb.php';
	$query1 = "SELECT COUNT('id') AS tot FROM tbl_student";
		$stmt=$conn->prepare($query1);
		$stmt->execute();
		$row= $stmt->fetch();
		return $row['tot'];
}
function getuserid($l)
{
	require 'connectdb.php';
	$query1 = "SELECT id FROM tbl_student WHERE xtasy_id LIKE ?";
		$stmt=$conn->prepare($query1);
		$stmt->execute(array($l));
		$studentid= $stmt->fetch();
		return $studentid['id'];
}
function checkregistration($eventid){
	require 'connectdb.php';
	$id = getuserid($_SESSION['xtid']);
	$query = "SELECT * FROM tbl_participation WHERE student_id=:sid AND event_id=:eid";
  $stmpt = $conn->prepare($query);
  $stmpt->bindParam(':sid',$id,PDO::PARAM_INT);
  $stmpt->bindParam(':eid',$eventid,PDO::PARAM_INT);
  $stmpt->execute();
  $participatedata=$stmpt->fetch();
  $number = $stmpt->rowCount();
	if($number==0){
		return -1;
	}else{
		if($participatedata['team']==NULL)
			return 0;
		else
			return $participatedata['team'];
	}
}
?>

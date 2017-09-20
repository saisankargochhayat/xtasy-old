<?php
	require 'connectdb.php';
	$query = "UPDATE tbl_student SET :field = :value WHERE xtasy_id=:xtid";
	$stmpt = $conn->prepare($query);
	$stmpt->bindParam(':field',$_POST['field'],PDO::PARAM_INT);
	$stmpt->bindParam(':value',$_POST['value']);
	$stmpt->bindParam(':xtasy_id',$_SESSION['xtid'],PDO::PARAM_STR);
	if($stmpt->execute())
	{
			return "Data updated Succesfully";
	}
	else{
			return "Cannot Update data in database";
	}
?>

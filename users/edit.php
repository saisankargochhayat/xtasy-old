<?php
		require '../portal/connectdb.php';
		require '../portal/loggedin.php';
		if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['year']) && isset($_POST['college'])
		&& isset($_POST['age']) && isset($_POST['sex'])){
			$query = "UPDATE tbl_student SET first_name = :firstname , last_name = :lastname ,
			year = :year , college = :college , age = :age , sex = :sex WHERE xtasy_id=:xtid";
			$stmpt = $conn->prepare($query);
			$stmpt->bindParam(':firstname',$_POST['first_name'],PDO::PARAM_STR);
			$stmpt->bindParam(':lastname',$_POST['last_name'],PDO::PARAM_STR);
			$stmpt->bindParam(':year',$_POST['year'],PDO::PARAM_STR);
			$stmpt->bindParam(':college',$_POST['college'],PDO::PARAM_INT);
			$stmpt->bindParam(':age',$_POST['age'],PDO::PARAM_INT);
			$stmpt->bindParam(':sex',$_POST['sex'],PDO::PARAM_STR);
			$stmpt->bindParam(':xtid',$_SESSION['xtid'],PDO::PARAM_STR);
			if($stmpt->execute()){
				header('location:index.php');
			}else{
				echo "Problem updating data";
			}
		}else{
			echo "Please produce data";
		}
	/*function updatefield(field,value){
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
	$query = "SELECT * FROM tbl_student WHERE xtasy_id = :xtid";
	$stmpt = $conn->prepare($query);
	$stmpt->bindParam(':xtasy_id',$_SESSION['xtid'],PDO::PARAM_STR);
	$stmpt->execute();
	$row=$stmpt->fetch();
	if($row['first_name']!=$_POST['first_name'])
		echo updatefield('first_name',$_POST['first_name']);*/
?>

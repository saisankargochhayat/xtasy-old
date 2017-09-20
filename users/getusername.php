<?php
require '../portal/connectdb.php';
require '../portal/loggedin.php';
$xtasyid = $_POST['xtasy_id'];
$json=array();
$obj=array();
if(loggedin()){
  $obj['loggedin'] = 'true';
$query = "SELECT first_name,last_name FROM tbl_student WHERE xtasy_id = ?";
  $stmt=$conn->prepare($query);

  $obj['status'] = 'false';
  if($stmt->execute(array($xtasyid))){

    if($stmt->rowCount() == 1){
      $obj['status']='true';
      $row= $stmt->fetch();
      $name = $row['first_name']." ".$row['last_name'];
      $obj['name'] = $name;
    }
  }
}else{
$obj['loggedin'] = 'false';
}
  array_push($json,$obj);
  echo json_encode($json);
 ?>

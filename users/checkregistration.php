<?php
require '../portal/connectdb.php';
require '../portal/loggedin.php';
$jsonfile=array();
$obj=array();

if(loggedin()){
  $obj['loggedin']="true";
  $id = getuserid($_SESSION['xtid']);
  $eventid = $_POST['event'];
  $query = "SELECT * FROM tbl_participation WHERE student_id=:sid AND event_id=:eid";
  $stmpt = $conn->prepare($query);
  $stmpt->bindParam(':sid',$id,PDO::PARAM_INT);
  $stmpt->bindParam(':eid',$eventid,PDO::PARAM_INT);
  $stmpt->execute();
  $participatedata=$stmpt->fetch();
  $number = $stmpt->rowCount();
  if($number==0){
    $obj['registered']="false";
  }else{
    if($participatedata['team']==NULL){
      $obj['registered']="true";
      $obj['groupid']="NULL";
    }
    else{
      $obj['registered']="true";
      $obj['groupid']=$participatedata['team'];
    }
  }
}else{
  $obj['loggedin']="true";
  $obj['registered']="false";
}
array_push($jsonfile,$obj);
echo json_encode($jsonfile);
?>

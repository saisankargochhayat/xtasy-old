<?php
require "../portal/connectdb.php";
require "../portal/loggedin.php";
$jsonfile=array();
$obj=array();
$obj['status'] = 'false';

function deleteparticipation($eid,$sid){
  require "../portal/connectdb.php";
  $query = "DELETE FROM tbl_participation WHERE student_id=:sid AND event_id=:eid";
  $stmpt = $conn->prepare($query);
  $stmpt->bindParam(':sid',$sid,PDO::PARAM_INT);
  $stmpt->bindParam(':eid',$eid,PDO::PARAM_INT);
  if($stmpt->execute()){
    return true;
  }else{
    return false;
  }
}


if(loggedin()){
  $obj['loggedin']="true";
  $xtid = $_SESSION['xtid'];
  $id = getuserid($xtid);
  $eventid = $_POST['event'];
  $query = "SELECT * FROM tbl_event WHERE id=:eid";
  $stmpt = $conn->prepare($query);
  $stmpt->bindParam(':eid',$eventid,PDO::PARAM_INT);
  $stmpt->execute();
  $eventdata=$stmpt->fetch();
  //Check if user is registered for the event
  $groupid=checkregistration($eventid);
  if($groupid==-1){
    //echo "Not participated";
    //The user is not participated in the event
    $obj['status']="false";
  }else{
    //The user has participated in the event. Continue to unparticipate.
    //Check if event is group or single
    if($eventdata['group_event']==0){
      //Its a single event. Proceed to unparticipate
      //echo "Single event";
      //echo "SIngle registration";
      if(deleteparticipation($eventid,$id))
        $obj['status']="true";
      else
        $obj['status']="false";
    }else{
      //Its a group event.
      //echo "Group event";
      $query = "SELECT *  FROM tbl_groups WHERE id = :id";
      $stmpt = $conn->prepare($query);
      $stmpt->bindParam(':id',$groupid,PDO::PARAM_INT);
      $stmpt->execute();
      $groupdata=$stmpt->fetch();
      //Check if user is the leader
      if($groupdata['leader']==$id){
        //User is the leader of the group. Unparticipate all the members and delete the group
        //echo "You are the leader";
        //Unparticipate all members
        $query = "DELETE FROM tbl_participation WHERE team=:team";
        $stmpt = $conn->prepare($query);
        $stmpt->bindParam(':team',$groupid,PDO::PARAM_INT);
        if($stmpt->execute()){
          $obj['status']="true";
        }else{
          $obj['status']="false";
        }
        //Delete group
        $query = "DELETE FROM tbl_groups WHERE id=:id";
        $stmpt = $conn->prepare($query);
        $stmpt->bindParam(':id',$groupid,PDO::PARAM_INT);
        if($stmpt->execute()){
          //echo "Succesfully Deleted the group";
        }else{
          $obj['status']="false";
        }
      }else{
        //User is not the leader. Unparticipate him only.
        if(deleteparticipation($eventid,$id))
          $obj['status']="true";
        else
          $obj['status']="false";

      }
    }
  }
}else{
  $obj['loggedin']="false";
}
array_push($jsonfile,$obj);
echo json_encode($jsonfile);
?>

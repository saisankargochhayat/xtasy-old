<?php
  require "../portal/connectdb.php";
  require "../portal/loggedin.php";
  $jsonfile=array();
  $obj=array();
  if(loggedin()){
    $obj['loggedin']="true";
    $eventid = $_POST['event'];
    $xtid = $_SESSION['xtid'];
    $id=getuserid($xtid);
    /*$query = "SELECT id FROM tbl_student WHERE xtasy_id = :id";
    $stmpt = $conn->prepare($query);
    $stmpt->bindParam(':id',$xtid,PDO::PARAM_INT);
    $stmpt->execute();
    $row = $stmpt->fetch();
    $id = $row['id'];*/
    $id = getuserid($xtid);
    //echo $eventid." ".$id;
    //Check if user has already participated or not.
    if(checkregistration($eventid)==-1)
    {
      //User is not registered
      //Check if event is group or not
      $query = "SELECT group_event FROM tbl_event WHERE id = :eid";
      $stmpt = $conn->prepare($query);
      $stmpt->bindParam(':eid',$eventid,PDO::PARAM_INT);
      $stmpt->execute();
      $row = $stmpt->fetch();
      $group = $row['group_event'];
      if($group == 0)
      {
        $query = "INSERT INTO tbl_participation(event_id,student_id) VALUES(:eid , :sid)";
        $stmpt = $conn->prepare($query);
        $stmpt->bindParam(':eid',$eventid,PDO::PARAM_INT);
        $stmpt->bindParam(':sid',$id,PDO::PARAM_INT);
        if($stmpt->execute())
        {
          $obj['registered']="true";
          //header('Location:'.$http_referer);
          //$message = "You have been succesfully registered !";
        }else{
          $obj['registered']="true";
          //$message = "Cannot register right now !";
        }
      }else{
        //Create a group
        //flag variable is 1 if all the operations are succesfully done and 0 otherwise
        $query = "INSERT INTO tbl_groups(group_name,event_id,leader) VALUES(:gname , :eid , :leader)";
        $stmpt = $conn->prepare($query);
        $stmpt->bindParam(':gname',$_POST['group_name'],PDO::PARAM_STR);
        $stmpt->bindParam(':eid',$eventid,PDO::PARAM_INT);
        $stmpt->bindParam(':leader',$id,PDO::PARAM_INT);
        if(!$stmpt->execute()){
          $flag=0;
        }
        $groupid = $conn->lastInsertId();
        $flag=1;
        //Register the leader.
        $query = "INSERT INTO tbl_participation(event_id,student_id,team) VALUES(:eid , :sid,:team)";
        $stmpt = $conn->prepare($query);
        $stmpt->bindParam(':eid',$eventid,PDO::PARAM_INT);
        $stmpt->bindParam(':sid',$id,PDO::PARAM_INT);
        $stmpt->bindParam(':team',$groupid,PDO::PARAM_INT);
        if(!$stmpt->execute()){
          $flag=0;
        }
        //Register others for the event
        $totalmem = $_POST['totalmem'];
        $query = "INSERT INTO tbl_participation(event_id,student_id) VALUES(:eid , :sid)";
        for($i=1;$i<=$totalmem;$i++)
        {
          $tempid = getuserid($_POST['id'.$i]);
          $query = "INSERT INTO tbl_participation(event_id,student_id,team) VALUES(:eid , :sid,:team)";
          $stmpt = $conn->prepare($query);
          $stmpt->bindParam(':eid',$eventid,PDO::PARAM_INT);
          $stmpt->bindParam(':sid',$tempid,PDO::PARAM_INT);
          $stmpt->bindParam(':team',$groupid,PDO::PARAM_INT);
          if(!$stmpt->execute()){
            $flag=0;
          }
        }
        if($flag==1)
          $obj['registered']="true";
        else
          $obj['registered']="false";
      }
    }else{
      $obj['registered']="false";
      //echo "You have already registered for this event.";
    }
  }else{
    $obj['loggedin']="false";
    //echo "You are not logged in... Please login <a href=\"loginform.html\">here</a>";
}
array_push($jsonfile,$obj);
echo json_encode($jsonfile);
 ?>

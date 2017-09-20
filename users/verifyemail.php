
<?php

require '../portal/connectdb.php';

$token = $_GET['token'];
$email = $_GET['account'];

// Token Check 1st

  $sql = "SELECT xtasy_id FROM tbl_student WHERE email = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute(array($email));
      $abc = $stmt->fetch();
      if($token == md5($salt.$abc['xtasy_id'])){
        $sql1 = "UPDATE tbl_student SET is_verified=1 WHERE email=?";
        $stmt1 = $conn->prepare($sql1);
        if($stmt1->execute(array($email))){
          header('Location:login.php?mail=75ab8d4b6e92b3679481cc71be88f49b');
        }
        else{
          echo "Cannot verified account";
        }
      }
      else{
        echo "Token Rejected";
      }
?>

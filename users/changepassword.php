<?php
$obj = array();
$json=array();
	require '../portal/connectdb.php';
	require '../portal/loggedin.php';
		if (isset($_POST['currpass'])){
				if (!empty($_POST['newpass'])&&!empty($_POST['newpass1'])){


					if ($_POST['newpass']==$_POST['newpass1']) {
						$sql = "SELECT password FROM tbl_student WHERE xtasy_id=?";
						$stmt = $conn->prepare($sql);
						if($stmt->execute(array($_SESSION['xtid']))){
							$pass=$stmt->fetch();
							if($pass['password']==md5($_POST['currpass'].$salt)){
								$sql = "UPDATE tbl_student SET password=? WHERE xtasy_id=?";
								$stmt1 = $conn->prepare($sql);
								if($stmt1->execute(array(md5($_POST['newpass'].$salt),$_SESSION['xtid']))){
									$obj['passchanged']='success';
								}
								else{
									$obj['passchanged']='failed';
									$obj['dberror']='true';
								}
							}else{
								$obj['passchanged']='failed';
								$obj['confirmpass']='false';
							}
						}
						else{
							$obj['passchanged']='failed';
							$obj['dberror']='true';
						}
					}
					else{
						$obj['passchanged']='failed';
						$obj['comparepass']='false';
					}
			}else{
					$obj['passchanged']='failed';
						$obj['newpass']='notset';
				}
			}else{
				$obj['passchanged']='failed';
				$obj['currpas']='notset';
			}
			array_push($json,$obj);
			echo json_encode($json);
?>

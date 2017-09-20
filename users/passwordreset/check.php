<?php
	require '../../portal/connectdb.php';
		if (isset($_POST['email'])){
				if (!empty($_POST['password'])&&!empty($_POST['password2'])){


					if ($_POST['password']==$_POST['password2']) {

						$sql4 = "UPDATE tbl_student SET password=? WHERE email=?";
						$stmt1 = $conn->prepare($sql4);
						if($stmt1->execute(array(md5($_POST['password'].$salt),$_POST['email']))){

						header('location:../login.php?changepassword=success');
						}
						else{
							header('location:../login.php?changepassword=failed');
						}
					}
					else{
						header('location:index.php?account='.$_POST['email'].'&token='.$_POST['token'].'&confirmpassword=failed');

					}

			}
				else{
						header('location:index.php?enterpassword=failed');

				}
			}else{
				echo "Variables not set";
			}
?>

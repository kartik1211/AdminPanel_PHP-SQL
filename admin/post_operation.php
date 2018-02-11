<!-- This file is used for LOCK?UNLOCK button-->
<?php
 include_once('../database/dbsetup.php');

//we'll pass a get ref. so that we can chk which post has to be edited.
if(isset($_GET['id'])){

	if($_GET['opr']=='lock'){
		$query="UPDATE `blog` SET `status`='0' WHERE `id`='".$_GET['id']."'  ";
	}elseif($_GET['opr']=='unlock'){
$query="UPDATE `blog` SET `status`='1' WHERE `id`='".$_GET['id']."'";
	}
	elseif ($_GET['opr']=='delete') {
$query="DELETE FROM `blog` WHERE  `id`='".$_GET['id']."' LIMIT 1";
		
	}else{//this is optionl. If anything other happens.ie. if someone tries to crack the url.
	header('location:dashboard.php');
	$_SESSION['f'][]="Invalid operation performed";
	}
if($query){// to chk if the query is set or not.
if(mysql_query($query)){
	header('location:dashboard.php');
	$_SESSION['s'][]="Processed successfully";

}else{
	$_SESSION['f'][]="Unable to process";
	header('location:dashboard.php');
}


}else{
$_SESSION['f'][]="Invalid operation performed";
header('location:dashboard.php');
}

}else{
	header('location:dashboard.php');
}


?>
 

<?php 
include_once('../database/dbsetup.php');
//print_r($_POST);
if(isset($_POST['id']) and $_POST['id']!=''){// this if is used to chk if the id field has some value in it and is not empty.
$loc='edit_post.php?id='.$_POST['id'];// it is primary location
if(chk_spl_char($_POST['title'])==0){
	$_SESSION['f'][]= "Failed to upload your post! Limited special char allowed in title!";

}else{
 $t=mysql_real_escape_string($_POST['title']);
}
$sd=mysql_real_escape_string($_POST['shortdes']);
$fd=mysql_real_escape_string($_POST['fulldes']);
//$img=mysql_real_escape_string($_POST['image']);




if(chk_spl_char($_POST['tags'])==0){
	$_SESSION['f'][]= "Failed to upload your post! Limited special char allowed in tags!";

header('location:edit_post.php');
}else{
$tag=mysql_real_escape_string($_POST['tags']);
}
if(chk_spl_char($_POST['Category'])==0){
	$_SESSION['f'][]= "Failed to upload your post! Limited special char allowed in Category!";


}else{
$category=mysql_real_escape_string($_POST['Category']);
}

$date=date('m-d-y');
$auth=mysql_real_escape_string($_POST['author']);






if(!isset($_SESSION['f'])){
 $query="UPDATE `blog` SET `title`='".$t."',`author`='".$auth."',`shortdes`='".$sd."',`fulldes`='".$fd."',`tags`='".$tag."',`category`='".$category."' WHERE `id`='".$_POST['id']."'  ";//just copy this from sql- click on UPDATE. 

if (mysql_query($query)){

	$_SESSION['s'][]= "post updated sucessfully";// tHIS IS A SESSION VARIABLE WHICH IS PREDEFINED array variable.
	header("location:$loc");// 

}else{
$_SESSION['f'][]= "Failed to update your post";
header("location:$loc");
}
}else{
	header("location:$loc");
}

}else{
	header('location:dashboard.php');
}



?>

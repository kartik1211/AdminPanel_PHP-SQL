
<?php
include_once('../database/dbsetup.php');

$imgfile=$_FILES['image'];
//we will chk if the uploaded file is img file only
$imgfrmt=array('jpg','jpeg','png','bmp','gif');
//we checked from print_r($_POST['image']) the type of img. it will be image/jpeg
//so we'll seperate the format from image/. To do that we use explode func.
$exp=explode('/', $imgfile['type']);
//print_r($imgfile);
foreach ($imgfrmt as $key) {
if($key==$exp[1]){
	$ni=$imgfile['name'];
}	
}
if($ni){
$target='../images/'.$ni;
if(move_uploaded_file($imgfile['tmp_name'], $target))
	{
		$image='images/'.$ni;
		echo "sucessfully uploaded";
}else{
	
		$_SESSION['f'][]="Unable to upload image";
		
}
	
	}

	
	else{
		$_SESSION['f'][]="Please upload image file only";
		
}
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
$auth="Mr.ks";
// this function is used to avoid sql injection. It places a \ before any string. eg. hey \"hello"\ hi

if(!isset($_SESSION['f'])){
 $query="INSERT INTO `blog`( `title`, `date`, `author`, `shortdes`, `fulldes`, `tags`, `category`,`image`) VALUES ('".$t."','".$date."','".$auth."','".$sd."','".$fd."','".$tag."' ,'".$category."','".$image."')";//just copy this from sql- click on insert.

if (mysql_query($query)){

	$_SESSION['s'][]= "post added sucessfully";// tHIS IS A SESSION VARIABLE WHICH IS PREDEFINED array variable.
	header('location:new_post.php');// if we dont specify the location. then after adding the post we have to hit the back button to see the message. Now it will directly display the msg on the edit_post screen.

}else{
$_SESSION['f'][]= "Failed to upload your post";
header('location:new_post.php');
}
}else{
	header('location:new_post.php');
}
?>
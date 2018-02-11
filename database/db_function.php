<?php
function get_all_data_from_table($table){
$data=array();
$query="SELECT * FROM `".$table."` order by id desc"; 	
if($result =mysql_query($query)){
while($row=mysql_fetch_assoc($result)){
$data[]=$row;	
}} 	
else{
echo"Unable to fetch data from DB";
}
return $data;
}

function get_data_by_key($key,$val,$table){
 
$data=array();	
$query="SELECT * FROM `".$table."` WHERE  `".$key."` = '".$val."' ";
if($result =mysql_query($query)){
while($row=mysql_fetch_assoc($result)){
$data[]=$row;	
}}	
else{	
echo"Unable to fetch data from DB";
}																					

return $data;
}


// this func. is created to check the get method from dashboard.php. i.e.if I type id(say)=70 which does not exist. Then it should chk the DB wheather id=70 is there or not.  
function get_data_by_the_id($table,$id){
$data=array();
$query="SELECT * FROM `".$table."` WHERE `id`='".$id."' order by id desc limit 1" ; // this statement will take out that id from'blog' table whose id is=the ref id	
if($result =mysql_query($query)){
$row=mysql_fetch_assoc($result);
$data=$row;	
}
else{
echo"Unable to fetch data from DB";
}
return $data;
}

function chk_spl_char($subject){

	if(preg_match_all('~[^A-Za-z0-9-,.\s]~is', $subject, $matches)){
		return '0';
	}else{
		return '1';	
	}
}

?>
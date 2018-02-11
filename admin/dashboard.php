<?php include_once('../database/dbsetup.php');
// using the file for creating DB

include_once('../database/db_function.php');
// 
$data=get_all_data_from_table('blog');
// in this array all blog posts will come.

 ?>
<!DOCTYPE html>
<html lang="en">
  <head> 
<?php include_once('headpart.php'); ?>
    </head>
  <body>
  <h1>Blog Dashboard</h1>
  
<?php
//this is the code for displaying message on the web page.
if(isset($_SESSION['s'])){
	foreach ($_SESSION['s'] as $ke) {
	echo "<br><font color='green'>" .$ke."</font>";
	}session_destroy();

}
else if (isset($_SESSION['f'])) {
	foreach ($_SESSION['f'] as $f ) {
	
	echo "<br><font color=red>" .$f."</font>";

}
session_destroy();
}
?>


  <table class="table table-striped">
  
<tr> 
<th>Index</th>
<th>Title</th>
<th>Options</th>
<!-- The rows of this table will be defined by the loop used below. -->
</tr>

 <?php
for($i=0;$i<count($data);$i++){  
	echo "<tr>";
	echo "<td>";
	$n=$i+1;
echo "$n";
	echo "</td>";
	
	echo "<td>".$data[$i]['title']."</td>";
	echo  "<td>";
	echo "<a href='edit_post.php?id=".$data[$i]['id']."'><button type='button' class='btn btn-default btn-md'>Edit</button></a>";  
	if($data[$i]['status']==1){
	echo "<a href='post_operation.php?id=".$data[$i]['id']." &opr=lock  '><button type='button' class='btn btn-default btn-md'> Lock</button></a>";//for status we want if its active-show us button to inactive and if its inactive show us btn to activate.
	}else{
echo "<a href='post_operation.php?id=".$data[$i]['id']." &opr=unlock'><button type='button' class='btn btn-default btn-md'>Un-Lock</button></a>";
	}
	echo "<a href='post_operation.php?id=".$data[$i]['id']." &opr=delete '><button type='button' class='btn btn-default btn-md'> Delete</button></a>";// for deleting also we'll perform the operations in post_operation.php
	
	echo "</td>";
	

	echo"</tr>";
}
echo "<br>";
echo "<a href='new_post.php'><button type='button' class='btn btn-default btn-md'> New</button></a>";
  ?> <!--pre tag is used to show arrays in structured form.-->
</table>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php include_once('scriptpart.php'); ?>
      </body>
</html>

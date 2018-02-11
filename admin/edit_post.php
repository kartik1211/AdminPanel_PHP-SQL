<?php
include_once('../database/dbsetup.php');
 // the if statement is used to chk the get method validation. For eg. if i change the id to (say70)which is not in DB.It will still go to that page. But
//we want if the id does not exists it should come back to the same page of edit form.

if(isset($_GET['id'])){
$rid=$_GET['id'];
$data=get_data_by_the_id('blog',$rid);
//print_r($data); //this line will show us all the info. of all blogs when we click any link blog. in array form.
}else{
	header('location:dashboard.php');
}


?>
<!DOCTYPE html>
<html lang="en">
  <head> 
<?php include_once('headpart.php'); ?>
   <script src="../ckeditor/ckeditor.js"></script><!-- this is from try.php which is from ckeditor support sample ex.-->

    </head>
  <body>
<div class="container">
<h1>Edit an existing Post</h1>
<hr>

<!--This thing will work at the last when we have clicked the submit button -->


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


<!-- Till here -->
<form method="post" action="update_post.php" enctype="multipart/form-data"><!--We add this enctype so that we can upload the img file. Using "multipart/form-data" we get the img as a file instead of just img name. The update_post.php is used to point to the page after we update the data. It will show the new data.-->
<label>Enter title</label><br>
<input type='hidden' name='id' value="<?php echo$data['id'] ?>">
<input type="text" class="form-control" name="title" value="<?php echo$data['title']?>"><br>
<label>Enter shoert des</label><br>

<input type="text" class="form-control" name="shortdes" value="<?php echo$data['shortdes']  ?>"><br>
<label>Enter Full des</label><br>
<!-- Here we'll add bootstrap plugins. Dnld ckeditor for more text styling options.-->

<textarea id="editor1" rows="10" class="form-control" name="fulldes"> "<?php echo$data['fulldes']  ?>" </textarea><br>
<label>Upload Image</label><br>
<img src="../<?php echo$data['image']  ?>" style="max-width: 180px;"></img><!-- we use ../ in front of php to go 1 folder back, as we are in edit_post.php now.So we go 1 folder back from admin folder.-->
<input type="file" class="form-control" name="image" ><br>


<label>Tags</label><br>
<input type="text" class="form-control" name="tags" value="<?php echo$data['tags']  ?>"><br>

<label>Category</label><br>
<input type="text" class="form-control" name="Category" value="<?php echo$data['category']  ?>"><br>

<input class="btn-primary btn-lg" type="submit" value="Update">
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php include_once('scriptpart.php');?>
<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );  //<!-- this is from try.php which is from ckeditor support sample ex.-->
            </script>

     
      </body>
</html>

<?php
include_once('../database/dbsetup.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head> 
<?php include_once('headpart.php'); ?>
   <script src="../ckeditor/ckeditor.js"></script><!-- this is from try.php which is from ckeditor support sample ex.-->

    </head>
  <body>
<div class="container">
<h1>Make a new Post</h1>
<hr>

<!--This thing will work at the last when we have clicked the submit button -->
<?php
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
<form method="post" action="submit_new_post.php" enctype="multipart/form-data"><!--We add this enctype so that we can upload the img file. Using "multipart/form-data" we get the img as a file instead of just img name-->
<label>Enter title</label><br>
<input type="text" class="form-control" name="title"><br>
<label>Enter shoert des</label><br>
<input type="text" class="form-control" name="shortdes"><br>
<label>Enter Full des</label><br>
<!-- Here we'll add bootstrap plugins. Dnld ckeditor for more text styling options.-->

<textarea id="editor1" rows="10" class="form-control" name="fulldes">  </textarea><br>
<label>Upload Image</label><br>
<input type="file" class="form-control" name="image"><br>


<label>Tags</label><br>
<input type="text" class="form-control" name="tags"><br>

<label>Category</label><br>
<input type="text" class="form-control" name="Category"><br>


<input class="btn-primary btn-lg" type="submit" value="Submit Post">
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

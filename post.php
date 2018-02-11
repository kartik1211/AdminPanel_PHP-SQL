<?php
include_once('database/dbsetup.php');
$val= $_GET['id']; 
$data= get_data_by_key('id',$val,'blog');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
    include_once('sitehead.php');
  ?>
  </head>
  <body>
  <div class="container">
    <h1><?php echo $data[0]['title']; ?></h1>
    <p><?php echo $data[0]['author']; ?></p>

<hr>
<img src="<?php echo $data[0]['image']; ?>" width="400" height="400"></img>
<p><?php echo $data[0]['shortdes']; ?> </p>
<p> <?php echo $data[0]['fulldes']; ?></p>

<?php
include_once('script.php'); 
?>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head> 
<?php include_once('headpart.php'); ?>
    </head>
  <body>
<!-- login form create -->

<div class="container">
<h1>User login Form</h1>
<br>
<label>Username or E-mail:</label><br>
<input type="text" class="form-control input=lg" name="user">
<br>
<label>Password:</label>
<br>
<input type="password" class="form-control input=lg" name="pass">
<br>
<input type="submit" class="btn-primary" value="login">
</form>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php include_once('scriptpart.php'); ?>
      </body>
</html>

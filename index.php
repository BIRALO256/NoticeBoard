<?php include('authenticate.php') ?>
<!DOCTYPE html>
<html>
<head> 
	<meta="viewport" content="width=device-width, initial-scale=1">
	<title>notic
	<meta charset="utf-8">
	<meta name board</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<script type="text/javascript" src="validation.js" ></script>
</head>
<body>

<div class="login">
	<img src="log.jpg" class="log"  >
	<br>
	<h4 class="subtitle">Signin to start your session</h4>
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
	    <label class="form-label">Username: <span class="required">*</span></label>
	    <input type="text" name="username" placeholder="Enter username" value="" id="user">
	    <span class="invalid-feedback"><?php echo $username_err; ?></span>

         <br> 
	    <label class="form-label">Password: <span class="required">*</span></label>
	    <input type="Password" name="password" placeholder="Enter Password" value="" id="Password">
	     <span class="invalid-feedback"><?php echo $password_err; ?></span>
	    <br>	
	    <br> 

	    <input type="submit" name="Login"  value="Login">
	    <br>
	           <?php 
        if(!empty($login_err)){
            echo '<div><span class="invalid-feedback">' . $login_err . '</span></div>';
        }        
        ?>
	    <br>
	     <a href="#####">Forgot pasword?</a>
	    <br>
	    <br>
	    <a href="register.php">Don't have acount</a>

	  </form>
	
</div>

</body>
</html>
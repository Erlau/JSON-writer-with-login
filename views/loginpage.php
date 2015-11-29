<?php
	include('../models/login.php');
	login();
	include('../views/header.php');
?>
		<div class="col-md-12">
			<h1>JSON writer with captcha login</h1>
			<div class="col-md-6">
			<h3>Login with this form</h3>
</form>
			</div>
			<div class="col-md-6">
				<?php if($error): ?>
      			<p><?php echo $error; ?></p>
   				<?php endif; ?>
				<form method="post" action="loginpage.php">
					<label>
        				Email<br />
        				<input type="text" name="username" /><br />
    				</label>
    				<label>
        				Password<br />
        				<input type="password" name="password" /><br />
					</label></br>
					<label>
						Enter code <img src="../controllers/captcha.php"><input type="text" name="vercode" /> 
					</label></br>
    				<input type="submit" value="Log ind" />
				</form>
			</div>
<?php
	include('../views/footer.php');
?>
<?php
include('../models/login.php');
check_login();
include('../views/header.php');
?>
		<div class="col-md-12">
			<h1>JSON writer with captcha login</h1>
			<div class="col-md-6">
				<h3>Save database as JSON</h3>
					<button onclick="open_script()">Save JSON</button>
				<h3><a href="../models/logout.php">Log ud</a></h3>
    		</div>
			<div class="col-md-6">
				<h3>You are logged in as</h3>
				<?php $user = query('SELECT * FROM users WHERE id = "'.$_SESSION['id'].'" '); ?>
   				<pre>
     			 	<?php print_r($user); ?>
    			</pre>
			</div>
    	</div>
<?php
	include('../views/footer.php');
?>

<script>
function open_script(){
   window.location.assign('../models/savejson.php');
}
function open_script2(){
   window.location.assign('../models/getjson.php');
}
</script>
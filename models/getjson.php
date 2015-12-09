<?php
include('../controllers/dbcon.php');

$json_string=file_get_contents('../demo.json');
$json = json_decode($json_string,true);

$msg = print_r($json,true);

echo "<script type='text/javascript'>alert(".json_encode($msg).")
		window.location.replace('../views/resultpage.php');
	</script>";
<?php
include('../controllers/dbcon.php');

$sql = "select * from users";
$result = mysqli_query($conn, $sql) or die("Error in getting data" . mysqli_error($connection));

$usarray = array();

while($row =mysqli_fetch_assoc($result))
	{
        $usarray[] = $row;
    }

$fp = fopen('../demo.json', 'w');
    fwrite($fp, json_encode($usarray));
    fclose($fp);
    
$message = "Saved database data as a JSON file";
echo "<script type='text/javascript'>alert('$message');
		window.location.replace('../views/resultpage.php');
	</script>";
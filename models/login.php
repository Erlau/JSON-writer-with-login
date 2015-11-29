<?php
session_start();
include('../controllers/dbcon.php');

function query($sql)
{
  global $conn;

  $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  $returnData = [];
  while($row = mysqli_fetch_assoc($query))
  {
    $returnData[] = $row;
  }

  return $returnData;
}

function logout()
{
  unset($_SESSION['id']);
  header('Location: ../index.php');
  exit;
}

function check_login()
{
  if(isset($_SESSION['id']))
  {
    return true;
  }
  else
  {
    header('Location: ../views/loginpage.php?error=not-logged-in');
    exit;
  }
}

function error_handler($err)
{
  global $error;

  if($err === 'not-logged-in')
  {
    $error = 'You are not logged in';
  }
}

function login()
{
  global $error;

  if(isset($_GET['error']))
  {
    error_handler($_GET['error']);
  }

  if(!isset($_POST['username']) OR !isset($_POST['password']))
  {
    return false;
  }

  $username = $_POST['username'];
  $password = $_POST['password'];

  if(empty($username) AND empty($password))
  {
    $error = 'You did not fill out all forms. Do so please.';
    return false;
  }

  if(!filter_var($username, FILTER_VALIDATE_EMAIL))
  {
    $error = 'This is not an email, please fill in an email-address.';
    return false;
  }

  $user = query('SELECT id FROM users WHERE email = "'.$username.'" AND password = "'.$password.'" ');
  
  if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  { 
     echo  '<strong>Wrong verification code.</strong>';
	} else { 
  	if(count($user) < 1)
  	{
    	$error = 'Wrong email, password or verification code.';
		return false;
  	}
  }

  $_SESSION['id'] = $user[0]['id'];
  header('Location: ../views/resultpage.php');
  exit;

}

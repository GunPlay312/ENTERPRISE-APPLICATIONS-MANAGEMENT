<?php ob_start()?>
<?php session_start()?>

<?php 

$_SESSION['user_firstname'] = null;
$_SESSION['user_lastname'] = null;
$_SESSION['user_email'] = null;
$_SESSION['password'] = null;
$_SESSION['user_role'] = null;
$_SESSION['users_un_id'] = null;

header("Location: loginForm.php");
?>
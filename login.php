<!DOCTYPE html>
<html>

<head>Login</head>
<body>

<?php 
$root = $_SERVER['DOCUMENT_ROOT'];
echo "root is ".$root;
require 'sys/ModelController.php';

$model = new ModelController();

if (isset($_POST['loginSubmit'])) {
   $user = $_POST["user"];
   $pass = $_POST["pass"];
}
$result = $this->model->checkLogin($user,$pass);


echo "Username = ".$user;
echo "Password=".$pass;

if($result == '1'){
	echo "login successful";
}else{
	echo "login failed";
}

?>
</body>
</html>
<!DOCTYPE html>
<html>

<head></head>
<body>

<?php 
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . '/sys/ModelController.php';

//$model = new ModelController();

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
<?php
require 'sys/ModelController.php';

$model = new ModelController();

if (isset($_POST['loginSubmit'])) {
   $user = $_POST["user"];
   $pass = $_POST["pass"];
}
$result = $this->model->checkLogin($user,$pass);




?>

<!DOCTYPE html>
<html>

<head>Login</head>
<body>

<?php 

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
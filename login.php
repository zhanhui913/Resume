<?php


if (isset($_POST['loginSubmit'])) {
   $user = $_POST["user"];
   $pass = $_POST["pass"];
}


?>

<!DOCTYPE html>
<html>

<head>Login</head>
<body>

<?php 

echo "Username = ".$user;
echo "Password=".$pass;
?>
</body>
</html>
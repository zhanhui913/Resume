<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . '/../sys/PDO_Adapter.php';


if (isset($_POST['loginSubmit'])) {
   $user = $_POST["user"];
   $pass = $_POST["pass"];
}


?>

<!DOCTYPE html>
<html lang="en">

<head></head>
<body>

<?php 

echo "Username = ".$user;
echo "Password".$pass;
?>
</body>
</html>

<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('Location:home.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/user.css" type="text/css" rel="stylesheet" />
	<title>delete</title>
</head>
<body>
	
 <?php
     include "./phps.php";

     $phps = new phps();
     $phps->del($_GET["id"]);
?>
    
</body>

</div>
</html>
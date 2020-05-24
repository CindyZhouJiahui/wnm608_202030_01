<?php
include "./phps.php";

session_start();

if(isset($_SESSION['admin'])){
    $rt = [
        "code" => 1,
        "msg" => "Login successful"
    ];
    echo json_encode($rt);
    return;
}

$user = $_POST['user'];
$psw = md5($_POST['psw']);

$phps = new phps();

$is =  $phps->adminLogin($user, $psw);

if(!$is){
    $rt = [
        "code" => 0,
        "msg" => "Wrong username or password"
    ];
    echo json_encode($rt);
    return;
}

$rt = [
    "code" => 1,
    "msg" => "Login successful"
];
$_SESSION['admin'] = $is["user"];
echo json_encode($rt);
return;

?>
<?php
include "./phps.php";

session_start();

if(isset($_SESSION['countant'])){
    $rt = [
        "code" => 1,
        "msg" => "Login successful"
    ];
    echo json_encode($rt);
    return;
}

$countant = $_POST['countant'];
$password = md5($_POST['password']);

$phps = new phps();

$sql = "select * from user where countant = \"$countant\" and password = \"$password\"";
$result = $phps->db->query($sql);
$is =  mysqli_fetch_array($result, MYSQLI_ASSOC);

if(!$is){
    $rt = [
        "code" => 0,
        "msg" => "Wrong countant or password"
    ];
    echo json_encode($rt);
    return;
}

$rt = [
    "code" => 1,
    "msg" => "Login successful"
];
$_SESSION['countant'] = $is["countant"];
echo json_encode($rt);
return;

?>
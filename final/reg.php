<?php
session_start();
include "./phps.php";

$countant = $_POST['countant'];
$usernames = $_POST['username'];
$passwords = md5($_POST['password']);

$phps = new phps();

$sql = "select * from user where countant = \"$countant\"";
$result = $phps->db->query($sql);
$is =  mysqli_fetch_array($result, MYSQLI_ASSOC);
if($is){
    $rt = [
        "code" => 0,
        "msg" => "countant has been registered, please change to another countant"
    ];
    echo json_encode($rt);
    return;
}

$sql = "INSERT INTO user ( countant, username, password )
                       VALUES
                       ( \"$countant\", \"$usernames\", \"$passwords\" )";

$result = $phps->db->query($sql);

if ($result) {
    $rt = [
        "code" => 1,
        "msg" => "<h1>success</h1>"
    ];
    
    echo json_encode($rt);
    return;
}else{
    $rt = [
        "code" => 0,
        "msg" => "<h1>error</h1>"
    ];
    echo json_encode($rt);
    return;
}

?>
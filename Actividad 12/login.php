<?php
    session_start();

    $username = $_POST["username"];
    $password = $_POST["password"];

    $users = [
        "alan" => "1234",
        "yesua" => "5678"
    ];


if(isset($users[$username]) && $users[$username] == $password){
    $_SESSION["username"] = $username;
    header("Location: /intranet.php");
    exit();
}else{
    header("Location: /logout.php");
}

?>
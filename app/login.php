<?php

session_start();

$users = json_decode(file_get_contents('../database/user_data.json'), true);

$username =  $users['Users'][0]['username'];
$password = $users['Users'][0]['password'];
$name = $users['Users'][0]['name'];

$uname = trim($_POST['username']);
$pwd = trim($_POST['password']);

if (empty($uname) || empty($pwd)) {
    header("Location: ../index.php?error=Korisnicko ime i Lozinka su obavezni");
    exit();
}

if ($username === $uname && password_verify($pwd, $password))
{
    $_SESSION['name'] = $name;
    $_SESSION['username'] = $uname;
    header('Location: ../template/home.php');
    exit();
} else {
    header('Location: ../index.php?error=Neispravno korisnicko ime ili lozinka');
    exit();
}


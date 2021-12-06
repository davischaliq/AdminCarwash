<?php
require_once '../init.php';
session_start();
if (isset($_GET['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $login = login($username, $password);
    // var_dump($login);
    if ($login == 'gagal') {
        flash::setFlash('Gagal Login', 'danger');
        header('Location:' . BASEURL);
    }
    if ($login == 'managersukses') {
        header('Location:' . BASEURL . 'Dashboard/manager/');
    }
    if ($login == 'adminsukses') {
        header('Location:' . BASEURL . 'Dashboard/admin/');
    }
}
if (isset($_GET['logout'])) {
    if (isset($_SESSION['admin']) && $_SESSION['admin'] != '') {
        unset($_SESSION['admin']);
        session_destroy();
        header('Location:'.BASEURL);
    }
    if (isset($_SESSION['manager']) && $_SESSION['manager'] != '') {
        unset($_SESSION['manager']);
        session_destroy();
        header('Location:'.BASEURL);
    }
}
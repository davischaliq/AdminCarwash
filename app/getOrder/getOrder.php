<?php

require_once '../init.php';
session_start();

if (isset($_GET['getOrder'])) {
    $order_id = htmlspecialchars($_POST['orderid']);
    $getOrder = getOrderspecifik($order_id);
    return print_r(json_encode($getOrder));
}
if (isset($_GET['updateOrder'])) {
    $order_id = htmlspecialchars($_POST['orderid']);
    $status = htmlspecialchars($_POST['status']);
    $updateOrder = updateOrder($order_id, $status);
    if ($updateOrder == 1) {
        flash::setFlash($updateOrder['pesan'], $updateOrder['tipe']);
        return print_r(1);
    }else {
        flash::setFlash($updateOrder['pesan'], $updateOrder['tipe']);
        return print_r(0);
    }

}
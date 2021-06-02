<?php

// Primary Function
// index.php
function primaryFunction()
{
    $conn = new mysqli('', '', '', '');
    $res = $conn->query("SELECT * FROM config")->fetch_assoc();

    echo 'Total Coins Mined: <b>' . $res['coinsMined'] . '/' . $res['coinCap'] . '</b><br>';
    if ($res['coinsMined'] == $res['coinCap']) {
        echo '<span style="color: red"><b>All coins have been mined! Go ahead, sell some stuff and get some coin!</b></span><br>';
    }
    echo 'The current richest user has <b>' . $conn->query("SELECT * FROM users ORDER BY coin DESC LIMIT 1")->fetch_assoc()['coin'] . '</b> sudocoin!<br><br><br>';
}

// Secondary Function
// createitem.php
function secondaryFunction()
{
    echo 'second function';
    $conn = new mysqli('', '', '', '');
    var_dump($_POST);


    if (
        array_key_exists('itemName', $_POST)
        && $_POST['amountToCharge']
        && $_POST['stock']
        && $_POST['contactSeller']
        && $_POST['descr']
        && $_POST['category']
        && $_POST['itemId']
        && $_POST['password']
        && $_POST['sellerId']
    ) {

        echo 'check';

        $sellerId = $_POST['sellerId'];
        $itemId = $_POST['itemId'];
        $getItem = $conn->query("SELECT * FROM items WHERE sellerId = $sellerId AND itemId = $itemId");
        $password = base64_encode($_POST['password']);

        if ($getItem->num_rows == 0) {
            die('invalid');
        };

        $checkPassword = $conn->query("SELECT * FROM users WHERE id = $sellerId AND pass = '$password'");

        //echo $password;
        if ($checkPassword->num_rows == 0) {
            die('ERR: You have entered an incorrect password!');
        };

        if (strpos($_POST['itemName'], "'") !== false || strpos($_POST['contactSeller'], "'") !== false || strpos($_POST['descr'], "'") !== false || strpos($_POST['category'], "'") !== false) {
            die('ERR: Invalid Characters'); // No quotes allowed msg
        }

        $mysql = "UPDATE items SET itemName = " . "'" . htmlspecialchars($_POST['itemName']) . "', amountToCharge = " . htmlspecialchars($_POST['amountToCharge']) . ", stock = " . htmlspecialchars($_POST['stock']) . ", contactSeller = '" . htmlspecialchars($_POST['contactSeller']) . "', descr = '" . htmlspecialchars($_POST['descr']) . "', category = '" . htmlspecialchars($_POST['category']) . "'";

        echo $mysql;

        $conn->query($mysql);

        die('Success!');
    }

    $gid = parse_url($_SERVER['REQUEST_URI']);

    $res = $conn->query("SELECT * FROM items WHERE itemId = " . $gid['query']);
    $viewingData = $res->fetch_assoc();
}
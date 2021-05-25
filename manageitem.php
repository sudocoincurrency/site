<?php

$conn = new mysqli('localhost', 'root', '', 'coin');

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
    $sellerId = $_POST['sellerId'];
    $itemId = $_POST['itemId'];
    $getItem = $conn->query("SELECT * FROM items WHERE sellerId = $sellerId AND itemId = $itemId");
    $password = base64_encode($_POST['password']);
    
    if ($getItem->num_rows == 0) { die('invalid'); };

    $checkPassword = $conn->query("SELECT * FROM users WHERE id = $sellerId AND pass = '$password'");

    //echo $password;
    if ($checkPassword->num_rows == 0) { die('incorrect password'); };
    
    if (strpos($_POST['itemName'], "'") !== false || strpos($_POST['contactSeller'], "'") !== false || strpos($_POST['descr'], "'") !== false || strpos($_POST['category'], "'") !== false ) {
        die('no quotes allowed');
    }

    $mysql = "UPDATE items SET itemName = ". "'" . htmlspecialchars($_POST['itemName']) . "', amountToCharge = ". htmlspecialchars($_POST['amountToCharge']) . ", stock = " . htmlspecialchars($_POST['stock']) . ", contactSeller = '" . htmlspecialchars($_POST['contactSeller']) . "', descr = '" . htmlspecialchars($_POST['descr']) . "', category = '" . htmlspecialchars($_POST['category']) . "'";

    echo $mysql;

    $conn->query($mysql);

    die('ok i think it worked');
    }

$gid = parse_url($_SERVER['REQUEST_URI']);

$res = $conn->query("SELECT * FROM items WHERE itemId = " . $gid['query']);
$viewingData = $res->fetch_assoc();

echo '
<form action="" method="post">

item name
<input type="text" name="itemName" value="' . $viewingData['itemName'] . '"> <br>

charge 
<input type="text" name="amountToCharge" value="' . $viewingData['amountToCharge'] . '"> <br>

stock
<input type="text" name="stock" value="' . $viewingData['stock'] . '"> <Br>

contact 
<input type="text" name="contactSeller" value="' . $viewingData['contactSeller'] . '"> <br>

description
<input type="text" name="descr" value="' . $viewingData['descr'] . '"> <br>

category
<select id="catelist" name="category">
<option value="software">software</option>
<option value="exchange">cash exchange</option>
<option value="books">books (digital and non digital)</option>
<option value="videos">videos</option>
<option value="giftcards">gift cards</option>
<option value="inGame">in-game items</option>
<option value="other">other items</option>
</select> <Br>

<input type="hidden" name="itemId" value="' . $viewingData['itemId'] . '">

<input type="hidden" name="sellerId" value="' . $viewingData['sellerId'] . '">

password
<input type="password" name="password"> <Br>

<input type="submit">
</form>
'


?>
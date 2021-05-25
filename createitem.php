<?php

$conn = new mysqli('localhost', 'root', '', 'coin');

if (
    array_key_exists('itemName', $_POST)
    && $_POST['amountToCharge']
    && $_POST['stock']
    && $_POST['contactSeller']
    && $_POST['descr']
    && $_POST['category']
    && $_POST['password']
    ) {
    $password = base64_encode($_POST['password']);

    //$checkPassword = $conn->query("SELECT * FROM users WHERE id = $sellerId AND pass = '$password'");

    //echo $password;
    //if ($checkPassword->num_rows == 0) { die('incorrect password'); };
    
    //$mysql = "INSERT INTO items SET itemName = ". "'" . $_POST['itemName'] . "', amountToCharge = ". $_POST['amountToCharge'] . ", stock = " . $_POST['stock'] . ", contactSeller = '" . $_POST['contactSeller'] . "', descr = '" . $_POST['descr'] . "', category = '" . $_POST['category'] . "'";


    $res2 = $conn->query("SELECT * FROM users WHERE pass = '$password'");
    if ($res2->num_rows == 0) die('invalid password or something');

    $sellerId = $res2->fetch_assoc()['id'];

    $itemName = htmlspecialchars($_POST['itemName']);
    $amountToCharge = htmlspecialchars($_POST['amountToCharge']);
    $stock = htmlspecialchars($_POST['stock']);
    $contactSeller = htmlspecialchars($_POST['contactSeller']);
    $descr = htmlspecialchars($_POST['descr']);
    $category = htmlspecialchars($_POST['category']);
    $id = rand(10, 500000);

    if (strpos($itemName, "'") !== false || strpos($contactSeller, "'") !== false || strpos($descr, "'") !== false || strpos($category, "'") !== false ) {
        die('no quotes allowed');
    }

    var_dump($_POST);

    $mysql = "INSERT INTO items (itemName, amountToCharge, sellerId, stock, itemId, category, contactSeller, descr) VALUES ('$itemName', $amountToCharge, $sellerId, $stock, $id, '$category', '$contactSeller', '$descr')";


    //echo $mysql;

    $conn->query($mysql);

    die('ok i think it worked');
    }

$gid = parse_url($_SERVER['REQUEST_URI']);

//$res = $conn->query("SELECT * FROM items WHERE itemId = " . $gid['query']);
//$viewingData = $res->fetch_assoc();

echo '
<form action="" method="post">

item name
<input type="text" name="itemName"> <br>

charge 
<input type="text" name="amountToCharge"> <br>

stock
<input type="text" name="stock"> <Br>

contact 
<input type="text" name="contactSeller"> <br>

description
<input type="text" name="descr"> <br>

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


password
<input type="password" name="password"> <Br>

<input type="submit">
</form>
'


?>
<style> * { font-family: Arial, sans-serif } </style>
<h1>sudocoin</h1>
<a href="signup.php">signup</a> <br>
<a href="store.php">store</a> <br>
<a href="transactions.php">past transactions</a> <br>
<a href="createitem.php">create store item</a> <br>
<a href="tools.zip">download the mining and transfer tools</a>

<br> <Br>

<?php
$conn = new mysqli('localhost', 'root', '', 'coin');
$res = $conn->query("SELECT * FROM config")->fetch_assoc();

echo 'coins mined: '.$res['coinsMined'].'/'.$res['coinCap'].'<br>';
if ( $res['coinsMined'] == $res['coinCap'] ) { echo '<span style="color: red"><B>all coins have been mined! go sell stuff to get some coin</b></span><br>'; }
echo 'the current richest user has <b>' . $conn->query("SELECT * FROM users ORDER BY coin DESC LIMIT 1")->fetch_assoc()['coin'] . '</b> sudocoin<br><br><br>';



?>

<h2>what is sudocoin</h2>
its a 'currency' you can mine, getting 0-1 coins per mine (usually decimal), you can mine every 5 seconds. you can use that currency in the shop, linked above. however you must contact and manually transfer sudocoin to the owner (ill probably set up a transaction process on here at some point).

<h2>how to use mining and transfer tools</h2>
you need <a href="https://nodejs.org">nodejs v14+</a> and the tools, linked above. <br>
open a command prompt and use cd to locate to the directory and run node mine.js or node transfer.js depending on what you want to do. <br>
follow the instructions it requests.
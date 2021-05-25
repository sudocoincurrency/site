<?php

$arr = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "_", "-", "!", "@");
 

$i = 0;
$cap = rand(10, 100);
$password = '';

while ($i < $cap) {
    $rand = array_rand($arr);
    $password = $password . $arr[$rand];
    $i++;
}

echo 'password: ' . $password;

$pass = base64_encode($password);

$conn = new mysqli("localhost", "root", "", "coin");

$id = rand(0, 5000000);

echo '<br>id: '. $id;

$conn->query("INSERT INTO users (pass, coin, id) VALUES ('$pass', 0, $id)");

?>
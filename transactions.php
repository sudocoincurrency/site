<p style="font-size: 125%">ill improve this at some point</p>
<?php
$conn = new mysqli('localhost', 'root', '', 'coin');
$res = $conn->query("SELECT * FROM transactions");

if ($res->num_rows > 0) {
    while($row = $res->fetch_assoc()) {
        echo '<p>transaction id:' . $row['transactionId'] . '<br>' . $row['amountTransferred'] . '<br>' . $row['sendingUserId']. '->' . $row['recievingUserId'] . '<br><br>';
    }
}

?>
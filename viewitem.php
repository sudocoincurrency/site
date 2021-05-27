<style>
    * {
        font-family: Arial, sans-serif
    }
</style>
<?php
$gid = parse_url($_SERVER['REQUEST_URI']);
//var_dump($gid);

$conn = new mysqli('localhost', 'root', '', 'coin');
$res = $conn->query("SELECT * FROM items WHERE itemId = " . $gid['query']);
$viewingData = $res->fetch_assoc();

if ($res->num_rows > 0) {
    if ($viewingData['stock'] == 0) {
        die('out of stock');
    };

    echo '<span><h1>' . $viewingData['itemName'] . '</h1></span>';
    echo 'seller id: ' . $viewingData['sellerId'] . '<Br>';
    echo $viewingData['descr'] . '<Br>';
    echo 'price: <span style="color: orange"><b>' . $viewingData['amountToCharge'] . '</b></span><br>';
    echo 'stock: ' . $viewingData['stock'] . '<br>';
    echo 'contact the seller: ' . $viewingData['contactSeller'] . '<br>';
    echo 'note: stock may be innacurate as the seller manually updates it<br>';
    echo '<span style="color: red"><b>do not send money to the seller before you have been in contact with them, unless you WANT to be scammed</b></span>';
    echo '<br><a href="manageitem.php?' . $gid['query'] . '">item management</a>';
} else {
    die('item does not exist');
}
?>
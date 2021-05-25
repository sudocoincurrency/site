<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

* {
    font-family: Arial, sans-serif
}

</style>

<a href="store.php" style="font-size: 150%">go to store home page</a> <Br>

<?php
$gid = parse_url($_SERVER['REQUEST_URI']);
//var_dump($gid);


if (!array_key_exists('query', $gid)) {
    die('<form action="" method="get"> 
    <label for="catelist">category</label>
    <select id="catelist" name="category">
    <option value="everything">everything</option>
    <option value="software">software</option>
    <option value="exchange">cash exchange</option>
    <option value="books">books (digital and non digital)</option>
    <option value="videos">videos</option>
    <option value="giftcards">gift cards</option>
    <option value="inGame">in-game items</option>
    <option value="other">other items</option>
    </select>
    <input type="submit">
    </form>');

}

$toShow = substr($gid["query"], 9);
var_dump($toShow);
echo '<Br><br>';

if (strpos($toShow, "'") !== false) {
  die('no quotes allowed');
}

// $mysql = "WHERE category = '$toShow'";

// if ($toShow = 'everything') {
//     $mysql = "";
// }

$mysql = '';

if ($toShow === 'everything') {
  $mysql = "SELECT * FROM items";
} else {
  $mysql = "SELECT * FROM items WHERE category = '". $toShow . "'"; 
}

?>

<table style="">
  <tr>
    <th>item name</th>
    <th>seller id</th>
    <th>price</th>
  </tr>
  <?php 
    /*

    <tr>
    <td>Jill</td>
    <td>Smith</td>
    <td>50</td>
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td>
    <td>94</td>
  </tr>

  */

  $conn = new mysqli('localhost', 'root', '', 'coin');
  $res = $conn->query($mysql);

  if ($res->num_rows > 0) {
    while($row = $res->fetch_assoc()) {
        if ($row['stock'] == 0) continue;
        $link = '<a href="viewitem.php?' . $row['itemId'] . '">' . $row['itemName'] . '</a>';
        echo '
            <tr>
                <td>' . $link . '</td>
                <td>' . $row['sellerId'] . '</td>
                <td>' . $row['amountToCharge'] . '</td>
            </tr>
        ';
    }
}

?>
</table>
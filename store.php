<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>sudocoin</title>
  <html prefix="og: https://ogp.me/ns#">
  <meta property="og:title" content="sudocoin" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="https://i.ytimg.com/vi/if-2M3K1tqk/maxresdefault.jpg" />
  <meta property="og:type" content="website">

  <link rel="icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/Cryptocurrency_Logo.svg/633px-Cryptocurrency_Logo.svg.png">

  <meta name="og:description" content="sudocoin - the online currency">
  <meta name="keywords" content="sudo, coin, crypto, currency">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="theme-color" content="#FFFF00">

  <meta name="twitter:card" content="summary_large_image">
  <meta property="twitter:domain" content="https://coin.sudocode1.xyz/">
  <meta name="twitter:title" content="sudocoin">
  <meta name="twitter:description" content="sudo, coin, crypto, currency">
  <meta name="twitter:image" content="https://i.ytimg.com/vi/if-2M3K1tqk/maxresdefault.jpg">

  <!-- Bootstrap Core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- PHP Modules -->
  <?php require "modules/siteFunctions.php" ?>

</head>

<body style="font-style:Arial">

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href=".">sudocoin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="tools.zip">Download Tools</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="store">Store</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="transactions">Transactions</a>
          </li>

          <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="api">API Doumentation</a>
          </li>

        </ul>
        <form class="d-flex">
          <a href="signup" class="btn btn-outline-success">Signup</a>
        </form>
      </div>
    </div>
  </nav>
  <!-- Navigation bar end -->

  <br>

  <div class="container">
    <!-- Centers content below -->

    <style>
      table,
      th,
      td {
        border: 1px solid black;
        border-collapse: collapse;
      }

      * {
        font-family: Arial, sans-serif
      }
    </style>

    <h2>Sudocoin Online Store</h2>
    <br>

    <?php
    $gid = parse_url($_SERVER['REQUEST_URI']);
    //var_dump($gid);

    if (!array_key_exists('query', $gid)) :
    ?>

      <form action="" method="get">
        <label for="catelist">Category</label>
        <div class="input-group mb-3">
          <select class="form-select" id="catelist" name="category">
            <option value="everything">Everything</option>
            <option value="software">Software</option>
            <option value="exchange">Cash Exchange</option>
            <option value="books">Books (Digital & non Digital)</option>
            <option value="videos">Videos</option>
            <option value="giftcards">Gift Cards</option>
            <option value="inGame">In-game Items</option>
            <option value="other">Other Items</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
      </form>

    <?php
    endif;
    $toShow = substr($gid["query"], 9);
    var_dump($toShow);
    echo '<br><br>';

    if (strpos($toShow, "'") !== false) {
      die('ERR: Invalid Characters');
    }

    // $mysql = "WHERE category = '$toShow'";

    // if ($toShow = 'everything') {
    //     $mysql = "";
    // }

    $mysql = '';
    if ($toShow === 'everything') {
      $mysql = "SELECT * FROM items";
    } else {
      $mysql = "SELECT * FROM items WHERE category = '" . $toShow . "'";
    }
    ?>

    <table class="table">
      <tbody>
        <tr>
          <td>Item Name</td>
          <td>Seller ID</td>
          <td>Price</td>
        </tr>
          <?php

          $conn = new mysqli('localhost', 'root', '', 'coin');
          $res = $conn->query($mysql);

          if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
              if ($row['stock'] == 0) continue;
              $link = '<a href="viewitem?' . $row['itemId'] . '">' . $row['itemName'] . '</a>';
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
      </tbody>
    </table>


  </div>
</body>

</html>
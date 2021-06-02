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

    <meta name="og:description" content="sudocoin - An online currency">
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
            * {
                font-family: Arial, sans-serif
            }
        </style>
        <?php
        $gid = parse_url($_SERVER['REQUEST_URI']);
        //var_dump($gid);

        $conn = new mysqli('', '', '', '');
        $res = $conn->query("SELECT * FROM items WHERE itemId = " . $gid['query']);
        $viewingData = $res->fetch_assoc();

        if ($res->num_rows > 0) {
            if ($viewingData['stock'] == 0) {
                die('ERR: Item is out of stock!');
            };

            echo '<h2>Sudocoin Online Store - <code>' . $viewingData['itemName'] . '</code></h2><br>';
            echo 'Seller ID: <code>' . $viewingData['sellerId'] . '</code><br>';
            echo 'Description: <code>' . $viewingData['descr'] . '</code><br>';
            echo 'Price: <code>' . $viewingData['amountToCharge'] . '</code><br>';
            echo 'Stock: <code>' . $viewingData['stock'] . '</code><br>';
            echo 'Contact Seller: <code>' . $viewingData['contactSeller'] . '</code><br>';
            echo '<br><a href="manageitem?' . $gid['query'] . '">Manage this Item</a><br>';
            echo '<br><i>Note: Stock may be inaccurate as the seller manually updates the information!<br>';
            echo '<span style="color: red"><b>Warning: In order to prevent scams, do NOT send money before contacting the seller!</b></i><br>';

        } else {
            die('ERR: Item does not exist!');
        }
        ?>


    </div>
</body>

</html>
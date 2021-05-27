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

    <link rel="icon" type="image/png"
        href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/Cryptocurrency_Logo.svg/633px-Cryptocurrency_Logo.svg.png">

    <meta name="og:description" content="Create your very own custom Minecraft achievements!">
    <meta name="keywords" content="sudo, coin, crypto, currency">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#FFFF00">

    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="https://coin.sudocode1.xyz/">
    <meta name="twitter:title" content="sudocoin">
    <meta name="twitter:description" content="sudo, coin, crypto, currency">
    <meta name="twitter:image" content="https://i.ytimg.com/vi/if-2M3K1tqk/maxresdefault.jpg">

    <!-- Bootstrap Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- PHP Modules -->
    <?php require "modules/siteFunctions.php" ?>

</head>

<body style="font-style:Arial">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href=".">sudocoin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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

            if (strpos($itemName, "'") !== false || strpos($contactSeller, "'") !== false || strpos($descr, "'") !== false || strpos($category, "'") !== false) {
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

        if (1) :
        ?>

        <h2>Create New Item</h2>
        <br>

        <form method="post">
            <div class="mb-3">
                <label for="i1" class="form-label">Item Name</label>
                <input type="text" class="form-control" id="i1" name="itemName">
            </div>
            <div class="mb-3">
                <label for="i2" class="form-label">Price</label>
                <input type="text" class="form-control" id="i2" name="amountToCharge">
            </div>
            <div class="mb-3">
                <label for="i3" class="form-label">Stock</label>
                <input type="text" class="form-control" id="i3" name="stock">
            </div>
            <div class="mb-3">
                <label for="i4" class="form-label">Contact</label>
                <input type="text" class="form-control" id="i4" name="contactSeller">
            </div>
            <div class="mb-3">
                <label for="i5" class="form-label">Description</label>
                <input type="text" class="form-control" id="i5" name="descr">
            </div>
            <label for="i6" class="form-label">Description</label>
            <div class="input-group mb-3">
                <select class="form-select" id="i6 catelist" name="category">
                    <option value="software">Software</option>
                    <option value="exchange">Cash Exchange</option>
                    <option value="books">Books (Digital & non Digital)</option>
                    <option value="videos">Videos</option>
                    <option value="giftcards">Gift Cards</option>
                    <option value="inGame">In-game Items</option>
                    <option value="other">Other Items</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="i7" class="form-label">Password</label>
                <input type="password" class="form-control" id="i7" name="descr">
            </div>
            <button style="float:left;margin-right:3px" type="submit" class="btn btn-primary">Create Item</button>
        </form>

        <a href="store"><button style="float:left" type="text" class="btn btn-secondary">Cancel</button></a>

        <?php endif; ?>

    </div>
</body>

</html>
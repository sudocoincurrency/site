  
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

    <link rel="icon" type="image/png" href="https://cdn.discordapp.com/attachments/765690365256007692/850035813861163018/Untitled.png">

    <meta name="og:description" content="sudocoin - An online currency">
    <meta name="keywords" content="sudo, coin, crypto, currency">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="">

    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="https://coin.sudocode1.xyz/">
    <meta name="twitter:title" content="sudocoin">
    <meta name="twitter:description" content="sudo, coin, crypto, currency">
    <meta name="twitter:image" content="https://i.ytimg.com/vi/if-2M3K1tqk/maxresdefault.jpg">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


    <!-- Bootstrap Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- PHP Modules -->
    <?php require "modules/siteFunctions.php" ?>

</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="."><img src="https://cdn.discordapp.com/attachments/765690365256007692/850035813861163018/Untitled.png" style="width: 30px"> sudocoin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding-left: 10px">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="tools.zip"><i class="fas fa-download"></i> Download</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="store"><i class="fas fa-store"></i> Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="transactions"><i class="fas fa-money-check-alt"></i> Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="api/"><i class="fas fa-book"></i> API Docs</a>
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

        <h2>Recent Transactions</h2>

        <table class="table">
            <tbody>
                <tr>
                    <td>Transaction ID</td>
                    <td>Amount Transferred</td>
                    <td>Sending User</td>
                    <td>Receiving User</td>
                </tr>
                <?php
                $conn = new mysqli('localhost', 'root', '', 'coin');
                $res = $conn->query("SELECT * FROM transactions");

                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        echo '
                        <tr>
                            <td>' . $row['transactionId'] . '</td>
                            <td>' . $row['amountTransferred'] . '</td>
                            <td>' . $row['sendingUserId'] . '</td>
                            <td>' . $row['recievingUserId'] . '</td>
                        <tr>
                        ';
                    }
                }

                ?>
            </tbody>
        </table>

    </div>
</body>

</html>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- PHP Modules -->
    <?php require "modules/siteFunctions.php" ?>

</head>

<body>

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

        <h2>Statistics & Info</h2>

        <?php
        primaryFunction(); // primary function
        ?>

        <h2>What is sudocoin?</h2>

        <p>
            Sudocoin is an online currency you can mine, getting 0-1 coins per mine (usually decimal), you can mine
            every
            5 seconds.
            You can spend your balance of sudocoin in the shop above. However, you must contact and manually transfer
            sudocoin to the
            owner <i>(I'll probably set up a transaction process on here at some point).</i>
        </p>

        <br>
        <h2>How to use the Mining & Transfer Tools</h2>
        <h4>Requirements</h4>

        <p>
            <li>You will need to install <a href="https://nodejs.org">nodejs v14+</a></li>
            <li>You need and the <a href="tools.zip">mining tools</a>.</li><br>
            Open a Powershell window, or CMD in the directory, and run <code>npm install</code>. Once the process has
            completed, you will require a password. To generate a new password, go to <a href="signup">signup</a>, and
            take
            note of your password. <i>Don't lose your password, otherwise your balance will reset.</i>
            <br><br>
            To start mining run <code>npm mine.js</code>. If you'd like to transfer, run
            <code>npm transfer.js</code>.<br>
            Good luck!
        </p>

    </div>
</body>

</html>
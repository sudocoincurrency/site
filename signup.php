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

    <!-- Bootstrap Core -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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

        <h2>Generated Password & ID</h2>
        <p style="font-size: 18px">Keep these details safe! Losing them will risk your sudocoin balance!</p>
        <br>

        <button class="btn btn-primary" id="loadingpre" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <span>Generating...</span>
        </button>

        <script>
            setTimeout(function() {
                $('#loadingpre').fadeOut('fast'); // fade out loading button
            }, 1000); // <-- time in milliseconds

            setTimeout(function() {
                $('#loadingaft').fadeIn('fast'); // fade in details
            }, 1200); // <-- time in milliseconds
        </script>

        <div id="loadingaft" style="display:none">

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                            <?php error_reporting(0);

                            $arr = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "_", "-", "!", "@");

                            $i = 0;
                            $cap = rand(10, 100);
                            $password = '';

                            while ($i < $cap) {
                                $rand = array_rand($arr);
                                $password = $password . $arr[$rand];
                                $i++;
                            }

                            echo "Your password: <code>$password</code><br>";

                            $pass = base64_encode($password);

                            $conn = new mysqli('', '', '', '');

                            $id = rand(0, 5000000);

                            echo "Your ID: <code>$id</code>";

                            $conn->query("INSERT INTO users (pass, coin, id) VALUES ('$pass', 0, $id)");
                            ?>
                        </div>

                    </div>
                </div>

            </div>

        </div>
</body>

</html>
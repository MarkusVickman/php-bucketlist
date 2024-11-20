<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $sitename . $divider . $title; ?></title>

    <!--ICON font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">

    <!-- CSS-BULMA.IO  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/bulma.css" type="text/css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" sizes="16x16" href="./favicon-mv.ico?ver=2.0">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon-mv.png">
</head>

<body>
    <header>
        <!-- Main navbar-->
        <nav class="navbar is-dark" aria-label="main navigation">
            <div class="container is-fullhd">
                <div class="navbar-brand">
                    <a href="index.php" class="navbar-item" style="font-family: Rubik Wet Paint; font-size: 30px;">MV</a>

                    <!-- Mobile menu button -->
                    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>

                <!-- Main menu -->
                <div id="navbarBasicExample" class="navbar-menu">
                    <div class="navbar-end">
                        <a class="navbar-item" href="index.php">
                        <i class="small material-icons">home</i>
                            STARTSIDA
                        </a>
                        <a class="navbar-item" href="bucket_list.php">
                        <i class="small material-icons">assignment_ind</i>
                            BUCKET LIST
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Hemi</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="public/css/style-main.css">
    <link rel="stylesheet" type="text/css" href="public/css/tiles.css">
    <link rel="stylesheet" type="text/css" href="public/css/style-mobile.css">
    <link rel="icon" href="public/img/icons/logo.svg">

    <script defer type="text/javascript" src="public/js/global-scripts.js"></script>
    <script defer type="text/javascript" src="public/js/search-scripts.js"></script>

</head>

<body>
<div class="main-container">
    <?php
    include("elements/navigation.php");
    ?>

    <main>
        <div class="main-content">

            <div class="search-panel">
                <div class="search-container">
                    <input name="search" type="text" placeholder="Szukaj">
                    <img src="public/img/icons/search-black.svg" alt="search">
                </div>
            </div>

            <section class="section-search">
            </section>

            <div class="search-end">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>

        </div>
    </main>

</div>

<div id='alert' class='fadeOut' <?php if (isset($messages)) echo "style='display:flex'"; ?> >

    <?php if (isset($messages)) {
        foreach ($messages as $message) {
            echo "<h1>$message</h1>";
        }
    }
    ?>

</div>

</body>

</html>
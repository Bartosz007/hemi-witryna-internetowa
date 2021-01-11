<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Hemi</title>
        <meta charset="UTF-8"/>
        <link rel="icon" href="public/img/icons/logo.svg">

        <link rel="stylesheet" type="text/css" href="public/css/style-main.css">
        <link rel="stylesheet" type="text/css" href="public/css/tiles.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-mobile.css">

        <script defer type="text/javascript" src="public/js/global-scripts.js"></script>
        <script defer type="text/javascript" src="public/js/slider.js"></script>

    </head>

    <body>
        <div class="main-container">
            <header class="mobile-header">
                <div>
                    <img src="public/img/icons/menu-button.svg" alt="menu">
                    <div class="logo">
                        <h2>Hemi</h2>
                        <img src="public/img/icons/logo.svg" alt="logo">
                    </div>
                </div>                
            </header>

            <?php
                include('elements/navigation.php');
            ?>

            <main>
                <div class="main-content">


                    <?php

                    if(isset($slider)){
                        echo $slider;
                    }

                    ?>



                    <section class="section-main">

                        <?php

                        if(isset($content)){
                            echo $content;
                        }

                        ?>

                    </section>

                
                </div>
           </main>

        </div>

    </body>

</html>
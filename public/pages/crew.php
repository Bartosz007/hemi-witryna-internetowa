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
    </head>

    <body>
       <div class="main-container">
           <?php
           include("elements/navigation.php");
           ?>
            <main>
                <div class="main-content">

                    <section class="section-crew">

                        <?php if(isset($admins)) {
                            echo $admins;
                        }
                        ?>

                    </section>

                </div>
            </main>

       </div>

       <div id='alert' class='fadeOut' <?php if(isset($messages)) echo "style='display:flex'"; ?> >

           <?php if(isset($messages)){
               foreach ($messages as $message){
                   echo "<h1>$message</h1>";
               }
           }
           ?>

       </div>

    </body>

</html>
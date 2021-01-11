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

                    <section class="section-contact">

                        <div class="fast-contact">
                            <form class="fast-contact-form" method="POST" action="sendForm">
                                <h1>Kontakt</h1>
                                <input name="name" type="text" placeholder="Imię i nazwisko" required>
                                <input name="email" type="email" placeholder="Adres email" required>
                                <input name="title" type="text" placeholder="Tytuł" required>
                                <textarea name="text" cols="30" rows="10" required>Treść</textarea>
                                <button name="submit">WYŚLIJ</button>
                            </form>
                        </div>

                        <div class="contact-info">                  
                            <p>E-mail:</p>
                            <p>kontakt@hemi.pl</p>
                            <p>hemipl@gmail.com</p>
                        </div>

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
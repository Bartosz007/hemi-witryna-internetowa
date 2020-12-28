<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Hemi</title>
        <meta charset="UTF-8"/>
        <link rel="icon" href="public/img/icons/logo.svg">

        <link rel="stylesheet" type="text/css" href="public/css/style-main.css">
        <link rel="stylesheet" type="text/css" href="public/css/tiles.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-mobile.css">

        <script defer type="text/javascript" src="public/js/functions.js"></script>
        <script defer type="text/javascript" src="public/js/global-scripts.js"></script>
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
        
          <nav>
            <img id="close-menu" src="public/img/icons/close.svg" alt="close">
            <div class="nav-content">
                
                <div class="logo">
                    <h2>Hemi</h2>
                    <img src="public/img/icons/logo.svg" alt="logo">
                </div>
                
                <ul>
                    <li><a href="main" >Strona główna</a></li>
                    <li><a href="news" >News</a></li>
                    <li><a href="crew" >Ekipa</a></li>
                    <li><a href="#" >Kontakt</a></li>

                    <?php
                    if(isset($_COOKIE["email"]))
                        echo '<li id="logout"><a href="main" >Wyloguj się</a></li>';
                    else
                        echo '<li><a href="login" >Zaloguj się</a></li>';


                    if(isset($_COOKIE["admin"]) && $_COOKIE["admin"] = true)
                        echo '<li><a href="add" >Dodaj artukuł</a></li>';

                    ?>
                    <li>
                        <a href="search" >Szukaj
                            <img src="public/img/icons/search.svg" alt="search">
                        </a>
                    </li>
                </ul>

            </div>

          </nav>

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
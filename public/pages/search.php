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
                        <li><a href="contact" >Kontakt</a></li>
                        <?php
                        if(isset($_COOKIE["email"]))
                            echo '<li id="logout"><a href="login" >Wyloguj się</a></li>';
                        else
                            echo '<li><a href="login" >Zaloguj się</a></li>';


                        if(isset($_COOKIE["admin"]) && $_COOKIE["admin"] = true)
                            echo '<li><a href="add" >Dodaj artukuł</a></li>';

                        ?>
                        <li>
                            <a href="#" >Szukaj
                                <img src="public/img/icons/search.svg" alt="search">
                            </a>
                        </li>
                    </ul>

                </div>

            </nav>

           <main>
                <div class="main-content">

                    <div class="search-panel">
                        <div class="search-container">
                            <input name="search" type="text" placeholder="Szukaj">
                            <img src="public/img/icons/search-black.svg" alt="search">
                        </div>
                    </div>

                    <section class="section-search">
<!--
                        <div class="news-block-type3">

                            <div class="photo-type3">
                                <img src="public/img/photos/template-photo.jpg" alt="template-photo">
                            </div>
                            <div class="text-type3">
                                <div class="content-type3">
                                        <h5>Playmounth Baarracuda po renowacji</h5>
                                        <p>lorem ipsum, lorem ipsum dolores</p>
                                        <div class="social-buttons">
                                            <div class="left-side">
                                                <img src="public/img/icons/heart.svg" alt="share">
                                                <p class="heart-button">888</p>
                                                <img src="public/img/icons/comment.svg" alt="comment">
                                                <p class="comment-button">99</p>
                                            </div>
                                            <div class="right-side">
                                                <p class="share=button">SHARE</p>
                                                <img src="public/img/icons/share.svg" alt="share">
                                            </div>
                                        </div>
                                    </div>
                            </div>

                        </div>

                        <div class="news-block-type1">
                            <div class="photo-type1">
                                <img src="public/img/photos/template-photo.jpg" alt="template-photo">
                            </div>
                            <div class="text-type1">
                                <div class="content-type1">
                                    <h5>Playmounth Baarracuda po renowacji</h5>
                                    <p>lorem ipsum, lorem ipsum dolores</p>
                                    <div class="social-buttons">
                                        <div class="left-side">
                                            <img src="public/img/icons/heart.svg" alt="share">
                                            <p class="heart-button">888</p>
                                            <img src="public/img/icons/comment.svg" alt="comment">
                                            <p class="comment-button">99</p>
                                        </div>
                                        <div class="right-side">
                                            <p class="share=button">SHARE</p>
                                            <img src="public/img/icons/share.svg" alt="share">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="news-block-type3">

                            <div class="photo-type3">
                                <img src="public/img/photos/template-photo.jpg" alt="template-photo">
                            </div>
                            <div class="text-type3">
                                <div class="content-type3">
                                        <h5>Playmounth Baarracuda po renowacji</h5>
                                        <p>lorem ipsum, lorem ipsum dolores</p>
                                    </div>
                            </div>

                        </div>
-->
                    </section>

                    <div class="search-end">
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                    </div>

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
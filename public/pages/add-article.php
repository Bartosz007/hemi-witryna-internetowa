<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Hemi</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="public/css/style-main.css">
        <link rel="stylesheet" type="text/css" href="public/css/tiles.css">
        <link rel="stylesheet" type="text/css" href="public/css/style-mobile.css">
        <link rel="icon" href="public/img/icons/logo.svg">
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
                    <li><a href="login" >Zaloguj się</a></li>
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

                    <section class="section-add">

                        <form class="add-form" method="post" action="addArticle" enctype="multipart/form-data">
                            <h2>Dodaj arykuł</h2>
                            <input name="title" type="text" maxlength="60" placeholder="Tytuł">
                            <input name="subtitle" type="email" maxlength="120" placeholder="Podtutuł">
                            <textarea name="text" maxlength="2000" >Treść</textarea>
                            <input type="file" id="files" name="files" >
                            <button name="submit">WYŚLIJ</button>
                        </form>
                      <!--
                      <?php if(isset($messages)){
                            foreach ($messages as $message){
                                echo $message;
                            }
                        }
                        ?>
                        -->
                    </section>

                </div>
           </main>

       </div>

    </body>

</html>
<!DOCTYPE html>
<html lang="pl" xmlns="http://www.w3.org/1999/html">
    <head>
        <title>Hemi</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="public/css/style-log.css">
        <link rel="icon" href="public/img/icons/logo.svg">

        <script defer type="text/javascript" src="public/js/login-scripts.js"></script>
        <script defer type="text/javascript" src="public/js/global-scripts.js"></script>

    </head>

    <body>
        <div class="left-container">
            <form class="register-form" enctype="multipart/form-data" method="POST" action="registerForm">
                <h2>Zarejestruj się</h2>
                <input type="text" name="name" placeholder="Imię" required>
                <input type="text" name="surname" placeholder="Nazwisko" required>
                <input type="email" name="email" placeholder="Podaj adres email" required>
                <input type="password" name="password" placeholder="Podaj hasło" required>
                <input type="password" name="repassword" placeholder="Powtórz hasło" required>
                <input type="file" name="avatar" placeholder="Podaj zdjęcie profilowe" required>
                <button type="submit" name="next" class="buttons">
                    <p>DALEJ</p>
                    <img src="public/img/icons/right-arrow.svg" alt="right-arrow">

                </button>
                
                <div class="buttons" id="toLogin">
                    <p>ZALOGUJ SIĘ</p>  
                    <img src="public/img/icons/right-arrow.svg" alt="right-arrow">
                  
                </div>

            </form>
        </div>


        <div class="center-container">
            <a href="main">
                <img src="public/img/icons/big-logo.svg" alt="big-logo">
            </a>
        </div>

        <div class="right-container">
            <form class="login-form" action="loginForm" method="POST">
                <h2>Zaloguj się</h2>
                <input type="email" name="email" placeholder="Adres email">
                <input type="password" name="password" placeholder="Hasło">
                <button type="submit" name="next" class="buttons">
                    <p>DALEJ</p>
                    <img src="public/img/icons/right-arrow.svg" alt="right-arrow">

                </button>
                
                <div class="buttons" id="toRegister">
                    <img src="public/img/icons/left-arrow.svg" alt="left-arrow">
                    <p>ZAREJESTRUJ SIĘ</p>                 
                </div>

            </form>

        </div>

        <?php if(isset($messages)){
            foreach ($messages as $message){
                // echo $message;
                echo "<div id='alert' class='fadeOut'>
                        <h1>
                            $message
                        </h1>
                    </div>";
            }
        }
        ?>

    </body>

</html>
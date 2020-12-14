<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Hemi</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="public/css/style-log.css">
        <link rel="icon" href="public/img/icons/logo.svg">

    </head>

    <body>
        <div class="left-container">
            <form class="register-form">
                <h2>Zarejestruj się</h2>
                <input type="text" name="name" placeholder="Imię">
                <input type="text" name="surname" placeholder="Nazwisko">
                <input type="number" name="age" min="13" max="100" placeholder="Wiek">
                <input type="email" name="email" placeholder="Podaj adres email">
                <input type="password" name="password" placeholder="Podaj hasło">
                <input type="password" name="repassword" placeholder="Powtórz hasło">

                <button name="next" class="next">
                    <p>DALEJ</p>
                    <img src="public/img/icons/right-arrow.svg" alt="right-arrow">

                </button>
                
                <button name="login" class="login">
                    <p>ZALOGUJ SIĘ</p>  
                    <img src="public/img/iconsright-arrow.svg" alt="right-arrow">
                  
                </button>

            </form>
        </div>


        <div class="center-container">
            <a href="main">
                <img src="public/img/icons/big-logo.svg" alt="big-logo">
            </a>
        </div>

        <div class="right-container">

            <form class="login-form" action="loginForm" method="POST">

                <?php if(isset($messages)){
                    foreach ($messages as $message){
                        echo $message;
                    }
                }
                ?>

                <h2>Zaloguj się</h2>
                <input type="email" name="email" placeholder="Adres email">
                <input type="password" name="password" placeholder="Hasło">
                <button name="next" class="next" type="submit">
                    <p>DALEJ</p>
                    <img src="public/img/icons/right-arrow.svg" alt="right-arrow">

                </button>
                
                <button name="register" class="register">
                    <img src="public/img/icons/left-arrow.svg" alt="left-arrow">
                    <p>ZAREJESTRUJ SIĘ</p>                 
                </button>

            </form>

        </div>

    </body>

</html>
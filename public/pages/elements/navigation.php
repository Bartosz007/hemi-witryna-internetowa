
<nav>
    <img id="close-menu" src="public/img/icons/close.svg" alt="close">
    <div class="nav-content">

        <div class="logo">
            <h2>Hemi</h2>
            <img src="public/img/icons/logo.svg" alt="logo">
        </div>

        <ul>
            <li><a href="#" >Strona główna</a></li>
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
                <a href="search" >Szukaj
                    <img src="public/img/icons/search.svg" alt="search">
                </a>
            </li>
        </ul>

    </div>

</nav>
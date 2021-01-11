<div id='alert' class='fadeOut' <?php if(isset($messages)) echo "style='display:flex'"; ?> >

    <?php if(isset($messages)){
        foreach ($messages as $message){
            echo "<h1>$message</h1>";
        }
    }
    ?>

</div>
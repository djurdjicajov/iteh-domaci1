<!DOCTYPE html>
<html>
<head>

    <?php
        include('head.php');
    ?>
     <title>Bioskop</title>

</head>

<?php
setcookie("bioskop", "bioskopcookie", time()+3600);
// postavljen je cookie cije je ime - ime, vrednost - imekukija i datum isteka 1 sat
?>
<?php
if (isset($_COOKIE['bioskop'])) {
// proverava da li je za ime - ime podesena neka vrednost u cookie - ju
echo "Dobrodošo/la! Pogledajte naš repertoar!";
}
else {
echo "Dobrodošao/la!";
}
?>


<body>
    

    <?php
        include('header.php');
    ?>

    <div class="row">
        <div id="uni-logos-wrapper" class="col-12">
            <img id="uni-logos-img" src="img/logo.png" alt="">
        </div>
    </div>
    <div id="welcome-div" class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
           <a href="unosnovogfilma.php" class="btn-round-custom">Unos filma</a>
           <a href="repertoar.php" class="btn-round-custom">Repertoar</a>
           <a href="pretraga.php" class="btn-round-custom">Pretraga filmova</a>
        </div>
        <div class="col-md-2"></div>
    </div>

</body>


</html>

<!DOCTYPE html>

<?php
if (isset($_COOKIE['bioskop'])) {
// proverava da li je za ime - ime podesena neka vrednost u cookie - ju
echo "Pogledajte repertoar!";
}
else {
echo "Dobrodošao/la!";
}
?>
<?php
include "server/konekcija.php";
include "server/domain/zanr.php";
include "server/domain/film.php";

$id=$_GET['id'];

$film=Film::vratiSve($mysqli," where p.id=".$id);
$zanr=Zanr::vratiSve($mysqli);
$poruka = '';

if (isset($_POST['update'])) {
    $naslov = $_POST['naslov'];
    $cena = $_POST['cena'];
    $trajanje = $_POST['trajanje'];
    $datum = $_POST['datum'];
    $zanr = $_POST['zanr'];       

    $mysqli->query("UPDATE film SET naslov='$naslov', cena='$cena', trajanje='$trajanje', datum='$datum',zanr='$zanr' WHERE id=$id");
    header('location: repertoar.php');
}
 ?>

<html>

<head>
    <?php
        include('head.php');
    ?>

    <title>Izmena filma</title>

</head>

<body>
    

    <?php
        include('header.php');
    ?>

    <div class="row">
        <div id="uni-logos-wrapper" class="col-12">
        </div>
    </div>
    <div id="inser-form" class="row form-container">
        <div class="col-md-2"></div>
        
        <div class="col-md-4">

            <form style="padding: 15px;" class="form-horizontal" method="post" action="" role="form">
                <div class="form-group">
                    <label for="naslov">Naslov filma:</label>
                    <input type="text" class="form-control" name="naslov" id="naslov"
                        value="<?php echo $film[0]->naslov; ?>">
                </div>
                <div class="form-group">
                    <label for="cena">Cena karte:</label>
                    <input type="text" class="form-control" name="cena" id="cena"
                        value="<?php echo $film[0]->cena; ?>">
                </div>
                <div class="form-group">
                    <label for="trajanje">Trajanje filma:</label>
                    <input type="text" class="form-control" name="trajanje" id="trajanje"
                        value="<?php echo $film[0]->trajanje; ?>">
                </div>
                <div class="form-group">
                    <label for="datum_izvodjenja">Datum projekcije:</label>
                    <input type="text" class="form-control" name="datum" id="datum"
                        value="<?php echo $film[0]->datum; ?>">
                </div>
                <div class="form-group">
                    <label for="zanr">Žanr filma:</label>
                    <select class="form-control" name="zanr" id="zanr">
                        <?php foreach($zanr as $v): ?>
                        <option value="<?php echo $v->id_zanra;?>">
                            <?php echo $v->naziv_zanra;?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" id="update" name="update" class="btn-round-custom">Sačuvaj izmene</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>
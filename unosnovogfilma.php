<!DOCTYPE html>

<?php
include "server/konekcija.php";
include "server/domain/zanr.php";
include "server/domain/film.php";


$zanr=Zanr::vratiSve($mysqli);

if(isset( $_POST['dodaj'] )){
	
	$naslov=trim($_POST['naslov']);
	$cena=trim($_POST['cena']);
    $trajanje=trim($_POST['trajanje']);
    $datum=trim($_POST['datum']);
    $zanr=$_POST['zanr'];
    
	
	
	$data = Array (
				"naslov" => $naslov, 
				"cena" => $cena,
				"trajanje" => $trajanje,					
				"datum" => $datum,					
                "id_zanra" => $zanr,    
        );	
        
	$film=new Film(null,$naslov,$cena,$trajanje,$datum,$zanr);
		
		$film->ubaciFilm($data,$mysqli);
		
        $film = $film->getPoruka();
        header("Location:unosnovogfilma.php");
        
}
?>

<html>

<head>
    <?php
        include('head.php');
    ?>
    <title>Unos novog filma</title>
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
            <form name="unosFilma" action="" onsubmit="return validateForm()" method="POST" role="form">
                <div class="form-group">
                    <label for="naslov">Naslov filma:</label>
                    <input type="text" class="form-control" name="naslov" id="naslov" placeholder="Unesite naslov filma">
                </div>
                <div class="form-group">
                    <label for="cena">Cena karte:</label>
                    <input type="text" class="form-control" name="cena" id="cena" placeholder="Unesite cenu karte">

                </div>
                <div class="form-group">
                    <label for="trajanje">Trajanje filma:</label>
                    <input type="text" class="form-control" name="trajanje" id="trajanje" placeholder="Unesite trajanje filma">

                </div>

                <div class="form-group">
                    <label for="datum_izvodjenja">Datum izvodjenja filma:</label>
                    <input type="text" class="form-control" name="datum" id="datum" placeholder="Unesite datum prikazivanja filma">

                </div>

                <div class="form-group">
                    <label for="zanr">Zanr filma:</label>

                    <select class="form-control" name="zanr" id="zanr">
                        <?php foreach($zanr as $v): ?>
                        <option value="<?php echo $v->id_zanra;?>">
                            <?php echo $v->naziv_zanra;?>
                        </option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div class="form-group">
                    <button type="submit" id="dodaj" name="dodaj" class="btn-round-custom">Dodaj</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>
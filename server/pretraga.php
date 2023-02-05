<?php

$id = $_GET['id_zanra'];


include "konekcija.php";
include "domain/film.php";
include "domain/zanr.php";

$result=Film::vratiSve($mysqli, " where p.zanr=".$id);

 $nalepi = '<table class="table "><thead><tr><th>Naslov</th><th>Cena</th><th>Trajanje</th><th>Datum</th><th>Vrsta filma</th></thead><tbody>';

 foreach($result as $film){
    $nalepi=$nalepi.'<tr>';
    $nalepi=$nalepi.'<td>'.$film->naslov.'</td>';
    $nalepi=$nalepi.'<td>'.$film->cena.'</td>';
    $nalepi=$nalepi.'<td>'.$film->trajanje.'</td>';
    $nalepi=$nalepi.'<td>'.$film->datum.'</td>';
    $nalepi=$nalepi.'<td>'.$film->zanr->naziv_zanra.'</td>';
    $nalepi=$nalepi.'</tr>';
 }
 
$nalepi=$nalepi.'</tbody></table>';          


echo($nalepi);


 ?>
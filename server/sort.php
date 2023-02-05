<?php  
 //sort.php  
 include "konekcija.php";
 include "domain/film.php";
 include "domain/zanr.php";

 $output = '';  
 $order = $_POST["order"];

 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  

 $uslov = " ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $filmovi = Film::vratiSve($mysqli,$uslov);
 $output .= '  
 <table class="table"> <tbody> 
      <tr>  
        <th><a class="column_sort" id="naslov" data-order="'.$order.'" href="#">Naslov</a></th>
        <th><a class="column_sort" id="cena" data-order="'.$order.'" href="#">Cena</a></th>
        <th><a class="column_sort" id="trajanje" data-order="'.$order.'" href="#">Trajanje</a></th>
        <th><a class="column_sort" id="datum" data-order="'.$order.'" href="#">Datum </a></th>
        <th>Zanr filma</th>
        <th>Opcije</th>     
      </tr>  
 ';  
 foreach($filmovi as $film){
    $output=$output.'<tr>';
    $output=$output.'<td>'.$film->naslov.'</td>';
    $output=$output.'<td>'.$film->cena.'</td>';
    $output=$output.'<td>'.$film->trajanje.'</td>';
    $output=$output.'<td>'.$film->datum_.'</td>';
    $output=$output.'<td>'.$film->zanr->naziva_zanra.'</td>';
    $output=$output.'<td><a href="brisanjefilma.php?id='.$film->id_filma.'">
    <img class="icon-images" src="img/trash.png" width="20px" height="20px"/>
</a>
<a href="izmenafilma.php?id='.$film->id_filma.'">
    <img class="icon-images" src="img/refresh.png" width="20px" height="20px" />
</a></td>';
    $output=$output.'</tr>';
 }
 $output .= '</tbody></table>';  
 echo $output;  
 ?>  
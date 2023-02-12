<!DOCTYPE html>

<?php
include "server/konekcija.php";
include "server/domain/zanr.php";
include "server/domain/film.php";


$order = '';

$filmovi=Film::vratiSve($mysqli,$order);

 ?>


<html>
<head>
    <?php
        include('head.php');
    ?>
    <!-- Stylesheet file -->
<link rel="stylesheet" href="css/style.css">

<!-- jQuery library -->
<script src="js/jquery.min.js"></script>

<!-- SweetAlert plugin to display alert -->
<script src="js/sweetalert.min.js"></script>
        <title>Repertorar</title>
</head>

<body>
    

    <?php
        include('header.php');
    ?>

    <div class="row">
        <div id="uni-logos-wrapper" class="col-12">
        </div>
    </div>
    <div id="find-form" class="row form-container">
        <div class="col-md-2"></div>
        <div class="col-md-8">

                <div class="table-responsive" id="tabela-film">
                    <table class="table" >
                        <thead>
                            <tr>
                                <th><a class="column_sort" id="naslov" data-order="desc" href="#">Naslov</a></th>
                                <th><a class="column_sort" id="cena" data-order="desc" href="#">Cena</a></th>
                                <th><a class="column_sort" id="trajanje" data-order="desc" href="#">Trajanje</a></th>
                                <th><a class="column_sort" id="datum" data-order="desc" href="#">Datum</a></th>
                                <th>Zanr filma</th>
                                <th>Opcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($filmovi as $film):	
                            ?>
                                <tr>
                                    <td><?php echo $film->naslov;?></td>
                                    <td><?php echo $film->cena;?></td>
                                    <td><?php echo $film->trajanje;?></td>
                                    <td><?php echo $film->datum;?></td>
                                    <td><?php echo $film->zanr->naziv_zanra;?></td>
                                    <td><a href="brisanjefilma.php?id=<?php echo $film->id_filma;?>">
                                            <img class="icon-images" src="img/trash.png" width="20px" height="20px"/>
                                        </a>
                                        <a href="izmenafilma.php?id=<?php echo $film->id_filma;?>">
                                            <img class="icon-images" src="img/refresh.png" width="20px" height="20px" />
                                        </a>
                                    </td>

                                </tr>
                        
                            <?php endforeach; ?> 
                    
                        </tbody>
                    </table>
                </div>

            <div id="output" >

        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        </div>
        <div class="col-md-2"></div>
    </div>

<div  id="kalendar"  style="text-align: center;">
    <div id="calendar_div"   >
		
        <?php
require_once 'class.calendar.php';
$phpCalendar = new PHPCalendar ();
?>

<html>
<head>
<link href="izgled.css" type="text/css" rel="stylesheet" />
<title>PHP Calendar</title>
</head>
<body>
<div id="body-overlay"><div><img src="img/loading.gif" width="64px" height="64px"/></div></div>
<div id="calendar-html-output">
<?php
$calendarHTML = $phpCalendar->getCalendarHTML();
echo $calendarHTML;
?>
</div>

<script src="jquery-1.11.2.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$(document).on("click", '.prev', function(event) { 
		var month =  $(this).data("prev-month");
		var year =  $(this).data("prev-year");
		getCalendar(month,year);
	});
	$(document).on("click", '.next', function(event) { 
		var month =  $(this).data("next-month");
		var year =  $(this).data("next-year");
		getCalendar(month,year);
	});
	$(document).on("blur", '#currentYear', function(event) { 
		var month =  $('#currentMonth').text();
		var year = $('#currentYear').text();
		getCalendar(month,year);
	});
});
function getCalendar(month,year){
	$("#body-overlay").show();
	$.ajax({
		url: "calendar-ajax.php",
		type: "POST",
		data:'month='+month+'&year='+year,
		success: function(response){
			setInterval(function() {$("#body-overlay").hide(); },500);
			$("#calendar-html-output").html(response);	
		},
		error: function(){} 
	});
	
}
</script>
</div>
</body>
</html>
	</div>
    
</body>


</html>

<script>  
 $(document).ready(function(){  
      $(document).on('click', '.column_sort', function(){  
           var column_name = $(this).attr("id");  
           var order = $(this).data("order");  
           var arrow = '';  
           
           if(order == 'desc')  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';  
           }  
           else  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';  
           }  
           $.ajax({  
                url:"server/sort.php",  
                method:"POST",  
                data:{column_name:column_name, order:order},  
                success:function(data)  
                {  
                     $('#tabela-film').html(data);  
                     $('#'+column_name+'').append(arrow);  
                }  
           })  
      });  
 });  

 </script> 
 
function myFunction() {
	var x = document.getElementById("myTopnav");
	if (x.className === "topnav") {
		x.className += " responsive";
	} else {
		x.className = "topnav";
	}
}

function validateForm() {
	var naslov = document.forms["unosFilma"]["naslov"].value;
	var cena = document.forms["unosFilma"]["cena"].value;
	var trajanje = document.forms["unosFilma"]["trajanje"].value;
	var datum = document.forms["unosFilm"]["datum"].value;
	if (naslov == "" || cena == "" || trajanje == "" || datum == "") {
		alert("Polja ne smeju biti prazna! ");
		return false;
	}
}

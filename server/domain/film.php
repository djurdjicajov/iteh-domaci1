<?php 

class Film {

	public $id_filma;
	public $naslov;
	public $cena;
	public $trajanje;
    public $datum;
    public $zanr;
	

	
	public function __construct($id_filma,$naslov,$cena,$trajanje,$datum,$zanr)
	{
        $this->id_filma=$id_filma;
        $this->naslov=$naslov;
        $this->cena=$cena;
        $this->trajanje=$trajanje;
        $this->datum=$datum;
        $this->zanr=$zanr;

	}
	
	public function ubaciFilm($data,$db){
		
		if($data['naslov'] === '' || $data['cena'] === '' || $data['trajanje'] === ''|| $data['datum'] === ''){
		$this-> poruka ='Polja moraju biti popunjena';
		
		}else{
		
			$save=$db->query("INSERT INTO film(naslov,cena,trajanje,datum,zanr) VALUES ('".$data['naslov']."','".$data['cena']."','".$data['trajanje']."','".$data['datum']."','".$data['id_zanra']."')") or die($db->error);
			if($save){
				$this -> poruka = 'Uspesno sacuvan film';
			}else{
				$this -> poruka = 'Neuspesno sacuvan film';
			}
		}
	}
	
	public function getPoruka(){
		return $this -> poruka;
	}

	public static function vratiSve($db,$uslov){
		$query="SELECT * FROM film p JOIN zanr v ON p.zanr=v.id_zanra ".$uslov;
		
		$query=trim($query);
        $result=$db->query($query) or die($db->error);
        $array=[];
        while($r = $result->fetch_assoc()){
			$zanr=new Zanr($r['id_zanra'],$r['naziv_zanra']);
			$film=new Film($r['id'],$r['naslov'],$r['cena'],$r['trajanje'],$r['datum'],$zanr);
            array_push($array,$film);
            }
        return $array;
    }

}


?>
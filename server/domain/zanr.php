<?php

class Zanr{
    public $id_zanra;
    public $naziv_zanra;

    public function __construct($id_zanra,$naziv_zanra){
        $this->id_zanra=$id_zanra;
        $this->naziv_zanra=$naziv_zanra;
    }
    
    public static function vratiSve($db){
        $query="SELECT * FROM zanr";
        $result=$db->query($query);
        $array=[];
        while($r = $result->fetch_assoc()){
            $zanr=new Zanr($r['id_zanra'],$r['naziv_zanra']);
            array_push($array,$zanr);
            }
        return $array;

    }

}

?>
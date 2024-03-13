<?php
    include "./Rilevatore.php";

    class RilevatoreDiTemperatura extends Rilevatore{
        private $tipologia;

        public function __constructor($id, $data, $valore, $unita, $codice, $tipologia){
            array_push($this->misurazioni, {"data": $data, "valore": $valore});
            $this->tipologia = $tipologia;
        }
    }
?>
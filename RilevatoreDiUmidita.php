<?php
    include "./Rilevatore.php";

    class RilevatoreDiUmidita extends Rilevatore{
        private $posizione;

        public function __constructor($id, $data, $valore, $unita, $codice, $pos){
            $this->identificativo = $id;
            $this->unitaDiMisura = $unita;
            $this->codiceSeriale = $codice;
            array_push($this->misurazioni, {"data" => $data, "valore" => $valore});
            $this->posizione = $pos;
        }
    }
?>
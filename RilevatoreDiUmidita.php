<?php
require_once "Rilevatore.php";
    class RilevatoreDiUmidita extends Rilevatore implements JsonSerializable{
        private $posizione;

        public function __constructor($id, $unitaDiMisura, $codiceSeriale, $data, $valore){
            parent::__constructor($id, $unitaDiMisura, $codiceSeriale, $data, $valore);
            $this->setposizione("aria");
        }

        public function setPosizione($pos){
            $this->tipologia = $tipologia;
        }

        public function getPosizione(){
            return $this->tipologia;
        }

        public function jsonSerialize(){
            $r = [
                "posizione" => $this->getPosizione(),
            ];
            return $r;
        }
    }
?>
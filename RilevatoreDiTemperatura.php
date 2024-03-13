<?php
require_once "Rilevatore.php";

    class RilevatoreDiTemperatura extends Rilevatore implements JsonSerializable{
        private $tipologia;

        public function __constructor($id, $unitaDiMisura, $codiceSeriale, $data, $valore){
            parent::__constructor($id, $unitaDiMisura, $codiceSeriale, $data, $valore);
            $this->setTipologia("acqua");
        }

        public function setTipologia($tipologia){
            $this->tipologia = $tipologia;
        }

        public function getTipologia(){
            return $this->tipologia;
        }

        public function jsonSerialize(){
            $r = [
                "tipologia" => $this->getTipologia(),
            ];
            return $r;
        }
    }
?>
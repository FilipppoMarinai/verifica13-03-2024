<?php
    class Rilevatore implements JsonSerializable{
        private $identificativo;
        private $misurazioni = array();
        private $unitaDiMisura;
        private $codiceSeriale;

        public function __constructor($id, $data, $valore, $unitaDiMisura, $codiceSeriale){
            $this->identificativo = $id;
            $this->unitaDiMisura = $unitaDiMisura;
            $this->codiceSeriale = $codiceSeriale;
        }

        public function getId(){
            return $this->identificativo;
        }

        public function getMisurazioni(){
            return $this->misurazioni;
        }

        public function setCodice($codice){
            $this->codiceSeriale = $codice;
        }

        public function misurazioniMaggiori($valore){
            $m = array();
            foreach($this->misurazioni as $mis){
                if($mis['valore'] >= $valore){
                    array_push($m, $mis);
                }
            }
            return $m;
        }

        public function jsonSerialize(){
            $r = [
                "identificativo" => $this->identificativo,
                "unita di misura" => $this->unitaDiMisura,
                "codice seriale" => $this->codiceSeriale
            ];
            return $r;
        }
    }
?>
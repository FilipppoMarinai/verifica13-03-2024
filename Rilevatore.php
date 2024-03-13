<?php
    class Rilevatore implements JsonSerializable{
        private $identificativo;
        private $misurazioni = array();
        private $unitaDiMisura;
        private $codiceSeriale;

        public function __constructor($id, $unitaDiMisura, $codiceSeriale, $data, $valore){
            $this->identificativo = $id;
            $this->unitaDiMisura = $unitaDiMisura;
            $this->codiceSeriale = $codiceSeriale;
            $this->addMisurazioni(["data" => $data, "valore" => $valore]);
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

        public function addMisurazioni($arr){
            array_push($this->misurazioni, $arr);
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
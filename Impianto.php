<?php
    require_once("./RilevatoreDiUmidita.php");
    require_once("./RilevatoreDiTemperatura.php");

    class Impianto implements JsonSerializable{
        private $nome;
        private $latitudine;
        private $longitudine;
        private $rilevatori;

        public function __constructor($nome, $lat, $long){
            $this->nome = $nome;
            $this->latitudine = $lat;
            $this->longitudine = $long;
            $r1 = new RilevatoreDiTemperatura("1", "°C", "11h", "22/03/12", "34");
            $r2 = new RilevatoreDiUmidita("1", "%", "12er", "10/06/08", "50");
            // $this->rilevatori = file_get_contents("./rilevatori.txt");
            $this->rilevatori = array($r1, $r2);
        }

        public function getRilevatori($class){
            $r = array();
            foreach($this->rilevatori as $ril){
                if($ril instanceof $class){
                    array_push($r, $ril);
                }
            }
            return $r;
        }

        public function search($id){
            $rilevatore = null;
            foreach($this->rilevatori as $r){
                if($r->getId() == $id){
                    $rilevatore = $r;
                }
            }
            return $rilevatore;
        }

        public function jsonSerialize(){
            $i = [
                "nome" => $this->nome,
                "latitudine" => $this->latitudine,
                "longitudine" => $this->longitudine,
                "rilevatori" => $this->rilevatori
            ];
            return $i;
        }
    }
?>
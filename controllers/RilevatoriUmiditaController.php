<?php
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    require_once './Impianto.php';
    require_once './RilevatoreDiUmidita.php';

    class RilevatoriUmiditaController{
        function index(Request $request, Response $response, $args){
            $impianto = new Impianto("h2", "34", "45");
            $r = $impianto->getRilevatori("RilevatoreDiUmidita");
            $response->getBody()->write();
            return $response;
        }

        function search(Request $request, Response $response, $args){
            $impianto = new Impianto("h2", "34", "45");
            $id = $args['identificativo'];
            $rilevatore = $impianto->search($id);

            if($rilevatore == null){
                $response->getBody()->write(json_encode(["Error" => "rilevatore non trovato"], JSON_PRETTY_PRINT));
                return $response->withHeader("Content-type: application/json")->withStatus(404);
            }
            else{
                $response->getBody()->write(json_encode($rilevatore));
                return $response->withHeader("Content-type: application/json")->withStatus(200);
            }
        }

        function misurazioni(Request $request, Response $response, $args){
            $impianto = new Impianto("h2", "34", "45");
            $id = $args['identificativo'];
            $rilevatore = $impianto->search($id);

            if($rilevatore == null){
                $response->getBody()->write(json_encode(["Error" => "rilevatore non trovato"], JSON_PRETTY_PRINT));
                return $response->withHeader("Content-type: application/json")->withStatus(404);
            }
            else{
                $response->getBody()->write(json_encode($rilevatore->getMisurazioni()));
                return $response->withHeader("Content-type: application/json")->withStatus(200);
            }
        }

        function misurazioniMaggiori(Request $request, Response $response, $args){
            $impianto = new Impianto("h2", "34", "45");
            $id = $args['identificativo'];
            $valoreMinimo = $args['valore_minimo'];
            $rilevatore = $impianto->search($id);

            if($rilevatore == null){
                $response->getBody()->write(json_encode(["Error" => "rilevatore non trovato"], JSON_PRETTY_PRINT));
                return $response->withHeader("Content-type: application/json")->withStatus(404);
            }
            else{
                $response->getBody()->write(json_encode($rilevatore->getMisurazioni()));
                return $response->withHeader("Content-type: application/json")->withStatus(200);
            }
        }

        function create(Request $request, Response $response, $args){
            $body = $request->getBody()->getContents();
            $bodyParser = json_decode($body, true);

            $id = $bodyParser['id'];
            $data = $bodyParser['data'];
            $valore = $bodyParser['valore'];
            $unitaDiMisura = $bodyParser['unitaDiMisura'];
            $codiceSeriale = $bodyParser['codiceSeriale'];
            $posizione= $bodyParser['posizione'];

            $rilevatore = new RilevatoreDiUmidita($id, $data, $valore, $unitaDiMisura, $codiceSeriale, $posizione);
            file_put_contents("../rilevatori.txt", $rilevatore);
        }

        function update(Request $request, Response $response, $args){
            $impianto = new Impianto("h2", "34", "45");
            $body = $request->getBody()->getContents();
            $bodyParser = json_decode($body, true);
            $codiceSeriale = $bodyParser['codiceSeriale'];
            $id = $args['identificativo'];
            $rilevatore = $impianto->search($id);

            if($rilevatore == null){
                $response->getBody()->write(json_encode(["Error" => "rilevatore non trovato"], JSON_PRETTY_PRINT));
                return $response->withHeader("Content-type: application/json")->withStatus(404);
            }
            else{
                $rilevatore->setCodice($codiceSeriale);
                $response->getBody()->write(json_encode(["Result" => true]));
                return $response->withHeader("Content-type: application/json")->withStatus(201);
            }

            $rilevatore = new RilevatoreDiUmidita($id, $data, $valore, $unitaDiMisura, $codiceSeriale);
        }
    }
?>
<?php
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    require_once './Impianto.php';
    require_once './RilevatoreDiTemperatura.php';

    class Impianto{
        function index(Request $request, Response $response, $args) {
            $impianto = new Impianto("h2", "34", "45");
            $response->getBody()->write(json_encode($impianto));
            return $response->withHeader("Content-Type: application/json")->withStatus(200);
        }
    }
?>
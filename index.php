<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/RilevatoriUmiditaController.php';
require __DIR__ . '/controllers/RilevatoriTemperaturaController.php';

require_once("./Impianto.php");

$app = AppFactory::create();

$app->get('/rilevatori_di_umidita', "RilevatoriUmiditaController:index");
$app->get('/rilevatori_di_umidita/{identificativo}', "RilevatoriUmiditaController:search");
$app->get('/rilevatori_di_umidita/{identificativo}/misurazioni', "RilevatoriUmiditaController:misurazioni");
$app->get('/rilevatori_di_umidita/{identificativo}/misurazioni/maggiore_di/{valore_minimo}', "RilevatoriUmiditaController:misurazioniMaggiori");
$app->post('/rilevatori_di_umidita', "RilevatoriUmiditaController:create");
$app->put('/rilevatori_di_umidita/{identificativo}', "RilevatoriUmiditaController:update");

$app->get('/rilevatori_di_temperatura', "RilevatoriTemperaturaController:index");
$app->get('/rilevatori_di_temperatura/{identificativo}', "RilevatoriTemperaturaController:search");
$app->get('/rilevatori_di_temperatura/{identificativo}/misurazioni', "RilevatoriTemperaturaController:misurazioni");
$app->get('/rilevatori_di_temperatura/{identificativo}/misurazioni/maggiore_di/{valore_minimo}', "RilevatoriTemperaturaController:misurazioniMaggiori");
$app->post('/rilevatori_di_temperatura', "RilevatoriTemperaturaController:create");
$app->put('/rilevatori_di_temperatura/{identificativo}', "RilevatoriTemperaturaController:update");

$app->run();

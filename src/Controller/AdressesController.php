<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 30/10/18
 * Time: 21:07
 */

namespace Controller;
use Model\Adresses;
use Model\AdressesManager;
class AdressesController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('map.html.twig');
    }

    public function showAll()
    {
        $MapManager = new AdressesManager($this->pdo);
        $markers = $MapManager->selectAll();


        return $this->twig->render('map.html.twig', ['markers' => $markers]);
    }

    public function testPosition()
    {
        $client = new \GuzzleHttp\Client();
        $cleanpost=urlencode($_POST['GPS']);


            $request = new \GuzzleHttp\Psr7\Request('GET', 'https://api-adresse.data.gouv.fr/search/?q='.$cleanpost .'+Orl\u00e9ans');
            $promise = $client->sendAsync($request)->then(function ($response) {
                $body = $response->getBody();
                $body = json_decode($body);
                var_dump($body);


                $result[0]= $body->features[0]->geometry->coordinates[1];
                $result[1]= $body->features[0]->geometry->coordinates[0];
                var_dump($result[0]);
                var_dump($result[1]);
                exit();
            });
        $promise->wait();

            header('Location:/');
        exit();


    }
}
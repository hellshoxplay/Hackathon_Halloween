<?php
/**
 * Created by PhpStorm.
 * User: wilder17
 * Date: 30/10/18
 * Time: 10:45
 */
namespace Controller;
use Model\CandyManager;
use Model\Candy;

class BonbondexController extends AbstractController
{
    public function showMeAll()
    {
        $CandyManager = new CandyManager($this->pdo);
        $candy = $CandyManager->selectAll();
        return $this->twig->render('Bonbondex/bonbondex.html.twig', ['candy' => $candy]);
    }

    public function showBasket()
    {
        $CandyManager = new CandyManager($this->pdo);
        $candy = $CandyManager->selectBasket();
        return $this->twig->render('candyBasket.html.twig', ['candy' => $candy]);
    }

    public function importBasket()
    {
        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', 'https://fr.openfoodfacts.org/category/bonbons/1.json');
        $promise = $client->sendAsync($request)->then(function ($response) {
            $body = $response->getBody();
            $body = json_decode($body, true, 10);
            foreach ($body['products'] as $key => $value) {
                if (!empty($value['product_name_fr'])) {
                    $result[$key]['name'] = $value['product_name_fr'];
                } else {
                    $result[$key]['name'] = "Pas de nom";
                }
                if (!empty($value['image_url'])) {
                    $result[$key]['picture'] = $value['image_url'];
                } else {
                    $result[$key]['picture'] = "Pas d'image";
                }
            }
            $CandyManager = new CandyManager($this->pdo);
            $CandyManager->import($result);
        });
        $promise->wait();
        $request = new \GuzzleHttp\Psr7\Request('GET', 'https://fr.openfoodfacts.org/category/bonbons/2.json');
        $promise = $client->sendAsync($request)->then(function ($response) {
            $body = $response->getBody();
            $body = json_decode($body, true, 10);
            foreach ($body['products'] as $key => $value) {
                if (!empty($value['product_name_fr'])) {
                    $result[$key]['name'] = $value['product_name_fr'];
                } else {
                    $result[$key]['name'] = "Pas de nom";
                }
                if (!empty($value['image_url'])) {
                    $result[$key]['picture'] = $value['image_url'];
                } else {
                    $result[$key]['picture'] = "Pas d'image";
                }
            }
            $CandyManager = new CandyManager($this->pdo);
            $CandyManager->import($result);
        });
        $promise->wait();
        $request = new \GuzzleHttp\Psr7\Request('GET', 'https://fr.openfoodfacts.org/category/bonbons/3.json');
        $promise = $client->sendAsync($request)->then(function ($response) {
            $body = $response->getBody();
            $body = json_decode($body, true, 10);
            foreach ($body['products'] as $key => $value) {
                if (!empty($value['product_name_fr']) && !empty($value['image_url']) && $value['product_name_fr']!="Pas de nom" && $value['image_url']!="Pas d'image") {
                    $result[$key]['name'] = $value['product_name_fr'];
                    $result[$key]['picture'] = $value['image_url'];
                }
            }
            $CandyManager = new CandyManager($this->pdo);
            $CandyManager->import($result);
        });
        $promise->wait();
        header('Location:/candy/basket');
        exit();
    }
}
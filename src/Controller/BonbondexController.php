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
    const PAGE_TO_IMPORT=3;

    public function showMeAll()
    {
        $CandyManager = new CandyManager($this->pdo);
        $candy = $CandyManager->selectAll();
        return $this->twig->render('Bonbondex/bonbondex.html.twig', ['candy' => $candy]);
    }

    public function showBasket()
    {
        $CandyManager = new CandyManager($this->pdo);
        $candy = $CandyManager->selectBasket($_GET['search'] ?? '');
        return $this->twig->render('candyBasket.html.twig', ['candy' => $candy]);
    }

    public function importBasket()
    {
        $client = new \GuzzleHttp\Client();
        for ($i=1; $i<=self::PAGE_TO_IMPORT; $i++) {
            $request = new \GuzzleHttp\Psr7\Request('GET', 'https://fr.openfoodfacts.org/category/bonbons/'.$i.'.json');
            $promise = $client->sendAsync($request)->then(function ($response) {
                $body = $response->getBody();
                $body = json_decode($body, true, 10);
                foreach ($body['products'] as $key => $value) {
                    if (!empty($value['product_name_fr']) && !empty($value['image_front_small_url'])) {
                        $result[$key]['name'] = $value['product_name_fr'];
                        $result[$key]['picture'] = $value['image_front_small_url'];
                    }
                }
                $CandyManager = new CandyManager($this->pdo);
                $CandyManager->import($result);
            });
            $promise->wait();
        }
        $promise->wait();
        header('Location:/candy/basket');
        exit();
    }

    public function addNewCandies() {
        $idbonbon=rand(1,56);
        $CandyManager = new CandyManager($this->pdo);
        $candyQuantity = $CandyManager->selectOneCandyQuantity($idbonbon);
        $newQuantity=$candyQuantity+1;
        $CandyManager->addCandies($idbonbon,$newQuantity);
        header('Location:/candy/basket');
        exit();
    }

    public function searchCandies()
    {
        $CandyManager = new CandyManager($this->getPdo());
        $candies = $CandyManager->searchCandy($_GET['search'] ?? '');
        return $this->twig->render('Bonbondex/bonbondex.html.twig', [
            'candy' => $candies,
            'search' => $_GET['search'] ?? '',
        ]);
    }
}


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
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

        return $this->twig->render('bonbondex.html.twig', ['candy' => $candy]);

    }
}
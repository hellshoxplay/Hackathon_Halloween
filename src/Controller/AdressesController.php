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
}
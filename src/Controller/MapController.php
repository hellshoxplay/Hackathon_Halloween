<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 30/10/18
 * Time: 21:07
 */

namespace Controller;
use Model\Map;
use Model\MapManager;
class MapController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Map/map.html.twig');
    }
}
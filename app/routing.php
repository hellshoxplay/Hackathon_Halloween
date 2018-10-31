<?php
/**
 * This file hold all routes definitions.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

$routes = [
    'Bonbondex' => [ // Controller
        ['showBasket', '/candy/basket', 'GET'], // action, url, method
        ['importBasket', '/candy/basket/import', 'GET'], // action, url, method
        ['searchCandies', '/bonbondex', 'GET'], // action, url, method
        ['addNewCandies', '/candy/basket/add', 'GET'], // action, url, method
    ],
    'Adresses' => [
        ['showAll', '/', 'GET'],
        ['testPosition', '/test', ['GET','POST']],
    ],
];

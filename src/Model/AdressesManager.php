<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 30/10/18
 * Time: 21:05
 */

namespace Model;
use GuzzleHttp\Client ;

class AdressesManager extends AbstractManager
{
    const TABLE = 'Adresses';

    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    public function selectAll(): array
    {
        return $this->pdo->query('SELECT * FROM ' . $this->table, \PDO::FETCH_CLASS, $this->className)->fetchAll();
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: wilder17
 * Date: 30/10/18
 * Time: 10:46
 */

namespace Model;


class CandyManager extends AbstractManager
{
    public function selectAll(): array
    {
        return $this->pdo->query('SELECT * FROM ' . $this->table, \PDO::FETCH_CLASS, $this->className)->fetchAll();
    }

}
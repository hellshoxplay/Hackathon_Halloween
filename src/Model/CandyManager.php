<?php
/**
 * Created by PhpStorm.
 * User: wilder17
 * Date: 30/10/18
 * Time: 10:46
 */

namespace Model;
use GuzzleHttp\Client ;

class CandyManager extends AbstractManager
{
    const TABLE = 'Bonbondex';

    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    public function selectAll(): array
    {
        return $this->pdo->query('SELECT * FROM ' . $this->table, \PDO::FETCH_CLASS, $this->className)->fetchAll();
    }
    public function searchCandy(?string $search = ''): array
    {
        $searching='';
        if (!empty($search)) {
            $searching = " WHERE name LIKE :search";
        }
        $statement = $this->pdo->prepare('SELECT * FROM ' . $this->table . $searching );
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);

        if (!empty($search)) {
            $statement->bindValue('search', "%$search%", \PDO::PARAM_STR);
        }
        if ($statement->execute()) {
            return $statement->fetchAll();
        }
    }
}
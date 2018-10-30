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

    public function selectBasket(): array
    {
        return $this->pdo->query('SELECT * FROM ' . $this->table . ' WHERE quantity > 0', \PDO::FETCH_CLASS, $this->className)->fetchAll();
    }

    public function import(array $result)
    {
        $statement = $this->pdo->prepare("INSERT INTO $this->table (`name`, `picture`, `quantity`) VALUES (:name, :picture, :quantity)");

        foreach ($result as $key => $value) {
            $statement->bindValue('name', $result[$key]['name'], \PDO::PARAM_STR);
            $statement->bindValue('picture', $result[$key]['picture'], \PDO::PARAM_STR);
            $statement->bindValue('quantity', 0, \PDO::PARAM_STR);
            if ($statement->execute()) {
                $this->pdo->lastInsertId();
            }
        }
    }

    public function selectOneCandyQuantity(int $id)
    {
        return $this->pdo->query('SELECT quantity FROM ' . $this->table . ' WHERE id=' . $id, \PDO::FETCH_COLUMN, 0)->fetchColumn(0);
    }

    public function addCandies(int $id, int $newCandiesQuantity)
    {
        $this->pdo->query("UPDATE $this->table SET quantity=$newCandiesQuantity WHERE id=$id");
    }
}
<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Opinion.php';
require_once __DIR__.'/../models/OpinionUser.php';
require_once __DIR__.'/../models/User.php';

class OpinionRepository extends Repository
{

    public function getOpinion(int $id): ?Opinion
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM opinion WHERE id = :id
        ');
        $stmt->bindParam(':int', $int, PDO::PARAM_INT);
        $stmt->execute();

        $opinion = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($opinion == false) {
            return null;
        }

        return new Opinion(
            $opinion['description'],
            $opinion['created_at']
        );
    }

    public function addOpinion(Opinion $opinion): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO opinions (description, created_at, id_restaurant, id_user)
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $opinion->getDescription(),
            $date->format('Y-m-d'),
            $opinion->getIdRestaurant(),
            $opinion->getIdUser()
        ]);
    }

    public function getOpinions($id): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT o.description as description, o.created_at as created_at,  o.id_user as id_user, 
                   o.id_restaurant as id_restaurant, u.email as email, u.password as password, u.name as name, 
                   u.surname as surname FROM opinions as o INNER JOIN users as u ON o.id_user = u.id_user WHERE id_restaurant = :id;
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $opinions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($opinions as $opinion) {
            $op = new Opinion(
                $opinion['description'],
                $opinion['created_at'],
                $opinion['id_user'],
                $opinion['id_restaurant']
            );
            $us = new User(
                $opinion['email'],
                $opinion['password'],
                $opinion['name'],
                $opinion['surname']
            );
            $res = new OpinionUser(
                $op,
                $us
            );
            $result[] = $res;
        }
        return $result;
    }
}
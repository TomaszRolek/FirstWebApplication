<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Restaurant.php';

class RestaurantRepository extends Repository
{
    public function getRestaurants(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM restaurants;
        ');
        $stmt->execute();
        $opinions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($opinions as $opinion) {
            $result[] = new Restaurant(
                $opinion['id_restaurant'],
                $opinion['name']
            );
        }
        return $result;
    }

    public function getRestaurantDetails($id): Restaurant
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM restaurants WHERE id_restaurant = :id;
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $restaurant = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Restaurant(
            $restaurant['id_restaurant'],
            $restaurant['name']
        );
    }
}


<?php

class Restaurant
{
    private $id_restaurant;
    private $name;

    public function __construct($id_restaurant, $name)
    {
        $this->id_restaurant = $id_restaurant;
        $this->name = $name;
    }

    public function getIdRestaurant()
    {
        return $this->id_restaurant;
    }

    public function setIdRestaurant($id_restaurant): void
    {
        $this->id_restaurant = $id_restaurant;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }



}
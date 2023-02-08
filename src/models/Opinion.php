<?php

class Opinion
{
    private $description;
    private $created_at;

    private $id_user;
    private $id_restaurant;

    public function __construct($description, $created_at, $id_user, $id_restaurant)
    {
        $this->description = $description;
        $this->created_at = $created_at;
        $this->id_user = $id_user;
        $this->id_restaurant = $id_restaurant;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }


    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }


    public function getIdUser()
    {
        return $this->id_user;
    }


    public function setIdUser($id_user): void
    {
        $this->id_user = $id_user;
    }


    public function getIdRestaurant()
    {
        return $this->id_restaurant;
    }

    public function setIdRestaurant($id_restaurant): void
    {
        $this->id_restaurant = $id_restaurant;
    }



}
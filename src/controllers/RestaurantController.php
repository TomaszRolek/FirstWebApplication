<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Restaurant.php';
require_once __DIR__ . '/../repository/RestaurantRepository.php';

class RestaurantController extends AppController
{

    private $messages = [];
    private $restaurantRepository;

    public function __construct()
    {
        parent::__construct();
        $this->restaurantRepository = new RestaurantRepository();
    }

    public function opinions_screen()
    {
        $opinions = $this->opinionRepository->getOpinions();
        $this->render('opinions_screen', ['opinions' => $opinions]);
    }

    public function dashboard()
    {
        try {
            if (!isset($_COOKIE['id_user'])) {
                throw new Exception("You have to login first!");
            }
            $restaurants = $this->restaurantRepository->getRestaurants();
            $this->render('dashboard', ['restaurants' => $restaurants]);
        } catch (Exception $exception) {
            $this->render('login', ['messages' => [$exception->getMessage()]]);
        }
    }

    public function chosen_restaurant_screen($id)
    {
        try {
            if (!isset($_COOKIE['id_user'])) {
                throw new Exception("You have to login first!");
            }
            $restaurants = $this->restaurantRepository->getRestaurants();
            $restaurantDetails = $this->restaurantRepository->getRestaurantDetails($id);
            $this->render('chosen_restaurant_screen', ['restaurants' => $restaurants, 'restaurantDetails' => $restaurantDetails]);
        } catch (Exception $exception) {
            $this->render('login', ['messages' => [$exception->getMessage()]]);
        }
    }


    public function write_opinion($id)
    {
        try {
            if (!isset($_COOKIE['id_user'])) {
                throw new Exception("You have to login first!");
            }
            $this->render('write_opinion', ['id' => $id]);
        } catch (Exception $exception) {
            $this->render('login', ['messages' => [$exception->getMessage()]]);
        }
    }
}
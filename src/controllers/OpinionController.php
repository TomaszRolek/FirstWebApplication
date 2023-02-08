<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Opinion.php';
require_once __DIR__ . '/../repository/OpinionRepository.php';

class OpinionController extends AppController
{

    private $messages = [];
    private $opinionRepository;

    public function __construct()
    {
        parent::__construct();
        $this->opinionRepository = new OpinionRepository();
    }

    public function opinions_screen($id)
    {
        $opinions = $this->opinionRepository->getOpinions($id);
        $this->render('opinions_screen', ['opinions' => $opinions]);
    }

    public function addOpinion()
    {
        $url = "http://$_SERVER[HTTP_HOST]";
        if ($this->isPost()) {
            $opinion = new Opinion($_POST['description'], $_POST['created_at'],  $_COOKIE['id_user'],  $_POST['id_restaurant']);
            $this->opinionRepository->addOpinion($opinion);
//            return $this->render('opinions_screen', ['messages' => $this->message, 'opinions' => $this->opinionRepository->getOpinions()]);
            header("Location: {$url}/opinions_screen/{$opinion->getIdRestaurant()}");
            return;
        }
        return $this->render('write_opinion', ['messages' => $this->message]);
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
}
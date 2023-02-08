<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
    }

    public function chosen_restaurant_screen()
    {
        try{
            if(!isset($_COOKIE['id_user'])) {
                throw new Exception("You have to login first!");
            }
            $this->render('chosen_restaurant_screen');
        }catch (Exception $exception){
            $this->render('login', ['messages' => [$exception->getMessage()]]);
        }
    }
    public function write_opinion()
    {
        try{
            if(!isset($_COOKIE['id_user'])) {
                throw new Exception("You have to login first!");
            }
            $this->render('write_opinion');
        }catch (Exception $exception){
            $this->render('login', ['messages' => [$exception->getMessage()]]);
        }
//        $this->render('write_opinion');
    }

    public function register()
    {
        $this->render('register');
    }
}
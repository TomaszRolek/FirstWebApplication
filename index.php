<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('dashboard', 'RestaurantController');
Routing::get('chosen_restaurant_screen', 'RestaurantController');
Routing::get('opinions_screen', 'OpinionController');
Routing::get('write_opinion', 'RestaurantController');
Routing::get('logout', 'SecurityController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('addOpinion', 'OpinionController');

Routing::run($path);
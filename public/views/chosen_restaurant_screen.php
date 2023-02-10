<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <script src="https://kit.fontawesome.com/52de6e5226.js" crossorigin="anonymous"></script>
    <title>DASHBOARD version2</title>
</head>
<body>
<div class="base-container">
    <?php
    include('top_bar.php');
    ?>
    <main>
        <section class="selected_restaurant">
            <div class ="white_text" style="font-size: 32px"><?= $restaurantDetails->getName(); ?></div>
            <button onclick="location.href='/write_opinion/<?=$restaurantDetails->getIdRestaurant(); ?>'">Add opinion</button>
            <button onclick="location.href='/opinions_screen/<?=$restaurantDetails->getIdRestaurant(); ?>'">See opinions</button>
        </section>
        <section class="choose_restaurant">
            <div class ="white_text">
                Choose restaurant
            </div>
            <div class="white_container">
                <ul>
                    <?php foreach($restaurants as $restaurant): ?>
                        <li>
                            <div>
                                <a href ="../chosen_restaurant_screen/<?= $restaurant->getIdRestaurant(); ?>" class="button"><?= $restaurant->getName(); ?></a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
    </main>
</div>
</body>
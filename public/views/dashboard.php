<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/52de6e5226.js" crossorigin="anonymous"></script>
    <title>DASHBOARD</title>
</head>
<body>
    <div class="base-container">
        <?php
        include('top_bar.php');
        ?>
        <main>
            <section class="chosen_restaurant">
                <div class ="centered-element">
                    No restaurant selected
                </div>
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
                                    <a href ="chosen_restaurant_screen/<?= $restaurant->getIdRestaurant(); ?>" class="button"><?= $restaurant->getName(); ?></a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>
        </main>
    </div>
</body>
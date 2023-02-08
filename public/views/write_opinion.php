<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <script src="https://kit.fontawesome.com/52de6e5226.js" crossorigin="anonymous"></script>
    <title>OPINION</title>
</head>
<body>
<div class="base-container">
    <header>
        <div class="profile">
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="logout">
            Log out
        </div>
    </header>
    <main class="add_opinion">
        <form action="../addOpinion" method="POST">
            <?php
            if(isset($messages)){
                foreach($messages as $message) {
                    echo $message;
                }
            }
            ?>
            <input name="id_restaurant" value="<?php echo $id?>" style="display: none;">
            <textarea name="description" rows="5" placeholder="opinion"></textarea>
            <button type="submit">add</button>
        </form>
    </main>
</div>
</body>
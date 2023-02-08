<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="../public/css/opinions.css">
    <script src="https://kit.fontawesome.com/52de6e5226.js" crossorigin="anonymous"></script>
    <title>OPINIONS</title>
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
    <main>
        <section class = "purple_container">
            <ul>
                <?php foreach($opinions as $opinion): ?>
                <li>
                    <a>
                        <div class="opinion">
                            <div style="display: flex; flex-direction: row; justify-content: space-between; width: 98%; align-items: center;">
                                <div><?= $opinion->getUser()->getName().' '.$opinion->getUser()->getSurname(); ?></div>
                                <div><?= $opinion->getOpinion()->getCreatedAt(); ?></div>
                            </div>
                            <div style="text-align: start; display: flex; justify-content: flex-start; width: 98%">
                                <?= $opinion->getOpinion()->getDescription(); ?>
                            </div>
                        </div>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>
</div>
</body>
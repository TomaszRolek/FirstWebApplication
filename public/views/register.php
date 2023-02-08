<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>REGISTER PAGE</title>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="public/img/logo.svg">
        <div class ="name">
            <p class="custom-style">Eat and rate</p>
        </div>
    </div>
    <div class="login-container">
        <form action="register" method="POST", style="height: 60vh">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            Register Place
            <input name="email" type="text" placeholder="email@email.com">
            <input name="password" type="password" placeholder="password">
            <input name="confirmedPassword" type="password" placeholder="confirm password">
            <input name="name" type="text" placeholder="name">
            <input name="surname" type="text" placeholder="surname">
            <button type="submit">OK</button>
            <button onclick="location.href='/login'" type="button">Already have an account? Sign in</button>
        </form>
    </div>
</div>
</body>
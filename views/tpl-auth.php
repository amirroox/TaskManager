<?php if(isset($_SESSION['user_login'])) header('Location:'.site_url('index.php')); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=site_url('assets/css/style.css')?>">
    <title>Auth</title>
</head>
<body class="auth">
<div class="container right-panel-active">
    <!-- Sign Up -->
    <div class="container__form container--signup">
        <form action="<?=site_url('auth.php?action=signup')?>" method="post" class="form" id="form1">
            <h2 class="form__title">Sign Up</h2>
            <label>
                <input type="text" name="user-up" placeholder="User" class="input" required />
            </label>
            <label>
                <input type="email" name="email-up" placeholder="Email" class="input" required />
            </label>
            <label>
                <input type="password" name="pass-up" placeholder="Password" class="input" required />
            </label>
            <button class="btn">Sign Up</button>
        </form>
    </div>

    <!-- Sign In -->
    <div class="container__form container--signin">
        <form action="<?=site_url('auth.php?action=login')?>" method="post" class="form" id="form2">
            <h2 class="form__title">Sign In</h2>
            <label>
                <input type="email" name="email-in" placeholder="Email" class="input" required />
            </label>
            <label>
                <input type="password" name="pass-in" placeholder="Password" class="input" required />
            </label>
            <a href="#" class="link">Forgot your password?</a>
            <button class="btn">Sign In</button>
        </form>
    </div>

    <!-- Overlay -->
    <div class="container__overlay">
        <div class="overlay">
            <div class="overlay__panel overlay--left">
                <button class="btn" id="signIn">Sign In</button>
            </div>
            <div class="overlay__panel overlay--right">
                <button class="btn" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>
<script src='<?=site_url('assets/vendor/jquery.min.js')?>'></script>
<script src='<?=site_url('assets/vendor/sweetalert2.js')?>'></script>
<script src="<?=site_url('assets/js/script.js')?>"></script>

</body>
</html>
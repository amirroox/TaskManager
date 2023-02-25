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
        <form action="#" class="form" id="form1">
            <h2 class="form__title">Sign Up</h2>
            <label>
                <input type="text" placeholder="User" class="input" />
            </label>
            <label>
                <input type="email" placeholder="Email" class="input" />
            </label>
            <label>
                <input type="password" placeholder="Password" class="input" />
            </label>
            <button class="btn">Sign Up</button>
        </form>
    </div>

    <!-- Sign In -->
    <div class="container__form container--signin">
        <form action="#" class="form" id="form2">
            <h2 class="form__title">Sign In</h2>
            <label>
                <input type="email" placeholder="Email" class="input" />
            </label>
            <label>
                <input type="password" placeholder="Password" class="input" />
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
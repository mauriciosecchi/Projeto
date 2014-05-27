<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>Fullscreen Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="assets/css/reset_login.css">
        <link rel="stylesheet" href="assets/css/supersized_login.css">
        <link rel="stylesheet" href="assets/css/style_login.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>
    
    <body>
        <div id="logo">

        </div>    
        <div class="page-container">
            <h1>Login</h1>
            <form action="index.php" method="post">
                <input type="text" name="username" class="username" placeholder="Usuário">
                <input type="password" name="password" class="password" placeholder="Senha">
                <button type="submit">Entrar</button>
                <div class="error"><span>+</span></div>
            </form>
            <br>
            <!--<a class = "link" href="#">Esqueci minha senha</a>
            <a class = "link" href="#" style="margin-left:65px;" >Cadastre-se</a>-->
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>


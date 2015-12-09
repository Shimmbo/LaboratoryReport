<?php
    session_start();
    if(!empty($_SESSION['login_user']))
        header('Location: index.php');
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Login</title>

        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="container">
                <form class="form-signin">
                    <h2 class="form-signin-heading">Inicio de sesión</h2>
                    <label for="userName" class="sr-only">EMail</label>
                    <input type="text" id="userName" class="form-control" placeholder="Email" required="" autofocus="">
                    <label for="password" class="sr-only">Contraseña</label>
                    <input type="password" id="password" class="form-control" placeholder="Contraseña" required="">
                    <div id="error">
                    </div>
                    <button class="btn btn-primary" type="submit" id="login">Iniciar sesión</button>
                </form>
        </div>
        <script src="vendor/jquery/jquery-1.9.1.min.js"></script>
        <script src="vendor/bootstrap/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() 
            {
                $('#login').click(function()
                {
                    var username=$("#userName").val();
                    var password=$("#password").val();
                    var dataString = 'userName='+username+'&password='+password;
                    if($.trim(username).length>0 && $.trim(password).length>0)
                    {
                        $.ajax({
                            type: "POST",
                            url: "lib/login.php",
                            data: dataString,
                            cache: false,
                            beforeSend: function(){ $("#login").val('Connecting...');},
                            success: function(data){
                                if(data)
                                {
                                    $("body").load("index.php").hide().fadeIn(1500).delay(6000);
                                }
                                else
                                {
                                    $("#login").val('Login')
                                    $("#error").html("<span style='color:#cc0000'>Error:</span> Invalid username or password. ");
                                }
                            }
                        });

                    }
                    return false;
                });

            });
        </script>
    </body>
</html>


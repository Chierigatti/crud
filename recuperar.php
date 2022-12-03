<?php
    session_start();
?>

<?php
    include("config.php");
    if(isset($_POST['ok'])){

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erro[] = "Email Inválido.";
        }

        if(count($erro) == 0){


            $novasenha = substr(md5(time()), 0, 6);
            $nsc = md5(md5($novasenha));
            $email = $mysqli_escape_string($_POST['email']);
            if (1 == 1){

                $sql_code = "UPDATE username SET password = '$nsc' WHERE email = '$email'";
                $sql_query = $mysqli->query($sql_code) or die($mysql->error);

                if($sql_query)
                $erro[] = "Senha Alterada, Verifique Seu Email!";
            }
        }
    }

?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Login - PHP + MySQL</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Recuperar Senha</h3>
                    <div class="box">
                        <form action="" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="email" name="text" class="input is-large" placeholder="Email" autofocus="">
                                </div>
                            </div>
                            <div>
                                <button class="button is-block is-link is-large is-fullwidth" name="ok" value="ok" type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
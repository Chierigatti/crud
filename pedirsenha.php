<?php

    include("config.php");
    if(isset($_POST['ok'])){

        $email = $mysqli->escape_string($_POST['email']);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erro[] = "Email Inválido.";
        }

        if(count($erro) == 0){


            $novasenha = substr(md5(time()), 0, 6);
            $nsc = md5(md5($novasenha));
            $email = $mysqli->escape_string($_POST['email']);
            if (mail($email, "Sua Nova Senha", "Sua Senha Foi Alterada: ".$novasenha)){

                $sql_code = "UPDATE usuario SET senha = '$nsc' WHERE email = '$email'";
                $sql_query = $mysqli->query($sql_code) or die($mysql->error);

                if($sql_query)
                $erro[] = "Senha Alterada, Verifique Seu Email!";
            }
        }
    }

?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
    <form method="POST" action="">
        <input placeholder="Email" name="email" type="email">
        <input name="ok" value="ok" type="submit">
    </form>
</body>
</html>
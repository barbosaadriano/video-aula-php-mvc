<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">


        <title>Aplicativo Teste</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo URL; ?>/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo URL; ?>/css/custom.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php
                @session_start();
                if (isset($_SESSION['usuarioObj'])):
                    $user = $_SESSION['usuarioObj'];
                    if ($user instanceof Usuario) :
                        ?>
                        <div class="alert alert-info">
                            <a href="<?= URL ?>">
                                <i class="glyphicon glyphicon-home"></i>
                            </a>
                            <h3>Usuário logado</h3>
                            <?= $user->getNome() ?>
                            -
                            <?= $user->getLogin() ?>
                            <img src="<?= URL . $user->getThumbnail_path() ?>" width="50" />
                        </div>
                        <?php
                    endif;
                endif;
                ?>
            </div>
        </div>

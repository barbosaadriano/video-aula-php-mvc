<?php

$confg = [
    'URL' => "http://localhost/mvc-php/public/",
    'DEFAULT_CONTROLLER' => "ControleMenu",
    'DEFAULT_METHOD' => "inicio",
    'PATH_UPLOADS' => "./uploads/",
];

/**
 * Para facilitar a configuração local e servidor, 
 * adicione localmente ou no servidor um arquivo chamado config.local.php
 * neste arquivo adicione uma variavel $confl = [] ;
 * e neste array informe as configurações locais
 * ex.:
 * 'HOST' => "localhost",
    'PORT' => 3306,
    'DB_NAME' => "nomeDoSeuBancoAqui",
    'USER_NAME' => "nomeDoSeuUsuarioAqui",
    'PASSWORD' => "suaSenhaAqui",
 * 
 * A Classe Config está habilitada a mesclar os dois arquivos de configuração
 */
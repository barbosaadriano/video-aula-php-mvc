<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Administrador
 */
class Login {

    public function autenticar() {
        $v = new TGui("formularioDeLogin");
        $v->renderizar();
    }

    public function confirmarAutenticacao() {
        $login = isset($_POST['login']) ? $_POST['login'] : FALSE;
        $senha = isset($_POST['senha']) ? $_POST['senha'] : FALSE;
        if (!$login || !$senha) {
            echo 'Login e Senha devem ser informados!';
            return false;
        }
        $du = new DaoUsuario();
        $ret = $du->autenticar($login, $senha);
        if ($ret) {
            session_start();
            $_SESSION['usuario'] = "autenticado";
            header("location: " . URL);
        } else {
            session_start();
            session_destroy();
            header("location: " . URL);
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("location: " . URL);
    }

    public function getThumb() {
        $login = isset($_POST['user']) ? $_POST['user'] : '';
        $du = new DaoUsuario();
        $path = $du->getPath($login);
        header("Content-Type: application/json");
        echo json_encode(array('path' => $path));
    }

}

<?php

class LoginAction implements iAction {

    function execute() {
        $email = $_REQUEST["email"];
        $senha = $_REQUEST["senha"];

        $titulo = "Login";
        if (empty($email) || empty($senha)) {
            $mensagem = "Eh obrigatorio informar o email e a senha.";
            require __DIR__ . LoginAction::LOGIN_PAGE;
            return;
        }

        $usuarioDAO = new UsuarioDAO();
        $login = $usuarioDAO->login($email, $senha);
        if (empty($login)) {
            $mensagem = "Email e/ou senha invalida.";
            require __DIR__ . LoginAction::LOGIN_PAGE;
            return;
        }

        header(LoginAction::LISTAR_USUARIOS_LOCATION);
        die();
    }

}
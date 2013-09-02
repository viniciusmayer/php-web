<?php

class SalvarUsuarioAction extends BaseAction implements iAction {

    function executeImpl() {
        $usuarioDAO = new UsuarioDAO();
        $login = $usuarioDAO->loggedIn();
        $titulo = "Criar usuario";
        
        $email = $_REQUEST["email"];
        if (empty($email)) {
            $mensagem = "Eh obrigatorio informar o email do usuario.";
            require __DIR__ . AtualizarUsuarioAction::CRIAR_USUARIO_PAGE;
            return;
        }

        $senha = $_REQUEST["senha"];
        $confirmarSenha = $_REQUEST["confirmarSenha"];
        if (empty($senha) || empty($confirmarSenha)) {
            $mensagem = "Eh obrigatorio informar uma senha para o usuario.";
            $_REQUEST["email"] = $email;
            require __DIR__ . AtualizarUsuarioAction::CRIAR_USUARIO_PAGE;
            return;
        }

        if (!empty($senha) && !($senha === $confirmarSenha)) {
            $mensagem = "As senhas informadas nao conferem.";
            $_REQUEST["email"] = $email;
            require __DIR__ . AtualizarUsuarioAction::CRIAR_USUARIO_PAGE;
            return;
        }
        
        $usuarioDAO->salvar($email, $senha);

        header(SalvarUsuarioAction::LISTAR_USUARIOS_LOCATION);
        die();
    }

}
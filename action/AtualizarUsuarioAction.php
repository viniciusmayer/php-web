<?php

class AtualizarUsuarioAction extends BaseAction implements iAction {
    
    function executeImpl() {
        $usuarioDAO = new UsuarioDAO();
        $login = $usuarioDAO->loggedIn();
        $titulo = "Editar usuario";
        
        $id = $_REQUEST["id"];
        if (empty($id)) {
            header(AtualizarUsuarioAction::LISTAR_USUARIOS_LOCATION);
            die();
        }

        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->getUsuario($id);
        if (empty($usuario)) {
            header(AtualizarUsuarioAction::LISTAR_USUARIOS_LOCATION);
            die();
        }

        $email = $_REQUEST["email"];
        if (empty($email)) {
            $mensagem = "Eh obrigatorio informar o email do usuario.";
            require __DIR__ . AtualizarUsuarioAction::EDITAR_USUARIO_PAGE;
            return;
        }

        $senha = $_REQUEST["senha"];
        $confirmarSenha = $_REQUEST["confirmarSenha"];
        if (!empty($senha) && !($senha === $confirmarSenha)) {
            $mensagem = "As senhas informadas nao conferem.";
            require __DIR__ . AtualizarUsuarioAction::EDITAR_USUARIO_PAGE;
            return;
        }

        if (!empty($senha) && ($senha === $confirmarSenha)) {
            $usuarioDAO->atualizar($id, $email, $senha);
        } else {
            $usuarioDAO->atualizar($id, $email);
        }

        header(AtualizarUsuarioAction::LISTAR_USUARIOS_LOCATION);
        die();
    }

}
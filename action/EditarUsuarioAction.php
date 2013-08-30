<?php

class EditarUsuarioAction implements iAction {

    function execute() {
        $id = $_REQUEST["id"];
        if (empty($id)) {
            $mensagem = "Eh obrigatorio informar o id do usuario.";
            require __DIR__ . EditarUsuarioAction::EDITAR_USUARIO_PAGE;
            return;
        }

        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->getUsuario($id);
        if (empty($usuario)) {
            $mensagem = "Usuario nao encontrado.";
            require __DIR__ . EditarUsuarioAction::EDITAR_USUARIO_PAGE;
            return;
        }

        $titulo = "Editar usuario";
        require __DIR__ . EditarUsuarioAction::EDITAR_USUARIO_PAGE;
    }

}
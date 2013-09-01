<?php

class DeletarUsuarioAction extends BaseAction implements iAction {
    
    function executeImpl() {
        $id = $_REQUEST["id"];
        if (empty($id)) {
            $mensagem = "Eh obrigatorio informar o id do usuario.";
            require __DIR__ . ListarUsuariosAction::LISTAR_USUARIOS_PAGE;
            return;
        }

        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->getUsuario($id);
        if (empty($usuario)) {
            $mensagem = "Usuario nao encontrado.";
            require __DIR__ . ListarUsuariosAction::LISTAR_USUARIOS_PAGE;
            return;
        }

        $usuarioDAO->deletar($usuario);

        header(LoginAction::LISTAR_USUARIOS_LOCATION);
        die();
    }

}
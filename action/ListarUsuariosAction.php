<?php

class ListarUsuariosAction implements iAction {

    function execute() {
        $usuarioDAO = new UsuarioDAO();
        $usuarios = $usuarioDAO->getUsuarios();

        if (empty($usuarios)) {
            $mensagem = "Nenhum usuario encontrado.";
        }

        $titulo = "Listar usuarios";
        require __DIR__ . ListarUsuariosAction::LISTAR_USUARIOS_PAGE;
        return;
    }

}
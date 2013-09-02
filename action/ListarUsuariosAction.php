<?php

class ListarUsuariosAction extends BaseAction implements iAction {
    
    function executeImpl() {
        $usuarioDAO = new UsuarioDAO();
        $usuarios = $usuarioDAO->getUsuarios();

        if (empty($usuarios)) {
            $mensagem = "Nenhum usuario encontrado.";
        }

        $login = $usuarioDAO->loggedIn();
        $titulo = "Listar usuarios";
        require __DIR__ . ListarUsuariosAction::LISTAR_USUARIOS_PAGE;
        return;
    }

}
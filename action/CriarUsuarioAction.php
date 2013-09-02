<?php

class CriarUsuarioAction extends BaseAction implements iAction {
    
    function executeImpl() {
        $usuarioDAO = new UsuarioDAO();
        $login = $usuarioDAO->loggedIn();
        $titulo = "Criar usuario";
        require __DIR__ . EditarUsuarioAction::CRIAR_USUARIO_PAGE;
    }
}
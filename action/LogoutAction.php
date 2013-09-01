<?php

class LogoutAction implements iAction {

    function execute() {
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->logout();
        header(LogoutAction::INDEX_LOCATION);
        die();
    }

}
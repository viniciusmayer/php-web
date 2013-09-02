<?php

abstract class BaseAction {

    function sessionIsValid() {
        $usuarioDAO = new UsuarioDAO();
        $loggedIn = $usuarioDAO->loggedIn();
        return !empty($loggedIn);
    }
    
    function invalidateSession() {
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->logout();
        header(LogoutAction::INDEX_LOCATION);
        die();
    }

    abstract function executeImpl();

    final function execute() {
        if (!$this->sessionIsValid()) {
            $this->invalidateSession();
        }
        $this->executeImpl();
    }

}
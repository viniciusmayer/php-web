<?php

abstract class BaseAction {

    function invalidateSession() {
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->logout();
        header(LogoutAction::INDEX_LOCATION);
        die();
    }
    
    function sessionIsValid() {
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->loggedIn();
    }    
    
    abstract function executeImpl();
    
    final function execute(){
        if (!$this->sessionIsValid()){
            $this->invalidateSession();
        }
        $this->executeImpl();
    }
    
}
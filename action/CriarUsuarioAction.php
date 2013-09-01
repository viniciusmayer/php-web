<?php

class CriarUsuarioAction extends BaseAction implements iAction {
    
    function executeImpl() {
        $titulo = "Criar usuario";
        require __DIR__ . EditarUsuarioAction::CRIAR_USUARIO_PAGE;
    }
}
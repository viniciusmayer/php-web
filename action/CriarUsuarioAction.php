<?php

class CriarUsuarioAction implements iAction {

    function execute() {
        $titulo = "Criar usuario";
        require __DIR__ . EditarUsuarioAction::CRIAR_USUARIO_PAGE;
    }

}
<?php

interface iAction {

    const INDEX_LOCATION = "Location: index.php";
    const LISTAR_USUARIOS_LOCATION = "Location: index.php?page=listarUsuarios";
    
    const LISTAR_USUARIOS_PAGE = "/../view/listarUsuarios.phtml";
    const EDITAR_USUARIO_PAGE = "/../view/editarUsuario.phtml";
    const CRIAR_USUARIO_PAGE = "/../view/criarUsuario.phtml";
    const LOGIN_PAGE = "/../view/login.phtml";

}
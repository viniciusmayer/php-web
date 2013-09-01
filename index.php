<?php

final class Index {

    function init() {
        error_reporting(E_ERROR | E_STRICT);
        //mb_internal_encoding('UTF-8');
        spl_autoload_register(array($this, 'loadClass'));
    }

    function loadClass($name) {
        $classes = array(
            'UsuarioDAO' => 'dao/UsuarioDAO.php',
            'Usuario' => 'model/Usuario.php',
            'iAction' => 'action/iAction.php',
            'BaseAction' => 'action/BaseAction.php',
            'LoginAction' => 'action/LoginAction.php',
            'LogoutAction' => 'action/LogoutAction.php',
            'EditarUsuarioAction' => 'action/EditarUsuarioAction.php',
            'AtualizarUsuarioAction' => 'action/AtualizarUsuarioAction.php',
            'CriarUsuarioAction' => 'action/CriarUsuarioAction.php',
            'SalvarUsuarioAction' => 'action/SalvarUsuarioAction.php',
            'DeletarUsuarioAction' => 'action/DeletarUsuarioAction.php',
            'ListarUsuariosAction' => 'action/ListarUsuariosAction.php',
        );
        if (!array_key_exists($name, $classes)) {
            die('Class "' . $name . '" not found.');
        }
        require_once $classes[$name];
    }

    function run() {
        $page = $_REQUEST["page"];
        switch ($page) {
            case "login":
                $action = new LoginAction();
                $action->execute();
                break;
            case "listarUsuarios":
                $action = new ListarUsuariosAction();
                $action->execute();
                break;
            case "logout":
                $action = new LogoutAction();
                $action->execute();
                break;
            case "editarUsuario":
                $action = new EditarUsuarioAction();
                $action->execute();
                break;
            case "atualizarUsuario":
                $action = new AtualizarUsuarioAction();
                $action->execute();
                break;
            case "criarUsuario":
                $action = new CriarUsuarioAction();
                $action->execute();
                break;
            case "salvarUsuario":
                $action = new SalvarUsuarioAction();
                $action->execute();
                break;
            case "deletarUsuario":
                $action = new DeletarUsuarioAction();
                $action->execute();
                break;
            default:
                $titulo = "Login";
                require __DIR__ . "/view/login.phtml";
                break;
        }
    }

}

$index = new Index();
$index->init();
$index->run();
<?php

class UsuarioDAO {

    function __construct() {
        session_start();
        $usuarios = $_SESSION["usuarios"];
        if (empty($usuarios)) {
            $usuarios = array();
            $admin = new Usuario(1, "admin", "4dm1n");
            $admin->setAdmin(true);
            array_push($usuarios, $admin);
            $_SESSION["usuarios"] = $usuarios;
        }
    }

    function deletar($usuario) {
        $usuarios = $_SESSION["usuarios"];
        foreach (array_keys($usuarios, $usuario) as $u) {
            unset($usuarios[$u]);
        }
        $_SESSION["usuarios"] = $usuarios;
    }

    function salvar($email, $senha) {
        $usuarios = $_SESSION["usuarios"];
        $id = 0;
        foreach ($usuarios as $usuario) {
            if ($usuario->getId() > $id) {
                $id = $usuario->getId();
            }
        }
        $id += 1;
        array_push($usuarios, new Usuario($id, $email, $senha));
        $_SESSION["usuarios"] = $usuarios;
    }

    function atualizar($id, $email, $senha = null) {
        $usuarios = $_SESSION["usuarios"];
        foreach ($usuarios as $usuario) {
            if ($usuario->getId() == $id) {
                $usuario->setEmail($email);
                if (!empty($senha)) {
                    $usuario->setSenha($senha);
                }
            }
        }
        $_SESSION["usuarios"] = $usuarios;
    }

    function logout(){
        \session_destroy();
        return;
    }
    
    function login($email, $senha) {
        $usuarios = $_SESSION["usuarios"];
        foreach ($usuarios as $usuario) {
            if ($usuario->getEmail() === $email) {
                if ($usuario->getSenha() === $senha) {
                    $_SESSION["login"] = $usuario;
                    return $usuario;
                }
            }
        }
    }
    
    function loggedIn() {
        return !empty($_SESSION["login"]);
    }
    
    function getUsuario($id) {
        $usuarios = $_SESSION["usuarios"];
        foreach ($usuarios as $usuario) {
            if ($usuario->getId() == $id) {
                return $usuario;
            }
        }
    }

    function getUsuarios() {
        $usuarios = array();
        $usuarios_session = $_SESSION["usuarios"];
        foreach ($usuarios_session as $usuario) {
            if (!$usuario->getAdmin()) {
                array_push($usuarios, $usuario);
            }
        }
        return $usuarios;
    }

}
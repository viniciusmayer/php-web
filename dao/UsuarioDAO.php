<?php

class UsuarioDAO {

    function __construct() {
        $usuarios = $_SESSION["usuarios"];
        if (empty($usuarios)) {
            $usuarios = array();
            for ($j = 1; $j <= 10; $j+=1) {
                array_push($usuarios, new Usuario($j, "email " . $j, "senha " . $j));
            }
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

    function login($email, $senha) {
        $usuarios = $_SESSION["usuarios"];
        foreach ($usuarios as $usuario) {
            if ($usuario->getEmail() === $email) {
                if ($usuario->getSenha() === $senha) {
                    return $usuario;
                }
            }
        }
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
        return $_SESSION["usuarios"];
    }

}
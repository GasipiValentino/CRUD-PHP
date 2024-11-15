<?php

class Autenticacion
{
    public function log_out(): void
    {
        if (isset($_SESSION['login'])) {
            unset($_SESSION['login']);
        }
        session_destroy();
    }

    public function log_in(string $usuario, string $pass): bool
    {
        $usuario = (new Usuario())->usuario_x_usuario($usuario);
        if ($usuario) {
            if (password_verify($pass, $usuario->getPassword())) {
                $datosLogin['username'] = $usuario->getNombreUsuario();
                $datosLogin['id'] = $usuario->getId();
                $datosLogin['roles'] = $usuario->getRoles();
                $datosLogin['usuario'] = $usuario->getUsuario();

                $_SESSION['login'] = $datosLogin;
                return true;
            }
        }
        return false;
    }

    public function verify()
    {
        if (isset($_SESSION['login'])) {
            return true;
        } else {
            header('Location: ../index.php?sec=login');
        }
    }
}

?>
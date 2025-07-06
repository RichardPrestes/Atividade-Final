<?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] === false) {
    header('location:formLogin.php?pagina=formLogin&erroLogin=naoLogado');
    exit;
}

if ($_SESSION['perfil'] !== 'administrador') {
    header('location:formLogin.php?pagina=formLogin&erroLogin=acessoProibido');
    exit;
}
?>

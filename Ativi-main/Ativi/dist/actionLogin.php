<?php
include("conexaoBD.php");
session_start();

$emailUsuario = mysqli_real_escape_string($conn, $_POST['emailUsuario']);
$senhaUsuario = mysqli_real_escape_string($conn, $_POST['senhaUsuario']);

$buscarLogin  = "SELECT u.*, p.nomePerfil
                 FROM usuarios u
                 INNER JOIN perfis p ON u.idPerfil = p.idPerfil
                 WHERE u.emailUsuario = '{$emailUsuario}'
                 AND u.senhaUsuario = md5('{$senhaUsuario}')";

$efetuarLogin = mysqli_query($conn, $buscarLogin);

if($registro = mysqli_fetch_assoc($efetuarLogin)){
    $_SESSION['idUsuario']    = $registro['idUsuario'];
    $_SESSION['perfil']       = $registro['nomePerfil']; // 'cliente' ou 'administrador'
    $_SESSION['emailUsuario'] = $registro['emailUsuario'];
    $_SESSION['nomeUsuario']  = $registro['nomeUsuario'];
    $_SESSION['logado']       = true;

    header('location:index.php?pagina=index');
} else {
    header('location:formLogin.php?pagina=formLogin&erroLogin=dadosInvalidos');
}
?>

<?php
session_start();
include_once('biblioteca.php');

if(!isset($_SESSION['id_util'])){ //apaga somente se tiver sessão ativa
    header("Location: login.php");
    exit();
}

$link = conectarBD();
$id_util = $_SESSION['id_util'];

$sql_limpar_posts = 
    "DELETE FROM publicacao
    WHERE num_util_fk = '$id_util'"; //primeiro: limpa as publicacoes
mysqli_query($link, $sql_limpar_posts);

$sql_eliminar_user =
    "DELETE FROM utilizador
    WHERE num_util = '$id_util'"; //segundo: exclui o user
mysqli_query($link, $sql_eliminar_user);

if(mysqli_query($link, $sql_eliminar_user)){
    session_unset();
    session_destroy();

    echo "<script>alert('Conta e publicações eliminadas com sucesso. Até a próxima!');</script>";
    header("Refresh: 0; URL=index.php");
} else {
    echo "<script>alert('Erro ao excluir a conta: ". mysqli_error($link) . " ');</script>";
    header("Refresh: 0; URL=conta_utilizador.php");
}

mysqli_close($link);

?>
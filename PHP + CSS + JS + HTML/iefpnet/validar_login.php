<?php
session_start();
include('biblioteca.php');

$link = conectarBD();

$nick = $_POST['nickname']; //recebe dados do formulario
$pass = $_POST['password'];

$sql = "SELECT * FROM utilizador WHERE nickname = '$nick' AND password = '$pass'"; //conexao bd
$resultado = mysqli_query($link, $sql);

if (mysqli_num_rows($resultado) == 1){ //user found
    $dados = mysqli_fetch_assoc($resultado);

    $_SESSION['id_util'] = $dados['num_util']; //usuario e senha guardados para validacao
    $_SESSION['nome_util'] = $dados['pNome'];

    header("Location: index_login.php");
} else {
    echo "<script>alert('Nickname ou Password inválidos!');</script>";
    header("Refresh: 0; URL=login.php");
}

mysqli_close($link);

?>
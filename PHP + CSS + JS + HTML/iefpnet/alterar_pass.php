<?php
session_start();
include('biblioteca.php');

if(!isset($_SESSION['id_util'])){
    header("Location: login.php");
    exit();
}

$link = conectarBD();
$id_logado = $_SESSION['id_util'];

// Receber os nomes exatos do formulário
$pass_antiga = $_POST['pass_antiga'];
$nova_pass   = $_POST['n_pass'];
$conf_pass   = $_POST['c_pass'];

// 1. Verificar se a nova e a confirmação são iguais
if($nova_pass !== $conf_pass) {
    echo "<script>alert('As novas passwords não coincidem!'); window.history.back();</script>";
    exit();
}

// 2. Verificar se a password antiga está correta na BD
$res = mysqli_query($link, "SELECT password FROM utilizador WHERE num_util = '$id_logado'");
$dados = mysqli_fetch_assoc($res);

if($dados['password'] !== $pass_antiga) {
    echo "<script>alert('A password atual está incorreta!'); window.history.back();</script>";
} else {
    // 3. Atualizar
    $sql = "UPDATE utilizador SET password = '$nova_pass' WHERE num_util = '$id_logado'";
    if(mysqli_query($link, $sql)) {
        echo "<script>alert('Password atualizada com sucesso!'); window.location.href='conta_utilizador.php';</script>";
    } else {
        echo "Erro: " . mysqli_error($link);
    }
}
mysqli_close($link);
?>
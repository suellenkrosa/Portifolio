<?php
session_start();
include('biblioteca.php');

if(!isset($_SESSION['id_util'])){
    header("Location: login.php");
    exit();
}

$link = conectarBD();

$id_util = $_SESSION['id_util']; //recebe novos dados

$novo_email = $_POST['email'];
$nova_localidade = $_POST['localidade'];
$novo_telefone = $_POST['telefone'];

$sql = "UPDATE utilizador
        SET email = '$novo_email',
            localidade = '$nova_localidade',
            telefone = '$novo_telefone'
            WHERE num_util = '$id_util'"; //update

if(mysqli_query($link, $sql)){ //caso hajam erros ou os dados sejam submetidos corretamente
    echo "<script>alert('Dados atualizados com sucesso!');</script>";
} else{
    echo "<script>alert('Erro ao atualizar: " . mysqli_error($link) . "');</script>";
}

header("Refresh: 0; URL=conta_utilizador.php");

mysqli_close($link);
?>
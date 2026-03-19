<?php
session_start();
include_once('biblioteca.php');

if(!isset($_SESSION['id_util'])){
    header("Location: login.php");
    exit();
}

$link = conectarBD();

$id_util = $_SESSION['id_util'];

$tipo = (int)$_POST['tipo_pub']; // virou um número inteiro para bater certo com o ID da outra tabela

$conteudo = mysqli_real_escape_string($link, $_POST['conteudo']);
$data_atual = date('Y-m-d'); 
$hora_atual = date('H:i:s'); 

// Lógica de Upload para Imagem
if($tipo === 2 && isset($_FILES['ficheiro_imagem']) && $_FILES['ficheiro_imagem']['error'] == 0){
    $pasta = "imagens/img_user/";

    if(!file_exists($pasta)) {
        mkdir($pasta, 0777, true);
    }

    $nomeOriginal = $_FILES['ficheiro_imagem']['name'];
    $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));
    $novoNome = uniqid().".".$extensao; 
    $caminhoFinal = $pasta . $novoNome;

    if (move_uploaded_file($_FILES['ficheiro_imagem']['tmp_name'], $caminhoFinal)){
        $conteudo = $caminhoFinal; 
    }
}

// QUERY FINAL
$sql = "INSERT INTO publicacao (data, hora, cont_publi, num_util_fk, id_fk) 
        VALUES ('$data_atual', '$hora_atual', '$conteudo', '$id_util', '$tipo')";

if(mysqli_query($link, $sql)){
    echo "<script>alert('Publicado com sucesso!'); window.location.href='index_login.php';</script>";
} else {
    echo "Erro técnico: " . mysqli_error($link);
}

mysqli_close($link);
?>
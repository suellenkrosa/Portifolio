<?php
session_start();
include('biblioteca.php');

if(!isset($_SESSION['id_util'])){
    header("Location: login.php");
    exit();
}

$link = conectarBD();
$id_logado = $_SESSION['id_util'];

if(isset($_GET['id'])){
    $id_pub = mysqli_real_escape_string($link, $_GET['id']);

    //1. Antes de apagar, busca o caminho da imagem (se existir)
    $res = mysqli_query($link, "SELECT cont_publi, id_fk FROM publicacao WHERE id = '$id_pub' AND num_util_fk = '$id_logado'");
    $dados = mysqli_fetch_assoc($res);

    if($dados) {
        //2. Se for uma imagem (tipo 2), tenta apagar o ficheiro da pasta
        if($dados['id_fk'] == 2) {
            $caminho_ficheiro = $dados['cont_publi'];
            if(file_exists($caminho_ficheiro)) {
                unlink($caminho_ficheiro); // Apaga o ficheiro físico
            }
        }

        //3. Agora sim, apaga o registo na base de dados
        $sql = "DELETE FROM publicacao WHERE id = '$id_pub' AND num_util_fk = '$id_logado'";

        if(mysqli_query($link, $sql)){
            echo "<script>alert('Publicação removida com sucesso!'); window.location.href='minhas_pubs.php';</script>";
        } else {
            echo "Erro ao eliminar: " . mysqli_error($link);
        }
    }
} else {
    header("Location: minhas_pubs.php");
}

mysqli_close($link);
?>
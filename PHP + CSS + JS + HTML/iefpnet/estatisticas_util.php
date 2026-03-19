<?php
$id_logado = $_SESSION['id_util'];
$nome_utilizador = $_SESSION['nome_util'];

$res_total = mysqli_query($link, "SELECT COUNT(*) as total FROM publicacao WHERE num_util_fk = '$id_logado'"); //conta o total de posts do utilizador
$dados_total = mysqli_fetch_assoc($res_total);
$total_posts = $dados_total['total'];

$res_texto = mysqli_query($link, "SELECT COUNT(*) as total FROM publicacao WHERE num_util_fk = '$id_logado' AND id_fk=1"); //conta posts de texto
$dados_texto = mysqli_fetch_assoc($res_texto);
$total_texto = $dados_texto['total'];

$res_img = mysqli_query($link, "SELECT COUNT(*) as total FROM publicacao WHERE num_util_fk = '$id_logado' AND id_fk = 2");//conta posts de imagem
$dados_img = mysqli_fetch_assoc($res_img);
$total_img = $dados_img['total'];

?>
<?php
session_start();
include_once('biblioteca.php');

if(!isset($_SESSION['id_util'])){ //verfica se o id_util nao existe
  echo "<script>alert('Acesso negado! Por favor, efetue login.');</script>";
  header("Refresh: 0; URL=login.php");
  exit(); //como break
}

$link = conectarBD();//conexao bd para colocar as estatisticas no home do utilizador
include('estatisticas_util.php');

$nome_utilizador = $_SESSION['nome_util']; //aqui é o login
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IEFP NET - Bem-Vindo(a)</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Header -->
  <header>
    <h1>IEFP <span class="thin">NET</span></h1>
  </header>

  <nav>
    <a href="index_login.php">Home</a>
    <a href="nova_pub.php">Nova Publicação</a>
    <a href="minhas_pubs.php">Minhas Publicações</a>
    <a href="publicacoes_dia.php">Publicações do dia</a>
    <a href="conta_utilizador.php">Conta de Utilizador</a>
    <a href="logout.php" style="color: #ffb3b3;">Sair</a>
  </nav>

  <!-- Content Container -->
<div class="flex-container">
    <main class="main">
        <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?q=80&w=1000" alt="Carreira" class="hero-image">
        
        <div class="hero-content">
            <h1>Olá, <strong><?php echo $nome_utilizador; ?></strong>!</h1>
            <p>Você possui <strong><?php echo $total_posts; ?></strong> posts: <br>
            <strong><?php echo $total_texto; ?></strong> em texto || 
            <strong><?php echo $total_img; ?></strong> em imagens
            </p>
            <br>
        </div>
    </main>
</div>

  <!-- Footer -->
  <footer>
    <p>Todos os direitos reservados a IEFP, I.P.</p>
  </footer>

</body>
</html>
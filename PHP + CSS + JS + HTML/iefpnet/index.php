<?php
  // 1. Ligação à Base de Dados
  session_start();
  include('biblioteca.php');

  $link = conectarBD();

  if (!$link) {
    die("Erro de ligação: " . mysqli_connect_error());
    }

    // 2. Contar Utilizadores
    $res_util = mysqli_query($link, "SELECT COUNT(*) as total FROM utilizador");
    $dados_util = mysqli_fetch_assoc($res_util);
    $total_utilizadores = $dados_util['total'];

    // 3. Contar Publicações
    $res_pub = mysqli_query($link, "SELECT COUNT(*) as total FROM publicacao");
    $dados_pub = mysqli_fetch_assoc($res_pub);
    $total_publicacoes = $dados_pub['total'];

    mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IEFP NET - Página Incial</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Header -->
  <header>
    <h1>IEFP <span class="thin">NET</span></h1>
  </header>

  <!-- Content Container -->
<div class="flex-container">
    <main class="main">
        <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?q=80&w=1000" alt="Carreira" class="hero-image">
        
        <div class="hero-content">
            <h1>Bem-vindo(a) ao IEFP Net</h1>
            <p>Junte-se à nossa rede e impulsione a sua carreira.</p>
            <br>
            <div class="visitor-stats">
                <div class="stat-item">
                    <span class="stat-number"><?php echo $total_utilizadores; ?></span>
                    <span class="stat-label">Utilizadores</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <span class="stat-number"><?php echo $total_publicacoes; ?></span>
                    <span class="stat-label">Publicações</span>
                </div>
            </div>

            <p>Ainda não tem conta? Registe-se já!</p>
            <a href="reg_util.php" class="btn-cta">Criar Conta Agora</a>
            
            <br><br>
            <p><small>Já é membro? <a href="login.php" style="color: #2e7d32; font-weight: bold;">Faça Login aqui</a></small></p>
        </div>
    </main>
  </div>

  <!-- Footer -->
  <footer>
    <p>Todos os direitos reservados a IEFP, I.P.</p>
  </footer>

</body>
</html>
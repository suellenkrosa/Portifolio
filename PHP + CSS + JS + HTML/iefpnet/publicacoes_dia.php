<?php
session_start();
include('biblioteca.php');

if(!isset($_SESSION['id_util'])){
    header("Location: login.php");
    exit();    
}

$link = conectarBD();
$id_logado = $_SESSION['id_util'];

//Seleciona o nickname do autor e os dados da publicação
//curdate é para selecionar exatamente as pubs do dia
$sql = "SELECT u.nickname, p.hora, p.data, p.cont_publi, p.id_fk 
        FROM publicacao p
        JOIN utilizador u ON p.num_util_fk = u.num_util
        WHERE p.num_util_fk != '$id_logado' 
        AND p.data = CURDATE()
        ORDER BY p.hora DESC";

$resultado = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>IEFP NET - Publicações do Dia</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
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

    <div class="flex-container">
        <main class="main" style="background: transparent; box-shadow: none;">
            <div class="hero-content">
                <h2 style="text-align: center; color: #2e7d32;">Mural da Comunidade</h2>
                
                <div class="feed-container">
                    <?php
                    if(mysqli_num_rows($resultado) > 0) {
                        while($post = mysqli_fetch_assoc($resultado)) {
                            ?>
                            <div class="post-card">
                                <div class="post-header">
                                    <span style="font-weight: bold; color: #1b5e20;">
                                        @<?php echo htmlspecialchars($post['nickname']); ?>
                                    </span>
                                    <span>
                                        <?php echo date('d/m/Y', strtotime($post['data'])); ?> às <?php echo $post['hora']; ?>
                                    </span>
                                </div>

                                <div class="post-content">
                                    <?php 
                                    if($post['tipo'] == 'imagem') {
                                        echo "<img src='".htmlspecialchars($post['cont_publi'])."' class='post-img' style='max-width:100%; border-radius:8px;'>";
                                    } else {
                                        echo nl2br(htmlspecialchars($post['cont_publi']));
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<div class='no-posts'><p>Ainda não há publicações.</p></div>";
                    }
                    ?>
                </div>
            </div>
        </main>
    </div>

    <footer>
        <p>Todos os direitos reservados a IEFP, I.P.</p>
    </footer>
</body>
</html>
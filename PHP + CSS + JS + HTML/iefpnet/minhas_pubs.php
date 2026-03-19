<?php
session_start();
include('biblioteca.php');

if(!isset($_SESSION['id_util'])){
    header("Location: login.php");
    exit();
}

$link = conectarBD();
$id_logado = $_SESSION['id_util'];

$sql = "SELECT * FROM publicacao WHERE num_util_fk = '$id_logado' ORDER BY data DESC, hora DESC";
$resultado = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IEFP NET - Minhas Publicações</title>
    <link rel="stylesheet" href="css/style.css"> </head>
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
                <h2 style="text-align: center; color: #2e7d32;">As Minhas Publicações</h2>
                
                <div class="feed-container">
                    <?php
                    if(mysqli_num_rows($resultado) > 0) {
                        while($post = mysqli_fetch_assoc($resultado)) {
                            ?>
                            <div class="post-card">
                                <div class="post-header">
                                    <span><?php echo date('d/m/Y', strtotime($post['data'])); ?></span>
                                    <span><?php echo $post['hora']; ?></span>
                                </div>

                                <div class="post-content">
                                    <?php 
                                    if($post['id_fk'] == 2) {
                                        echo "<img src='".$post['cont_publi']."' class='post-img'>";
                                    } else {
                                        echo nl2br(htmlspecialchars($post['cont_publi']));
                                    }
                                    ?>
                                </div>
                                
                                <div class="post-footer">
                                    <a href="eliminar_pub.php?id=<?php echo $post['id']; ?>" 
                                       style="color: #d32f2f; text-decoration: none; font-weight: bold;"
                                       onclick="return confirm('Apagar permanentemente?')">
                                       Eliminar
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<div class='no-posts'>
                                <p>Ainda não tens publicações.</p>
                                <a href='nova_pub.php' class='btn-cta'>Criar Agora</a>
                              </div>";
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
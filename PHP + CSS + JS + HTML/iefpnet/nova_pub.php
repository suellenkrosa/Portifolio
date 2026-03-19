<?php
session_start();
include_once('biblioteca.php');

if(!isset($_SESSION['id_util'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IEFP NET - Nova Publicação</title>
    <link rel="stylesheet" href="css/style.css"> <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;700&display=swap" rel="stylesheet">
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
        <main class="main">
            <div class="hero-content">
                <h2>Criar Nova Publicação</h2>
                    <p>Partilha as tuas ideias ou imagens com a comunidade.</p>
                    
                    <form action="guardar_pub.php" method="POST" enctype="multipart/form-data">
                        <label>Tipo de Publicação:</label><br>
                        <div class="tipo-pub-container">
                            <label class="opcao-pub">
                                <input type="radio" name="tipo_pub" value="1" checked id="radio-texto">
                                <div class="btn-tipo">Texto</div>
                            </label>

                            <label class="opcao-pub">
                                <input type="radio" name="tipo_pub" value="2" id="radio-imagem">
                                <div class="btn-tipo">Imagem</div>
                            </label>
                        </div>

                        <br>

                        <label id="label-conteudo">Conteúdo:</label><br>
                        <textarea name="conteudo" id="campo-conteudo" rows="5" style="width:100%;" required placeholder="O que estás a pensar?"></textarea>

                        <div id="area-upload" style="display:none; margin-top:15px;">
                            <label>Ou seleciona uma imagem do teu PC:</label><br>
                            <input type="file" name="ficheiro_imagem" accept="image/*">
                        </div>

                        <br><br>
                        <button type="submit" class="btn-cta">Publicar agora</button>
                </form>
                </div>
            </main>
        </div>

    <footer>
        <p>Todos os direitos reservados a IEFP, I.P.</p>
    </footer>

    <script>
        const radioTexto = document.getElementById('radio-texto'); //para o js procurar as informações e guardar
        const radioImagem = document.getElementById('radio-imagem');
        const campo = document.getElementById('campo-conteudo');
        const areaUpload = document.getElementById('area-upload');

        radioTexto.addEventListener('change', () => { //para mudar de um placeholder para o outro
            campo.placeholder = "O que estás a pensar?";
            areaUpload.style.display = "none";
        });

        radioImagem.addEventListener('change', () => {
            campo.placeholder = "Cola aqui o link (URL) ou carrega um ficheiro abaixo...";
            areaUpload.style.display = "block";
        });
    </script>
</body>
</html>
<?php
session_start();
include('biblioteca.php');

// 1. Verifica se o utilizador está logado
if(!isset($_SESSION['id_util'])){
    header("Location: login.php");
    exit();
}

// 2. Liga à base de dados usando a tua função da biblioteca
$link = conectarBD();
$id_logado = $_SESSION['id_util'];

// 3. Procura os dados reais do utilizador logado
$res = mysqli_query($link, "SELECT * FROM utilizador WHERE num_util = '$id_logado'");
$util = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IEFP NET - Minha Conta</title>
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
        <main class="main">
            <div class="hero-content"> 
                <h2 style="text-align: center;">Gestão de Perfil</h2>
                
                <hr style="margin-bottom: 30px; border: 0; border-top: 1px solid #eee;">

                <h3>Dados pessoais</h3>
                <form action="atualizar_conta.php" method="POST" class="form-dados">
                    <div class="form-group">
                        <label>E-mail:</label>
                        <input type="email" name="email" value="<?php echo $util['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Localidade:</label>
                        <input type="text" name="localidade" value="<?php echo $util['localidade']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Telefone:</label>
                        <input type="text" name="telefone" value="<?php echo $util['telefone']; ?>">
                    </div>
                    <button type="submit" class="btn-cta" style="display: block; margin: 20px auto;">
                        Guardar Alterações
                    </button>
                </form>

                <br><hr><br>

                <h3>Segurança</h3>
                <form action="alterar_pass.php" method="POST" class="form-registo">
                    <div class="form-group">
                        <label>Password atual:</label>
                        <input type="password" name="pass_antiga" placeholder="Digite a senha atual" required>
                    </div>
                    <div class="form-group">
                        <label>Nova Password:</label>
                        <input type="password" name="n_pass" id="pass" placeholder="Digite a nova senha" required>
                    </div>
                    <div class="form-group">
                        <label>Confirmar Password:</label>
                        <input type="password" name="c_pass" id ="conf_pass" placeholder="Repita a nova senha" required>
                    </div>
                    <button type="submit" class="btn-cta" style="display: block; margin: 20px auto;">
                        Alterar Password
                    </button>
                </form>

                <script src="javascript/validacoes.js"></script>

                <br><br>
                
                <div style="text-align: center; background: #fff1f1; padding: 20px; border-radius: 12px; border: 1px solid #ffdada;">
                    <p style="color: #d32f2f; margin-bottom: 10px;">Deseja encerrar a conta permanentemente?</p>
                    <a href="eliminar_conta.php" 
                       style="color: #d32f2f; font-weight: bold; text-decoration: none;" 
                       onclick="return confirm('Tem a certeza? Todos os seus posts serão apagados para sempre!')">
                        Eliminar Conta
                    </a>
                </div>
            </div>
        </main>
    </div>

    <footer>
        <p>Todos os direitos reservados a IEFP, I.P.</p>
    </footer>
</body>
</html>
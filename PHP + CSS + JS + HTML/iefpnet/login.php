<!DOCTYPE html>
<html lang="pt"> <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IEFP NET - Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>IEFP <span class="thin">NET</span></h1>
    </header>
    
    <div class="flex-container">
        <main class="main">
            <h2 style="text-align: center">Aceder à Conta</h2>
            <form action="validar_login.php" method="post" class="form-registo">
                <table class="table-registo">
                    <table>
                    <tr>
                        <td><label for="nick">Nickname:</label></td>
                        <td><input type="text" name="nickname" id="nick" required></td>
                    </tr>
                    <tr>
                        <td><label for="pass">Password:</label></td>
                        <td><input type="password" name="password" id="pass" required></td>
                    </tr>
                    </table>
                </table>
                    <div class="form-buttons">
                        <input type="submit" value="Entrar" class="btn-cta">
                    </div>
            </form>

            <br>
            <p style="text-align: center"><small>Ainda não tem conta? <a href="reg_util.php" style="color: #388e3c;">Registe-se aqui</a></small></p>
            
        </main> </div> <footer>
        <p>Todos os direitos reservados a IEFP, I.P.</p>
    </footer>

</body>
</html>
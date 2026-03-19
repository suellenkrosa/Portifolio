<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IEFP NET - Registo</title>
  <link rel="stylesheet" href="css/style.css?v=4">
</head>
<body>
  <header>
    <h1>IEFP <span style="font-weight: 300;">NET</span></h1>
  </header>

  <div class="flex-container">
    <div class="main form-page">
      <h2>Formulário de Registo</h2>
      <br>
      <form method="post" action="processar_registo.php" class="form-registo">
        <table class="table-registo">
          <tr>
            <td><label for="nome">Nome:</label></td>
            <td><input type="text" id="nome" name="nome" size="30" required></td>
          </tr>
          <tr>
            <td><label for="apelido">Apelido:</label></td>
            <td><input type="text" id="apelido" name="apelido" size="30" required></td>
          </tr>
          <tr>
            <td><label for="data_nasc">Data de nascimento:</label></td>
            <td><input type="date" id="data_nasc" name="data_nasc" required></td>
          </tr>
          <tr>
            <td><label for="localidade">Localidade:</label></td>
          <td><input type="text" id="localidade" name="local" size="50" required></td>
          </tr>
          <tr>
            <td><label for="tl">Telefone:</label></td>
            <td><input type="tel" id="tl" name="tel" size="9" required></td>
          </tr>
          <tr>
            <td><label for="email">E-mail:</label></td>
            <td><input type="email" id="email" name="e-mail" size="50" required></td>
          </tr>
          <tr>
            <td><label for="nickname">Nickname:</label></td>
            <td><input type="text" name="nickname" id="nick" size="50" required></td>
          </tr>
          <tr>
            <td><label for="senha">Password:</label></td>
            <td>
              <input type="password" name="password" id="pass" size="30" required>
              <br><small style="color: #666;">Mínimo 8 caracteres e 1 símbolo especial.</small>
            </td>
          </tr>
          <tr>
            <td><label for="conf_pass">Confirme a Password:</label></td>
            <td><input type="password" name="conf_password" id="conf_pass" size="30" required></td>
          </tr>
        </table>

        <div class="form-buttons">
          <input type="reset" value="Limpar" class="btn-limpar">
          <input type="submit" value="Registar" class="btn-cta">
        </div>

        <script src="javascript/validacoes.js"></script>

      </form>
    </div>
  </div>

  <footer>
    <p>Todos os direitos reservados a IEFP, I.P.</p>
  </footer>
</body>
</html>
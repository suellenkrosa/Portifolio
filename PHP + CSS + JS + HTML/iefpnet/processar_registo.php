<?php
    session_start();
    include('biblioteca.php');
    $link = conectarBD();

    if (!$link) {
        die('Dados não submetidos: ' . mysqli_connect_error());
    }

    //Variáveis que vêm do formulário (POST)
    $pNome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $data_nasc = $_POST['data_nasc'];
    $local = $_POST['local'];
    $tel = $_POST['tel'];
    $email = $_POST['e-mail'];
    $nick = $_POST['nickname'];
    $pass = $_POST['password'];

    //Verifica duplicados
    $check_sql ="SELECT * FROM utilizador WHERE email = '$email' OR nickname = '$nick'";
    $res_check = mysqli_query($link, $check_sql);

    if(mysqli_num_rows($res_check) > 0){
        echo "<script>
            alert('Erro: O E-mail ou o Nickname já estão em uso por outro utilizador.');
            window.history.back();
        </script>;"
        exit(); //para a execução e não faz o insert
    }

    //INSERT usando os nomes exatos das tuas colunas na BD
    $sql = "INSERT INTO utilizador (pNome, apelido, data_nasc, localidade, telefone, email, nickname, password)
            VALUES ('$pNome', '$apelido', '$data_nasc', '$local', '$tel', '$email', '$nick', '$pass')";

    if (mysqli_query($link, $sql)){
        //1. Pega o ID que a BD acabou de gerar
        $novo_id = mysqli_insert_id($link);
        
        //2. Cria as SESSÕES com os nomes que o teu index_login.php usa:
        //O index_login.php faz: if(!isset($_SESSION['id_util']))
        $_SESSION['id_util'] = $novo_id; 
        
        //O index_login.php faz: $nome_utilizador = $_SESSION['nome_util'];
        $_SESSION['nome_util'] = $pNome; 
        
        echo "Dados submetidos com sucesso!";
        echo "<p>Bem-vindo(a), $pNome. A preparar a tua página inicial...</p>";
        header("Refresh: 3; URL=index_login.php");
    } else {
        echo "Erro ao inserir dados: " . mysqli_error($link);
        header("Refresh: 5; URL=reg_util.php");
    }

    mysqli_close($link);
?>
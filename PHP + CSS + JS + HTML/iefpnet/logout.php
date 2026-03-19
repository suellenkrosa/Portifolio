<?php
session_start(); //localiza a sessao atual
session_destroy(); //destroi o acesso

header("Location: index.php");
exit();

?>
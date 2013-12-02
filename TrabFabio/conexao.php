<?php

$driver = 'mysql';
$local = 'localhost';
$banco = 'db_contatos';
$usuario = 'root';
$senha = '';

$parametros =
    "{$driver}:local={$local};dbname={$banco}";
// a string de conexão vai ficar assim:
// 'mysql:local=localhost;dbname=agenda';

try {
    $conexao = new PDO(
        $parametros, $usuario, $senha);
}
catch (PDOException $ex) {
    exit($ex->getMessage());
}

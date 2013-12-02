<?php

include('conexao.php');

$sql = "insert into contatos (nome, data_nascimento, email, telefone, favorito)
values (:nome, :data_nascimento, :email, :telefone, :favorito)";

$dados = array(
    'nome' => $_POST['nome'],
    'data_nascimento' => $_POST['data_nascimento'],
    'email' => $_POST['email'],
    'telefone' => $_POST['telefone'],
    'favorito' => $_POST['favorito']);

try {
    $instrucao = $conexao->prepare($sql);
    $instrucao->execute($dados);

    header('Location: listar.php');
}
catch (PDOException $ex) {
    exit($ex->getMessage());
}

$conexao = null;

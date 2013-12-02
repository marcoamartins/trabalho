<?php

include('conexao.php');

$sql = "update contatos
set nome = :nome
, data_nascimento = :data_nascimento
, email = :email
, telefone = :telefone
, favorito = :favorito
where id_contato = :id_contato";
$dados = array(
    'id_contato' => $_GET['id_contato'],
    'nome' => $_POST['nome'],
    'data_nascimento' => $_POST['data_nascimento'],
    'email' => $_POST['email'],
    'telefone' => $_POST['telefone']),
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

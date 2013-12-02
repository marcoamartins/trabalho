<?php

include('conexao.php');

$sql = "delete from contatos where id_contato = :id_contato";
$dados = array('id_contato' => $_GET['id_contato']);

try {
    $instrucao = $conexao->prepare($sql);
    $instrucao->execute($dados);

    header('Location: listar.php');
}
catch (PDOException $ex) {
    exit($ex->getMessage());
}

$conexao = null;

<?php

include('conexao.php');

try {
    $sql = "select * from contatos
    where nome like :q
    order by favorito DESC, nome";

    $q = isset($_POST['q']) ? $_POST['q'] : '';

    $instrucao = $conexao->prepare($sql);
    $dados = array('q' => $q.'%');
    $instrucao->execute($dados);
    $linhas = $instrucao->fetchAll();
    echo 'Tabela de Contatos<br/>';
    foreach($linhas as $linha) {
          echo '<a href="excluir.php?id_contato='
            . $linha['id_contato'].'">excluir</a> '
            . '<a href="editar.php?id_contato='
            . $linha['id_contato'].'">alterar</a> '
            . $linha['nome'].'   '
            . $linha['data_nascimento'].'   '
            . $linha['email'].'   '
            . $linha['telefone']
            . "<br>\n";
    }
}
catch (PDOException $ex) {
    echo $ex->getMessage();
}
echo '<br /> <a href="listar.html">Voltar a Pesquisa</a> <br/>';
echo '<br /> <a href="index.html">Voltar ao Menu</a> <br/>';
$conexao = null;

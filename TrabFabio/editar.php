<?php

include('conexao.php');

try {
    $sql = "select * from contatos where id_contato = :id_contato";
    $dados = array('id_contato' => $_GET['id_contato']);

    $instrucao = $conexao->prepare($sql);
    $instrucao->execute($dados);
    $linhas = $instrucao->fetchAll();

    $linha = $linhas[0];
    $nome = $linha['nome'];
    $data_nascimento = $linha['data_nascimento'];
    $email = $linha['email'];
    $telefone = $linha['telefone'];
    $favorito = $linha['favorito'];
}
catch (PDOException $ex) {
    exit($ex->getMessage());
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inserir Contato</title>
</head>
<body>
    <form method="post"
    action="alterar.php?id_contato=<?php echo $_GET['id_contato'] ?>">
        <input type="text" name="nome"
            value="<?php echo $nome ?>"
            placeholder="digite seu nome">
        <input type="text" name="data_nascimento"
            value="<?php echo $data_nascimento ?>"
            placeholder="data de nascimento">
        <input type="text" name="email"
            value="<?php echo $email ?>"
            placeholder="email">
        <input type="text" name="telefone"
            value="<?php echo $telefone ?>"
            placeholder="telefone">
        <input type="checkbox" name="favorito"
            value="<?php echo $favorito ?>">
        <hr>
        <input type="submit">
        <a href="index.html">Voltar ao Menu</a> <br/>
    </form>
</body>
</html>
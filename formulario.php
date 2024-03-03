<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];

    // Conecta ao banco de dados (supondo que você já tenha criado a estrutura do banco)
    $servername = "localhost";
    $username = "seu_usuario";
    $password = "sua_senha";
    $dbname = "nome_do_banco";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica se a conexão foi estabelecida com sucesso
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Prepara e executa a query para inserir os dados na tabela de alunos
    $sql = "INSERT INTO alunos (nome, idade) VALUES ('$nome', '$idade')";

    if ($conn->query($sql) === TRUE) {
        echo "Aluno cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar aluno: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>

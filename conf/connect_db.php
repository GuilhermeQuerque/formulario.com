<?php
/*==============conexão com o banco de dados================*/
//definindo variaveis        modifique as informações de acordo com suas informações
$nomeHost='localHost';  
$userdb='root';
$nomedb='FORMULARIO';
$senhadb='';
$tabeladb='INSCRICAO_USUARIO';

//conexão sem especificar o banco
$conexao = new PDO("mysql:host=$host", $user, $password);

//verificação da existencia do $nomedb
$verificadb = $conexao->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$nomedb'");

// cria o banco de não houver dbcom o nome especificado
if ($verificadb->rowCount() == 0) {
    $conexao->exec("CREATE DATABASE `$nomedb` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
}

// Agora conecta ao respectivo banco criado
$conexao = new PDO("mysql:host=$host;dbname=$nomedb", $user, $password);

// Consulta para verificar se a existe alguma tabela 
$consultaTabela = $conexao->query("SHOW TABLES LIKE '".$tabeladb."'");

//varifica se tem alguma coluna dentro da tabela caso não haja ele cria as colunas necessarias
if ($consultaTabela->rowCount() == 0) {             
    $sqlTabela = "CREATE TABLE $tabeladb (
        id INT AUTO_INCREMENT PRIMARY KEY,
        PRIMEIRO_NOME VARCHAR(50) NOT NULL,
        SEGUNDO_NOME VARCHAR(50) NOT NULL,
        EMAIL VARCHAR(100) NOT NULL,
        TELEFONE VARCHAR(20) NOT NULL,
        ESCOLARIDADE VARCHAR(30) NOT NULL,
        CURSO VARCHAR(50),
        CARGO VARCHAR(50) NOT NULL,
        HABILIDADES TEXT,
        HORA_INSCRICAO DATETIME NOT NULL,
        DOCUMENTO LONGBLOB NOT NULL,
        IP VARCHAR(45) NOT NULL
    )";
    $conexao->exec($sqlTabela);
}
if (!$conexao) { 
    die("Connection failed: " . mysqli_connect_error());
}



<?php
/*==============conexão com o banco de dados================*/
//definindo variaveis        modifique as informações de acordo com suas informações
$nomeHost='localHost';  
$userdb='root';
$nomedb='banco_de_dados_1';
$senhadb='';
$tabeladb='guihermedb';


// Conexão ao respectivo banco 
$conexao= new PDO("mysql:host=$nomeHost;dbname=$nomedb", $userdb, $senhadb);

//verificando conexão com o banco de dados
if (!$conexao) { 
    die("Connection failed: " . mysqli_connect_error());
}


// Consulta para verificar se a tabela existe
$consultaTabela = $conexao->query("SHOW TABLES LIKE '".$tabeladb."'");

//varifica se tem alguma coluna dentro da tabela
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


